(function() {
    'use strict';

    angular
        .module('SettingApp')
        .controller('SettingController', SettingController)
        .controller('SettingModalController',SettingModalController)
        .controller('EditSettingModalController',EditSettingModalController)
        .controller('DeleteSettingModalController',DeleteSettingModalController);

        
        
    SettingController.$inject = ['$scope','$state','$stateParams','$window','$uibModal','SettingService'];
    SettingModalController.$inject = ['$scope','$state','$uibModalInstance','selectedCombo','SettingService'];
    EditSettingModalController.$inject = ['$scope','$state','$uibModalInstance','comboValueID','SettingService'];
    DeleteSettingModalController.$inject = ['$scope','$state','$uibModalInstance','comboValueID','SettingService'];


    function SettingController($scope,$state,$stateParams,$window,$uibModal,SettingService)
    {
      console.log("masuk kedalam controller");

      // View Combo List
      $scope.viewdata = function(){
        var input = {};
        SettingService.getComboValueList(input).then(function(response){
            //console.log(response.result);
            $scope.comboList = response.result;
        },function(response){
          alert("terjadi kesalahan pada selecte");
        });

      };

      $scope.viewdata();

      /*
      defaultCombo();
      
      function defaultCombo()
      {
        var input = {};
        SettingService.getComboValueList(input).then(function(response){
            //console.log(response.result);
            $scope.comboList = response.result;
        },function(response){
          alert("terjadi kesalahan pada selecte");
        });
      };
      */

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

      $scope.openEdit = function(comboValueID){
        $scope.status = {};
        console.log("comboValueID = "+comboValueID);
        console.log($scope.status);
        var modalInstance = $uibModal.open({
            animation: true,
            ariaLabelledBy: 'modal-title',
            ariaDescribedBy: 'modal-body',
            templateUrl: '/assets/app/setting/view/modalEditCombo.html',
            controller: 'EditSettingModalController',
            size:'lg',
            resolve: {
              comboValueID : function(){
                return comboValueID;
              }
            }
          });
      };

      $scope.delete = function(comboValueID){
        $scope.status = {};
        console.log("comboValueID = "+comboValueID);
        console.log($scope.status);
        var modalInstance = $uibModal.open({
            animation: true,
            ariaLabelledBy: 'modal-title',
            ariaDescribedBy: 'modal-body',
            templateUrl: '/assets/app/setting/view/modalDeleteCombo.html',
            controller: 'DeleteSettingModalController',
            size:'lg',
            resolve: {
              comboValueID : function(){
                return comboValueID;
              }
            }
          });

        modalInstance.result.then(function(){
          $scope.viewdata();
        }, function(){
          $log.info('Modal dismissed!');
        });
      };  

     }

    function SettingModalController($scope,$state,$uibModalInstance,selectedCombo,SettingService){
      $scope.selectedCombo = selectedCombo;
      var input  = {combo_id:$scope.selectedCombo};
      SettingService.getComboName(input).then(
        function(response){
            //console.log(response.result);
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
          if(response.status == 'OK')
          {
            console.log(response);
            $scope.status = response;
          }
        },function(response){
          alert("terjadi kesalahan pada server");
        });
        
      };

       $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
      };

    }


    function EditSettingModalController($scope,$state,$uibModalInstance,comboValueID,SettingService)
    { 
    

      var input = {comboid:comboValueID}
      SettingService.editComboValue(input).then(function(response){

        console.log(response.result[0]);
        $scope.combo = response.result[0];
        $scope.key = $scope.combo.key;
        $scope.value = $scope.combo.value;

      },function(response){
        alert("terjadi kesalahan pada server");
      });

      $scope.updateCombo = function(){
          var comboValue = {
          combo_id : comboValueID,
          key : $scope.key,
          value : $scope.value
        };

        SettingService.updateComboValue(comboValue).then(function(response){
          console.log(response);
          if(response.status == 'OK')
          {
            console.log(response);
            $scope.status = response;
            
          }
          
        },function(response){
          alert("terjadi kesalahan pada server");
        });
      };

       $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
      };


    }


    function DeleteSettingModalController ($scope,$state,$uibModalInstance,comboValueID,SettingService){



      $scope.delete = function(){
        var input = {combo_id:comboValueID};
        SettingService.deleteComboValue(input).then(function(response){
          if(response.status == 'OK')
          {
            $uibModalInstance.close();
            
          }
        },function(response){
          alert('terjadi kesalahan pada server');
        });
      };

      $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
      };
    }

})();