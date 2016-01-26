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
    'toastr'
  ])
  .config(['$stateProvider','$urlRouterProvider','$ocLazyLoadProvider',function ($stateProvider,$urlRouterProvider,$ocLazyLoadProvider) {

    $ocLazyLoadProvider.config({
      debug:false,
      events:true,
    });

    $urlRouterProvider.otherwise('/dashboard/home');

    $stateProvider
      .state('dashboard', {
        url:'/dashboard',
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
      .state('dashboard.home',{
        url:'/home',
        controller: 'MainCtrl',
        templateUrl:'/app/views/dashboard/home.html',
        resolve: {
          loadMyFiles:function($ocLazyLoad) {
            return $ocLazyLoad.load({
              name:'sbAdminApp',
              files:[
              '/app/scripts/controllers/main.js'
              ]
            })
          }
        }
      })

      .state('dashboard.bautizos',{
        url:'/bautizos',
        controller: 'BautizosController',
        templateUrl:'/app/views/bautizos/index.html',
        resolve: {
          loadMyFiles:function($ocLazyLoad) {
            return $ocLazyLoad.load({name:'sbAdminApp', files:['/app/scripts/controllers/bautizos.js'] })
          }
        }
      })

      .state('dashboard.bautizos-nuevo',{
        url:'/bautizos/nuevo',
        controller: 'NuevoBautizoController',
        templateUrl:'/app/views/bautizos/nuevo.html',
        resolve: {
          loadMyFiles:function($ocLazyLoad) {
            return $ocLazyLoad.load({name:'sbAdminApp', files:['/app/scripts/controllers/bautizos.js'] })
          }
        }
      })

      .state('dashboard.bautizo',{
        url:'/bautizo/:id',
        controller: 'MostrarBautizoController',
        templateUrl:'/app/views/bautizos/mostrar.html',
        resolve: {
          loadMyFiles:function($ocLazyLoad) {
            return $ocLazyLoad.load({name:'sbAdminApp', files:['/app/scripts/controllers/bautizos.js'] })
          }
        }
      })

      .state('dashboard.bautizo-imprimir',{
        url:'/bautizo-imprimir/:id',
        controller: 'ImprimirBautizoController',
        templateUrl:'/app/views/bautizos/imprimir.html',
        resolve: {
          loadMyFiles:function($ocLazyLoad) {
            return $ocLazyLoad.load({name:'sbAdminApp', files:['/app/scripts/controllers/bautizos.js'] })
          }
        }
      })


      /* COMUNIONES */
      .state('dashboard.comuniones',{
        url:'/comuniones',
        controller: 'ComunionesController',
        templateUrl:'/app/views/comuniones/index.html',
        resolve: {
          loadMyFiles:function($ocLazyLoad) {
            return $ocLazyLoad.load({name:'sbAdminApp', files:['/app/scripts/controllers/comuniones.js'] })
          }
        }
      })

      .state('dashboard.comuniones-nuevo',{
        url:'/comuniones/nuevo',
        controller: 'NuevaComunionController',
        templateUrl:'/app/views/comuniones/nuevo.html',
        resolve: {
          loadMyFiles:function($ocLazyLoad) {
            return $ocLazyLoad.load({name:'sbAdminApp', files:['/app/scripts/controllers/comuniones.js'] })
          }
        }
      })

      .state('dashboard.comunion',{
        url:'/comunion/:id',
        controller: 'MostrarComunionController',
        templateUrl:'/app/views/comuniones/mostrar.html',
        resolve: {
          loadMyFiles:function($ocLazyLoad) {
            return $ocLazyLoad.load({name:'sbAdminApp', files:['/app/scripts/controllers/comuniones.js'] })
          }
        }
      })

      .state('dashboard.comunion-imprimir',{
        url:'/comunion-imprimir/:id',
        controller: 'ImprimirComunionController',
        templateUrl:'/app/views/comuniones/imprimir.html',
        resolve: {
          loadMyFiles:function($ocLazyLoad) {
            return $ocLazyLoad.load({name:'sbAdminApp', files:['/app/scripts/controllers/comuniones.js'] })
          }
        }
      })


      /* CONFIRMACIONES */
      .state('dashboard.confirmaciones',{
        url:'/confirmaciones',
        controller: 'ConfirmacionesController',
        templateUrl:'/app/views/confirmaciones/index.html',
        resolve: {
          loadMyFiles:function($ocLazyLoad) {
            return $ocLazyLoad.load({name:'sbAdminApp', files:['/app/scripts/controllers/confirmaciones.js'] })
          }
        }
      })

      .state('dashboard.confirmaciones-nuevo',{
        url:'/confirmaciones/nuevo',
        controller: 'NuevaConfirmacionController',
        templateUrl:'/app/views/confirmaciones/nuevo.html',
        resolve: {
          loadMyFiles:function($ocLazyLoad) {
            return $ocLazyLoad.load({name:'sbAdminApp', files:['/app/scripts/controllers/confirmaciones.js'] })
          }
        }
      })

      .state('dashboard.confirmacion',{
        url:'/confirmacion/:id',
        controller: 'MostrarConfirmacionController',
        templateUrl:'/app/views/confirmaciones/mostrar.html',
        resolve: {
          loadMyFiles:function($ocLazyLoad) {
            return $ocLazyLoad.load({name:'sbAdminApp', files:['/app/scripts/controllers/confirmaciones.js'] })
          }
        }
      })

      .state('dashboard.confirmacion-imprimir',{
        url:'/confirmacion-imprimir/:id',
        controller: 'ImprimirConfirmacionController',
        templateUrl:'/app/views/confirmaciones/imprimir.html',
        resolve: {
          loadMyFiles:function($ocLazyLoad) {
            return $ocLazyLoad.load({name:'sbAdminApp', files:['/app/scripts/controllers/confirmaciones.js'] })
          }
        }
      })

      /* MATRIMONIOS */
      .state('dashboard.matrimonios',{
        url:'/matrimonios',
        controller: 'MatrimoniosController',
        templateUrl:'/app/views/matrimonios/index.html',
        resolve: {
          loadMyFiles:function($ocLazyLoad) {
            return $ocLazyLoad.load({name:'sbAdminApp', files:['/app/scripts/controllers/matrimonios.js'] })
          }
        }
      })

      .state('dashboard.matrimonio-nuevo',{
        url:'/matrimonios/nuevo',
        controller: 'NuevoMatrimonioController',
        templateUrl:'/app/views/matrimonios/nuevo.html',
        resolve: {
          loadMyFiles:function($ocLazyLoad) {
            return $ocLazyLoad.load({name:'sbAdminApp', files:['/app/scripts/controllers/matrimonios.js'] })
          }
        }
      })

      .state('dashboard.matrimonio',{
        url:'/matrimonio/:id',
        controller: 'MostrarMatrimonioController',
        templateUrl:'/app/views/matrimonios/mostrar.html',
        resolve: {
          loadMyFiles:function($ocLazyLoad) {
            return $ocLazyLoad.load({name:'sbAdminApp', files:['/app/scripts/controllers/matrimonios.js'] })
          }
        }
      })

      .state('dashboard.matrimonio-imprimir',{
        url:'/matrimonio-imprimir/:id',
        controller: 'ImprimirMatrimonioController',
        templateUrl:'/app/views/matrimonios/imprimir.html',
        resolve: {
          loadMyFiles:function($ocLazyLoad) {
            return $ocLazyLoad.load({name:'sbAdminApp', files:['/app/scripts/controllers/matrimonios.js'] })
          }
        }
      })

      /* DEFUNCIONES */
      .state('dashboard.defunciones',{
        url:'/defunciones',
        controller: 'DefuncionesController',
        templateUrl:'/app/views/defunciones/index.html',
        resolve: {
          loadMyFiles:function($ocLazyLoad) {
            return $ocLazyLoad.load({name:'sbAdminApp', files:['/app/scripts/controllers/defunciones.js'] })
          }
        }
      })

      .state('dashboard.defuncion-nuevo',{
        url:'/defunciones/nuevo',
        controller: 'NuevaDefuncionController',
        templateUrl:'/app/views/defunciones/nuevo.html',
        resolve: {
          loadMyFiles:function($ocLazyLoad) {
            return $ocLazyLoad.load({name:'sbAdminApp', files:['/app/scripts/controllers/defunciones.js'] })
          }
        }
      })

      .state('dashboard.defuncion',{
        url:'/defunciones/:id',
        controller: 'MostrarDefuncionController',
        templateUrl:'/app/views/defunciones/mostrar.html',
        resolve: {
          loadMyFiles:function($ocLazyLoad) {
            return $ocLazyLoad.load({name:'sbAdminApp', files:['/app/scripts/controllers/defunciones.js'] })
          }
        }
      })

      .state('dashboard.defuncion-imprimir',{
        url:'/defuncion-imprimir/:id',
        controller: 'ImprimirDefuncionController',
        templateUrl:'/app/views/defunciones/imprimir.html',
        resolve: {
          loadMyFiles:function($ocLazyLoad) {
            return $ocLazyLoad.load({name:'sbAdminApp', files:['/app/scripts/controllers/defunciones.js'] })
          }
        }
      })







  }]).config(function(toastrConfig) {
    angular.extend(toastrConfig, {
      positionClass: 'toast-bottom-left'
    });
  });