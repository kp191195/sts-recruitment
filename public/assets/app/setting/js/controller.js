(function() {
    'use strict';

    angular
        .module('SettingApp')
        .controller('SettingController', SettingController);
        
        
    SettingController.$inject = ['$scope','$state','$stateParams','$window','$uibModal','SettingService'];

    function SettingController($scope,$state,$stateParams,$window,$uibModal,SettingService){
      console.log("masuk kedalam controller");
      
       SettingService.getComboList().then(
        function(response){
            if(response.status == 'OK')
            {
                $scope.combo = response.dataCombo;
            }
            else
            {
              alert("terjadi kesalahan pada server");
            }
        },function(response){
          alert("terjadi kesalahan pada server");
        });

      $scope.changedSelectedCombo = function(selectedCombo){
        console.log("selected combo = "+selectedCombo);
        var input = {combo_id:selectedCombo};
        SettingService.getComboValueList(input).then(function(response){
          console.log("line 30");
          console.log(response);
        });
      };

       $scope.openModal = function(){
          var modalInstance = $uibModal.open({
            animation: true,
            ariaLabelledBy: 'modal-title',
            ariaDescribedBy: 'modal-body',
            templateUrl: '/assets/app/setting/view/modalAddCombo.html',
            controller: '',
            size:'lg',
            resolve: {}
          });
       };

    }


})();