(function() {
    'use strict';

    angular
        .module('SettingApp')
        .controller('SettingController', SettingController)
        .controller('SettingModalController',SettingModalController);

        
        
    SettingController.$inject = ['$scope','$state','$stateParams','$window','$uibModal','SettingService'];
    SettingModalController.$inject = ['$scope','$state','$uibModalInstance','selectedCombo','SettingService'];

    function SettingController($scope,$state,$stateParams,$window,$uibModal,SettingService)
    {

      console.log("masuk kedalam controller");
      defaultCombo();

      function defaultCombo()
      {
        var input = {};
        SettingService.getComboValueList(input).then(function(response){
            $scope.comboList = response.result;
        },function(response){
          alert("terjadi kesalahan pada selecte");
        });
      }


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
            $scope.comboList = response.result;
        },function(response){
          alert("terjadi kesalahan pada selecte");
        });
      };

      $scope.openModal = function(selectedCombo){
          var modalInstance = $uibModal.open({
            animation: true,
            ariaLabelledBy: 'modal-title',
            ariaDescribedBy: 'modal-body',
            templateUrl: '/assets/app/setting/view/modalAddCombo.html',
            controller: 'SettingModalController',
            size:'lg',
            resolve: {
              selectedCombo : function(){
                return selectedCombo;
              }
            }
          });
       };

     }

    function SettingModalController($scope,$state,$uibModalInstance,selectedCombo,SettingService){
      $scope.selectedCombo = selectedCombo;
      var input  = {combo_id:$scope.selectedCombo};
      SettingService.getComboName(input).then(
        function(response){
            $scope.combo = response.result;
        },
        function(response){
          alert("terjadi kesalahan pada server");
        });

      

      $scope.insertComboValue = function(){
        var comboAttribute = {
          combo_id : selectedCombo,
          key:$scope.key,
          value:$scope.value
        };

        SettingService.insertComboValue(comboAttribute).then(function(response){
          
        },function(response){
          alert("terjadi kesalahan pada server");
        });
        
      };

       $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
      };

    } 

})();