'use strict';
/**
 * @ngdoc overview
 * @name sbAdminApp
 * @description
 * # sbAdminApp
 *
 * Main module of the application.
 */
angular
  .module('sbAdminApp', [
    'oc.lazyLoad',
    'ui.router',
    'ui.bootstrap',
    'angular-loading-bar',
  ])
  .config(['$stateProvider','$urlRouterProvider','$ocLazyLoadProvider',function ($stateProvider,$urlRouterProvider,$ocLazyLoadProvider) {

    $ocLazyLoadProvider.config({
      debug:false,
      events:true,
    });

    $urlRouterProvider.otherwise('/cotizador/home');

    $stateProvider
      .state('cotizador', {
        url:'/cotizador',
        templateUrl: '/app/views/dashboard/main.html',
        resolve: {
            loadMyDirectives:function($ocLazyLoad){
                return $ocLazyLoad.load(
                {
                    name:'sbAdminApp',
                    files:[
                    '/app/scripts/directives/header/header.js',
                    '/app/scripts/directives/header/header-notification/header-notification.js',
                    '/app/scripts/directives/sidebar/sidebar.js',
                    '/app/scripts/directives/sidebar/sidebar-search/sidebar-search.js'
                    ]
                }),
                $ocLazyLoad.load(
                {
                   name:'toggle-switch',
                   files:["/bower_components/angular-toggle-switch/angular-toggle-switch.min.js",
                          "/bower_components/angular-toggle-switch/angular-toggle-switch.css"
                      ]
                }),
                $ocLazyLoad.load(
                {
                  name:'ngAnimate',
                  files:['/bower_components/angular-animate/angular-animate.js']
                })
                $ocLazyLoad.load(
                {
                  name:'ngCookies',
                  files:['/bower_components/angular-cookies/angular-cookies.js']
                })
                $ocLazyLoad.load(
                {
                  name:'ngResource',
                  files:['/bower_components/angular-resource/angular-resource.js']
                })
                $ocLazyLoad.load(
                {
                  name:'ngSanitize',
                  files:['/bower_components/angular-sanitize/angular-sanitize.js']
                })
                $ocLazyLoad.load(
                {
                  name:'ngTouch',
                  files:['/bower_components/angular-touch/angular-touch.js']
                })
            }
        }
    })
      .state('cotizador.home',{
        url:'/home',
        controller: 'TourCtrl',
        templateUrl:'/app/views/tour.html',
        resolve: {
          loadMyFiles:function($ocLazyLoad) {
            return $ocLazyLoad.load({
              name:'sbAdminApp',
              files:[
              '/app/scripts/directives/dashboard/stats/stats.js',
              '/app/scripts/controllers/tour.js'
              ]
            })
          }
        }
      })

      .state('cotizador.tour',{
        templateUrl:'/app/views/tour.html',
        url:'/tour/:id',
        controller: 'TourCtrl',
        resolve: {
          loadMyFiles:function($ocLazyLoad) {
            return $ocLazyLoad.load({
              name:'sbAdminApp',
              files:[
              '/app/scripts/directives/dashboard/stats/stats.js',
              '/app/scripts/controllers/tour.js'
              ]
            })
          }
        }
      })

  }]);