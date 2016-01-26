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
  })

  .controller('SearchCtrl', function($scope,$position, $http, $stateParams) {
    $scope.data = {};
    $scope.query = $stateParams.q || '';

    $http.post('/api/search', {query: $scope.query}).success(function(data) {
      $scope.data = data;
    }) .error(function(data) {console.log('Error: ' + data); });

  })

  ;