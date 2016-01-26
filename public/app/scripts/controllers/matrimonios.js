'use strict';

angular.module('sbAdminApp')
  .controller('MatrimoniosController', function($scope, $position, $http, $stateParams, $sce) {
    $scope.matrimonios = {};

    $http.get('/api/matrimonios').success(function(data) {
      $scope.matrimonios = data;
    }) .error(function(data) {console.log('Error: ' + data); });

  })



  .controller('NuevoMatrimonioController', function($scope, $position, $http, $stateParams, $sce, toastr, $state) {
    $scope.matrimonio = {};

    $scope.guardar = function(){

      $http.post('/api/matrimonio', $scope.matrimonio).success(function(data) {
        toastr.success('Se ha guardado el registro de Matrimonio!', 'Exito!');
        $scope.comunion = {};
        $state.go('dashboard.matrimonios');
      }) .error(function(data) {console.log('Error: ' + data); });

    }
  })

  .controller('MostrarMatrimonioController', function($scope, $position, $http, $stateParams, $sce, toastr, $state) {
    $scope.id = $stateParams.id || '';
    $scope.matrimonio = {};

    $http.get('/api/matrimonio/' + $scope.id).success(function(data) {
      if(data.error === false){
        $scope.matrimonio = data;

        var datea = $scope.matrimonio.fecha;
        var dateParts = datea.split("-");
        //$scope.matrimonio.fecha = new Date(dateParts[0], dateParts[1] - 1, dateParts[2].substr(0,2));

      }else{
        toastr.error(data.message, 'Error!');
        $state.go('dashboard.matrimonios');
      }

    }) .error(function(data) {console.log('Error: ' + data); });


    $scope.guardar = function(){

      $http.post('/api/matrimonio/' + $scope.id, $scope.matrimonio).success(function(data) {
        toastr.success('Se ha modificado el registro de Matrimonio!', 'Exito!');
        $scope.matrimonio = {};
        $state.go('dashboard.matrimonios');
      }) .error(function(data) {console.log('Error: ' + data); });

    }

  })

  .controller('ImprimirMatrimonioController', function($scope, $position, $http, $stateParams, $sce, toastr, $state) {
    $scope.id = $stateParams.id || '';
    $scope.matrimonio = {};

    $http.get('/api/matrimonio/' + $scope.id).success(function(data) {
      if(data.error === false){
        $scope.matrimonio = data;
      }else{
        toastr.error(data.message, 'Error!');
        $state.go('dashboard.matrimonios');
      }

    }) .error(function(data) {console.log('Error: ' + data); });

  })