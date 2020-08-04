<?php

namespace App\Http\Controllers\Api;

use App\ExplorerPhoto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExplorerPhotoController extends Controller
{
    private $explorerPhoto;

    public function __construct(ExplorerPhoto $explorerPhoto)
    {
        $this->explorerPhoto = $explorerPhoto;
    }

    public function setThumb($photoId)
    {
        try{
            $photo = $this->explorerPhoto->where('is_thumb', true)->first();
            $photo = $this->explorerPhoto->find($photoId);
            $photo->update(['is_thumb' => true]);
        }catch (\Exception $e){

        }

    }


    public function remove($photoId)
    {

    }
}
