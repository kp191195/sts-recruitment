(function() {
    'use strict';

    angular
        .module('app')
        .controller('ApplicantMainController', ApplicantMainController);
        
    ApplicantMainController.$inject = ['$scope','$state','$uibModal','ApplicantService'];

    function ApplicantMainController($scope,$state,$uibModal,ApplicantService){
        console.log('Masuk ke main applicant main controller');

        $scope.open = function () {
            var modalInstance = $uibModal.open({
              animation: true,
              ariaLabelledBy: 'modal-title',
              ariaDescribedBy: 'modal-body',
              templateUrl: '/assets/app/applicant/views/test.html'
            //   controller: 'ModalInstanceCtrl',
            //   controllerAs: '$ctrl',
            //   resolve: {
            //     items: function () {
            //       return $ctrl.items;
            //     }
            //   }
            });
        
            modalInstance.result.then(function () {
              //$ctrl.selected = selectedItem;
            }, function () {
              console.log('Modal dismissed at: ' + new Date());
            });
          };

    }


})();