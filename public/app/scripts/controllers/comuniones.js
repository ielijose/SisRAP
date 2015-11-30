'use strict';

angular.module('sbAdminApp')
  .controller('ComunionesController', function($scope, $position, $http, $stateParams, $sce) {
    $scope.comuniones = {};

    $http.get('/api/comuniones').success(function(data) {
      $scope.comuniones = data;
    }) .error(function(data) {console.log('Error: ' + data); });

  })



  .controller('NuevaComunionController', function($scope, $position, $http, $stateParams, $sce, toastr, $state) {
    $scope.comunion = {};

    $scope.guardar = function(){

      $http.post('/api/comunion', $scope.comunion).success(function(data) {
        toastr.success('Se ha guardado el registro de Comunión!', 'Exito!');
        $scope.comunion = {};
        $state.go('dashboard.comuniones');
      }) .error(function(data) {console.log('Error: ' + data); });

    }
  })



  .controller('MostrarComunionController', function($scope, $position, $http, $stateParams, $sce, toastr, $state) {
    $scope.id = $stateParams.id || '';
    $scope.comunion = {};

    $http.get('/api/comunion/' + $scope.id).success(function(data) {
      if(data.error === false){
        $scope.comunion = data;

        var datea = $scope.comunion.fecha;
        var dateParts = datea.split("-");
        $scope.comunion.fecha = new Date(dateParts[0], dateParts[1] - 1, dateParts[2].substr(0,2));

      }else{
        toastr.error(data.message, 'Error!');
        $state.go('dashboard.comuniones');
      }

    }) .error(function(data) {console.log('Error: ' + data); });


    $scope.guardar = function(){

      $http.post('/api/comunion/' + $scope.id, $scope.comunion).success(function(data) {
        toastr.success('Se ha modificado el registro de Comunión!', 'Exito!');
        $scope.comunion = {};
        $state.go('dashboard.comuniones');
      }) .error(function(data) {console.log('Error: ' + data); });

    }

  })

  .controller('ImprimirComunionController', function($scope, $position, $http, $stateParams, $sce, toastr, $state) {
    $scope.id = $stateParams.id || '';
    $scope.comunion = {};

    $http.get('/api/comunion/' + $scope.id).success(function(data) {
      if(data.error === false){
        $scope.comunion = data;
      }else{
        toastr.error(data.message, 'Error!');
        $state.go('dashboard.comuniones');
      }

    }) .error(function(data) {console.log('Error: ' + data); });

  })