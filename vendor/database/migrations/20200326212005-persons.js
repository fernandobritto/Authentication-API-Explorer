'use strict';

module.exports = {
  up: (queryInterface, Sequelize) => {

      return queryInterface.createTable('persons', { id: Sequelize.INTEGER });

  },

  down: (queryInterface, Sequelize) => {

      return queryInterface.dropTable('persons');

  }
};
