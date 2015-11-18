'use strict';

angular.module('sbAdminApp')
  .controller('BautizosController', function($scope, $position, $http, $stateParams, $sce) {
    $scope.bautizos = {};

    $http.get('/api/bautizos').success(function(data) {
      $scope.bautizos = data;
    }) .error(function(data) {console.log('Error: ' + data); });

  })



  .controller('NuevoBautizoController', function($scope, $position, $http, $stateParams, $sce, toastr, $state) {
    $scope.bautizo = {};

    $scope.guardar = function(){

      $http.post('/api/bautizo', $scope.bautizo).success(function(data) {
        toastr.success('Se ha guardado el registro de Bautizo!', 'Exito!');
        $scope.bautizo = {};
        $state.go('dashboard.bautizos');
      }) .error(function(data) {console.log('Error: ' + data); });

    }
  })
