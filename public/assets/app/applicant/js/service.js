(function() {
    'use strict';

    angular
        .module('app')
        .factory('ApplicantService', ApplicantService);
        
    ApplicantService.$inject = ['$http','$q'];

    function ApplicantService($http,$q){
        var service = {
            // getAvengersCast: getAvengersCast,
            // getAvengerCount: getAvengerCount,
            // getAvengers: getAvengers,
            // ready: ready
        }

        return service;
        
        ///////////////////////////////////////////

        // function getAvengers() {
        //     // implementation details go here
        // }
    
        // function getAvengerCount() {
        //     // implementation details go here
        // }
    
        // function getAvengersCast() {
        //     // implementation details go here
        // }
    
        // function prime() {
        //     // implementation details go here
        // }
    
        // function ready(nextPromises) {
        //     // implementation details go here
        // }

    }


})();