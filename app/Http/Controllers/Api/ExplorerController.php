<?php

namespace App\Http\Controllers\Api;

use App\Api\ApiMessages;
use App\Http\Requests\ExplorerRequest;
use App\Explorer;
use App\Http\Controllers\Controller;


class ExplorerController extends Controller
{
    private  $explorer;

    public function __construct(Explorer $explorer)
    {
        $this->explorer = $explorer;
    }

    //   INDEX   //
    public function index()
    {
        $explorer = $this->explorer->paginate('10');
        return response()->json($explorer, 200);
    }


    //   STORE   //
    public function store(ExplorerRequest $request)
    {
        $data = $request->all();
        $images = $request->file('images');

        try{
            $explorer = $this->explorer->create($data);

            if(isset($data['categories']) && count($data['categories'])){
                $explorer->categories()->sync($data['categories']);
            }

            if($images){
                $imagesUploaded = [];
                foreach ($images as $image){
                    $path = $image->store('images', 'public');
                    $imagesUploaded[] = ['photo' => $path, 'is_thumb' => false];
                }

                $explorer->photos()->createMany($imagesUploaded);
            }

            return response()->json([
                'data' => [
                    'msg' => 'Success!!!'
                ]
            ], 200);

        }catch (\Exception $e){
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }

    }


    //   SHOW   //
    public function show($id)
    {
        try{
            $explorer = $this->explorer->findOrFail($id);

            return response()->json([
                'data' =>  $explorer
            ], 200);

        }catch (\Exception $e){
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }


    //   UPDATE   //
    public function update(ExplorerRequest $request, $id)
    {
        $data = $request->all();

        try{
            $explorer = $this->explorer->findOrFail($id);
            $explorer->update($data);

            if(isset($data['categories']) && count($data['categories'])){
                $explorer->categories()->sync($data['categories']);
            }

            return response()->json([
                'data' => [
                    'msg' => 'Update -- Success!!!'
                ]
            ], 200);

        }catch (\Exception $e){
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }


    //   DESTROY   //
    public function destroy($id)
    {
        try{
            $explorer = $this->explorer->findOrFail($id);
            $explorer->delete();

            return response()->json([
                'data' => [
                    'msg' => 'Delete -- Success!!!'
                ]
            ], 200);

        }catch (\Exception $e){
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }
}
