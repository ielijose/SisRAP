'use strict';

angular.module('sbAdminApp')
  .controller('ConfirmacionesController', function($scope, $position, $http, $stateParams, $sce) {
    $scope.confirmaciones = {};

    $http.get('/api/confirmaciones').success(function(data) {
      $scope.confirmaciones = data;
    }) .error(function(data) {console.log('Error: ' + data); });

  })



  .controller('NuevaConfirmacionController', function($scope, $position, $http, $stateParams, $sce, toastr, $state) {
    $scope.confirmacion = {};

    $scope.guardar = function(){

      $http.post('/api/confirmacion', $scope.confirmacion).success(function(data) {
        toastr.success('Se ha guardado el registro de Confirmación!', 'Exito!');
        $scope.comunion = {};
        $state.go('dashboard.confirmaciones');
      }) .error(function(data) {console.log('Error: ' + data); });

    }
  })

  .controller('MostrarConfirmacionController', function($scope, $position, $http, $stateParams, $sce, toastr, $state) {
    $scope.id = $stateParams.id || '';
    $scope.confirmacion = {};

    $http.get('/api/confirmacion/' + $scope.id).success(function(data) {
      if(data.error === false){
        $scope.confirmacion = data;

        var datea = $scope.confirmacion.fecha;
        var dateParts = datea.split("-");
        $scope.confirmacion.fecha = new Date(dateParts[0], dateParts[1] - 1, dateParts[2].substr(0,2));

      }else{
        toastr.error(data.message, 'Error!');
        $state.go('dashboard.confirmaciones');
      }

    }) .error(function(data) {console.log('Error: ' + data); });


    $scope.guardar = function(){

      $http.post('/api/confirmacion/' + $scope.id, $scope.confirmacion).success(function(data) {
        toastr.success('Se ha modificado el registro de Confirmación!', 'Exito!');
        $scope.confirmacion = {};
        $state.go('dashboard.confirmaciones');
      }) .error(function(data) {console.log('Error: ' + data); });

    }

  })

  .controller('ImprimirConfirmacionController', function($scope, $position, $http, $stateParams, $sce, toastr, $state) {
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