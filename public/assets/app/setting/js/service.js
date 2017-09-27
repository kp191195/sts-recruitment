(function() {
    'use strict';

    angular
        .module('SettingApp')
        .factory('SettingService', SettingService);
        
    SettingService.$inject = ['$http','$q'];

    function SettingService($http,$q){
        var service = {          
            getComboList: getCombo,
            getComboValueList : getComboValueList
        }

        return service;
        
        ///////////////////////////////////////////

        function getCombo() {
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
                    method : 'GET',
                    url : '/api/getCombo'
                });
                return( request.then( handleSuccess, handleError ) );    
        }

        function getComboValueList(input) {
                // implementation details go here
                function handleError( response ) {
                    // The API response from the server should be returned in a
                    // nomralized format. However, if the request was not handled by the
                    // server (or what not handles properly - ex. server error), then we
                    // may have to normalize it on our end, as best we can.
                    if (! angular.isObject( response.data ) ||  ! response.data.message) {
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

                console.log("input = "+input);

                var request = $http({
                    method : 'POST',
                    url : '/api/getComboValueList',
                    params : input
                });
                return( request.then( handleSuccess, handleError ) );    
        }
    }


})();