'use strict';

angular.module('sbAdminApp')
  .controller('DefuncionesController', function($scope, $position, $http, $stateParams, $sce) {
    $scope.defunciones = {};

    $http.get('/api/defunciones').success(function(data) {
      $scope.defunciones = data;
    }) .error(function(data) {console.log('Error: ' + data); });

  })

  .controller('NuevaDefuncionController', function($scope, $position, $http, $stateParams, $sce, toastr, $state) {
    $scope.defuncion = {};

    $scope.guardar = function(){

      $http.post('/api/defuncion', $scope.defuncion).success(function(data) {
        toastr.success('Se ha guardado el registro de Defunción!', 'Exito!');
        $scope.defuncion = {};
        $state.go('dashboard.defunciones');
      }) .error(function(data) {console.log('Error: ' + data); });

    }
  })

  .controller('MostrarDefuncionController', function($scope, $position, $http, $stateParams, $sce, toastr, $state) {
    $scope.id = $stateParams.id || '';
    $scope.defuncion = {};

    $http.get('/api/defuncion/' + $scope.id).success(function(data) {
      if(data.error === false){
        $scope.defuncion = data;

        var datea = $scope.defuncion.fecha;
        var dateParts = datea.split("-");
        $scope.defuncion.fecha = new Date(dateParts[0], dateParts[1] - 1, dateParts[2].substr(0,2));

      }else{
        toastr.error(data.message, 'Error!');
        $state.go('dashboard.defunciones');
      }

    }) .error(function(data) {console.log('Error: ' + data); });


    $scope.guardar = function(){

      $http.post('/api/defuncion/' + $scope.id, $scope.defuncion).success(function(data) {
        toastr.success('Se ha modificado el registro de Comunión!', 'Exito!');
        $scope.defuncion = {};
        $state.go('dashboard.defunciones');
      }) .error(function(data) {console.log('Error: ' + data); });

    }

  })

  .controller('ImprimirDefuncionController', function($scope, $position, $http, $stateParams, $sce, toastr, $state) {
    $scope.id = $stateParams.id || '';
    $scope.defuncion = {};

    $http.get('/api/defuncion/' + $scope.id).success(function(data) {
      if(data.error === false){
        $scope.defuncion = data;
      }else{
        toastr.error(data.message, 'Error!');
        $state.go('dashboard.defunciones');
      }

    }) .error(function(data) {console.log('Error: ' + data); });

  })