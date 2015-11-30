'use strict';

angular.module('sbAdminApp')
  .controller('CustomTourCtrl', function($scope, $position, $http, $stateParams, $sce) {

    /*$scope.tour = {};
    $scope.cotizacion = {};

    $scope.cantidad = -1;
    $scope.loading = true;
    $scope.showContact = false;
    $scope.showMessage = false;

    $scope.page = 'tour';
    //$scope.lang = 'es';
    var id = $stateParams.id || '';


    $http.get('/api/tour/' + id )
    .success(function(data) {
      $scope.tour = data;
      $scope.loading = false;
    }) .error(function(data) {console.log('Error: ' + data); });

    $scope.getPrice = function(){
      if($scope.cantidad > 0){
        return $scope.tour.prices[$scope.cantidad];
      }else{
        return 0;
      }
    }

    $scope.trustSrc = function(src) {
      return $sce.trustAsResourceUrl(src);
    }

    $scope.contact = function(){
      $scope.showContact = true;
    }

    $scope.postContact = function(){
      $scope.cotizacion.tour_id = $scope.tour.id;
      $scope.cotizacion.price = $scope.getPrice();
      $scope.cotizacion.count = $scope.cantidad;
      $scope.cotizacion.lang = $scope.lang;

      $http.post('/api/cotizar', $scope.cotizacion)
      .success(function(data) {
        $scope.showContact = false;
        $scope.showMessage = true;
        $scope.cotizacion = {};
      }) .error(function(data) {console.log('Error: ' + data); });

    }

    $scope.view = function(lang){
      $scope.page = 'guide';
      $scope.lang = lang;
    }

    $scope.back = function(){
      $scope.page = 'tour';
      $scope.showMessage = false;
    }*/

  });
