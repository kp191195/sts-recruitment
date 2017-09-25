(function() {
    'use strict';

    angular
        .module('DashboardApp',[
            'ui.router',
            'ui.bootstrap'
        ])
        .config(myConfig);

        function myConfig($stateProvider,$urlRouterProvider){
            $stateProvider
            .state('dashboard', {
                url: '/dashboard',
                templateUrl: '/assets/app/dashboard/views/dashboard.html',
                controller: 'DashboardController'
            })
            .state('applicant', {
                url: '/applicant/:jobId',
                templateUrl: '/assets/app/applicant/views/applicant.html',
                controller: 'DashboardApplicantController'
            });
            $urlRouterProvider.otherwise("/dashboard");
        }
    
})();