(function() {
    'use strict';

    angular
        .module('ApplicantApp')
        .factory('ApplicantService', ApplicantService);
        
    ApplicantService.$inject = ['$http','$q'];

    function ApplicantService($http,$q){
        var service = {
            getJobList: getJobList,
            getApplicantList: getApplicantList,
            sendEmail: sendEmail,
            getHistoryActivity: getHistoryActivity,
            saveNote: saveNote
        }

        return service;
        
        ///////////////////////////////////////////

        function getJobList(input) {
            // implementation details go here
            function handleError( response ) {
                // The API response from the server should be returned in a
                // nomralized format. However, if the request was not handled by the
                // server (or what not handles properly - ex. server error), then we
                // may have to normalize it on our end, as best we can.
                if (! angular.isObject( response.data ) ||	! response.data.message) {
                    return( $q.reject( "Server gagal dihubungi. Hubungi Administrator" ) );
                }

                // Otherwise, use expected error message.
                return( $q.reject( response.data.message ) );
            }
                
            // I transform the successful response, unwrapping the application data
            // from the API response payload.
            function handleSuccess( response ) {
                return( response.data );
            }

            var request = $http({
                method : 'POST',
                url : '/api/getJobList',
                input:input
            });
            return( request.then( handleSuccess, handleError ) );


            
        }
        function getApplicantList(input) {
            // implementation details go here
            function handleError( response ) {
                // The API response from the server should be returned in a
                // nomralized format. However, if the request was not handled by the
                // server (or what not handles properly - ex. server error), then we
                // may have to normalize it on our end, as best we can.
                if (! angular.isObject( response.data ) ||	! response.data.message) {
                    return( $q.reject( "Server gagal dihubungi. Hubungi Administrator" ) );
                }

                // Otherwise, use expected error message.
                return( $q.reject( response.data.message ) );
            }
                
            // I transform the successful response, unwrapping the application data
            // from the API response payload.
            function handleSuccess( response ) {
                return( response.data );
            }

            var request = $http({
                method : 'POST',
                url : '/api/getApplicantList',
                params:input
            });
            return( request.then( handleSuccess, handleError ) );


            
        }
        function sendEmail(input) {
            // implementation details go here
            function handleError( response ) {
                // The API response from the server should be returned in a
                // nomralized format. However, if the request was not handled by the
                // server (or what not handles properly - ex. server error), then we
                // may have to normalize it on our end, as best we can.
                if (! angular.isObject( response.data ) ||	! response.data.message) {
                    return( $q.reject( "Server gagal dihubungi. Hubungi Administrator" ) );
                }

                // Otherwise, use expected error message.
                return( $q.reject( response.data.message ) );
            }
                
            // I transform the successful response, unwrapping the application data
            // from the API response payload.
            function handleSuccess( response ) {
                return( response.data );
            }

            var request = $http({
                method : 'POST',
                url : '/api/sendEmail',
                params:input
            });
            return( request.then( handleSuccess, handleError ) );


            
        }
        function getHistoryActivity(input) {
            // implementation details go here
            function handleError( response ) {
                // The API response from the server should be returned in a
                // nomralized format. However, if the request was not handled by the
                // server (or what not handles properly - ex. server error), then we
                // may have to normalize it on our end, as best we can.
                if (! angular.isObject( response.data ) ||	! response.data.message) {
                    return( $q.reject( "Server gagal dihubungi. Hubungi Administrator" ) );
                }

                // Otherwise, use expected error message.
                return( $q.reject( response.data.message ) );
            }
                
            // I transform the successful response, unwrapping the application data
            // from the API response payload.
            function handleSuccess( response ) {
                return( response.data );
            }

            var request = $http({
                method : 'POST',
                url : '/api/getHistoryActivity',
                params:input
            });
            return( request.then( handleSuccess, handleError ) );


            
        }

        function saveNote(input) {
            // implementation details go here
            function handleError( response ) {
                // The API response from the server should be returned in a
                // nomralized format. However, if the request was not handled by the
                // server (or what not handles properly - ex. server error), then we
                // may have to normalize it on our end, as best we can.
                if (! angular.isObject( response.data ) ||	! response.data.message) {
                    return( $q.reject( "Server gagal dihubungi. Hubungi Administrator" ) );
                }

                // Otherwise, use expected error message.
                return( $q.reject( response.data.message ) );
            }
                
            // I transform the successful response, unwrapping the application data
            // from the API response payload.
            function handleSuccess( response ) {
                return( response.data );
            }

            var request = $http({
                method : 'POST',
                url : '/api/sendNote',
                params:input
            });
            return( request.then( handleSuccess, handleError ) );


            
        }
    }


})();