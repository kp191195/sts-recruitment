(function() {
    'use strict';

    angular
        .module('ApplicantApp',[
            'ui.router',
            'ui.bootstrap'
        ])
        .config(myConfig);
        
        function myConfig($stateProvider,$urlRouterProvider){
            $stateProvider
            .state('applicant', {
                url: '/applicant/:jobId',
                templateUrl: '/assets/app/applicant/views/applicant.html',
                controller: 'ApplicantController'
            });
            $urlRouterProvider.otherwise("/applicant/-99");
        }

    
})();