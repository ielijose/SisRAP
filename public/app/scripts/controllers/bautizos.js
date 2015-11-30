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



  .controller('MostrarBautizoController', function($scope, $position, $http, $stateParams, $sce, toastr, $state) {
    $scope.id = $stateParams.id || '';
    $scope.bautizo = {};

    $http.get('/api/bautizo/' + $scope.id).success(function(data) {
      if(data.error === false){
        $scope.bautizo = data;

        var datea = $scope.bautizo.fecha_nacimiento;
        var dateParts = datea.split("/");
        console.log();
        $scope.bautizo.fecha_nacimiento = new Date(dateParts[2], dateParts[1] - 1, dateParts[0].substr(0,2));

      }else{
        toastr.error(data.message, 'Error!');
        $state.go('dashboard.bautizos');
      }

    }) .error(function(data) {console.log('Error: ' + data); });


    $scope.guardar = function(){

      $http.post('/api/bautizo/' + $scope.id, $scope.bautizo).success(function(data) {
        toastr.success('Se ha modificado el registro de Bautizo!', 'Exito!');
        $scope.bautizo = {};
        $state.go('dashboard.bautizos');
      }) .error(function(data) {console.log('Error: ' + data); });

    }

  })

  .controller('ImprimirBautizoController', function($scope, $position, $http, $stateParams, $sce, toastr, $state) {
    $scope.id = $stateParams.id || '';
    $scope.bautizo = {};

    $http.get('/api/bautizo/' + $scope.id).success(function(data) {
      if(data.error === false){
        $scope.bautizo = data;

        var datea = $scope.bautizo.fecha_nacimiento;
        var dateParts = datea.split("/");
        console.log();
        $scope.bautizo.fecha_nacimiento = new Date(dateParts[2], dateParts[1] - 1, dateParts[0].substr(0,2));

      }else{
        toastr.error(data.message, 'Error!');
        $state.go('dashboard.bautizos');
      }

    }) .error(function(data) {console.log('Error: ' + data); });

  })