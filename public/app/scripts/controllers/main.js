'use strict';
/**
 * @ngdoc function
 * @name sbAdminApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the sbAdminApp
 */
angular.module('sbAdminApp')
  .controller('MainCtrl', function($scope,$position, $http) {
    $scope.data = {};
    $http.get('/api/charts').success(function(data) {
      $scope.data = data;
    }) .error(function(data) {console.log('Error: ' + data); });
  });
