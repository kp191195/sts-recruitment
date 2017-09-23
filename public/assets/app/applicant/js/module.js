(function() {
    'use strict';

    angular
        .module('app',[
            'ui.router',
            'ui.bootstrap'
        ],function($interpolateProvider) {
            $interpolateProvider.startSymbol('<%');
            $interpolateProvider.endSymbol('%>');
        });

    
})();