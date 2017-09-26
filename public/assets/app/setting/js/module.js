(function() {
    'use strict';

    angular
        .module('SettingApp',[
            'ui.router',
            'ui.bootstrap'
        ])
        .config(myConfig);
        
        function myConfig($stateProvider,$urlRouterProvider){
            $stateProvider
            .state('setting', {
                url: '/setting',
                templateUrl: '/assets/app/setting/view/setting.html',
                controller: 'SettingController'
            });
            $urlRouterProvider.otherwise("/setting");
        }

    
})();