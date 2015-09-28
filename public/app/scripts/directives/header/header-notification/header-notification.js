'use strict';

/**
 * @ngdoc directive
 * @name izzyposWebApp.directive:adminPosHeader
 * @description
 * # adminPosHeader
 */
angular.module('sbAdminApp')
	.directive('headerNotification',function(){
		return {
        templateUrl:'/app/scripts/directives/header/header-notification/header-notification.html',
        restrict: 'E',
        replace: true,
        controller:function($scope, $http){
            $scope.user = '';

            $http.get('/api/user')
            .success(function(data) {
              $scope.user = data;
            }) .error(function(data) {console.log('Error: ' + data); });

          }
    	}
	});


