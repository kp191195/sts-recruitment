(function() {
    'use strict';

    angular
        .module('SettingApp')
        .factory('SettingService', SettingService);
        
    SettingService.$inject = ['$http','$q'];

    function SettingService($http,$q){
        var service = {          
            getComboList: getCombo,
            getComboValueList : getComboValueList,
            getComboName : getComboName,
            insertComboValue : insertComboValue,
            editComboValue : editComboValue,
            updateComboValue : updateComboValue,
            deleteComboValue : deleteComboValue
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


                var request = $http({
                    method : 'POST',
                    url : '/api/getComboValueList',
                    params : input
                });
                return( request.then( handleSuccess, handleError ) );    
        }

        function getComboName(input) {
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


                var request = $http({
                    method : 'POST',
                    url : '/api/getComboName',
                    params : input
                });
                return( request.then( handleSuccess, handleError ) );    
        }

        function insertComboValue(input) {
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


                var request = $http({
                    method : 'POST',
                    url : '/api/insertComboValue',
                    params : input
                });
                return( request.then( handleSuccess, handleError ) );    
        }

        function editComboValue(input) {
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


                var request = $http({
                    method : 'POST',
                    url : '/api/getComboValueByID',
                    params : input
                });
                return( request.then( handleSuccess, handleError ) );    
        }

        function updateComboValue(input) {
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


                var request = $http({
                    method : 'POST',
                    url : '/api/updateComboValue',
                    params : input
                });
                return( request.then( handleSuccess, handleError ) );    
        }

        function deleteComboValue(input) {
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

                var request = $http({
                    method : 'POST',
                    url : '/api/deleteComboValue',
                    params : input
                });
                return( request.then( handleSuccess, handleError ) );    
        }
    }


})();