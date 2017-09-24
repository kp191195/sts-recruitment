(function() {
    'use strict';

    angular
        .module('app')
        .controller('ApplicantMainController', ApplicantMainController)
        .controller('ApplicantModalController', ApplicantModalController);
        
    ApplicantMainController.$inject = ['$scope','$state','$uibModal','ApplicantService'];
    ApplicantModalController.$inject = ['$scope','$state','$uibModalInstance','applicantData','ApplicantService'];

    function ApplicantMainController($scope,$state,$uibModal,ApplicantService){
        console.log('Masuk ke main applicant main controller');

        $scope.open = function () {
            var dataApplicant = {
              name:'Jacob',
              email:'jacob@gmail.com'
            };
           
            var modalInstance = $uibModal.open({
              animation: true,
              ariaLabelledBy: 'modal-title',
              ariaDescribedBy: 'modal-body',
              templateUrl: '/assets/app/applicant/views/test.html',
              controller: 'ApplicantModalController',
              size:'lg',
              resolve: {
                    applicantData: function () {
                      return dataApplicant;
                    }
              }
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

    function ApplicantModalController($scope,$state,$uibModalInstance,applicantData,ApplicantService){
        console.log('Masuk ke controller modal');
        console.log(applicantData);
        
        $scope.format = 'dd-MMMM-yyyy';
        $scope.status = {
          opened: false
        };
        $scope.minDate = $scope.minDate ? null : new Date();
        $scope.dateOptions = {
          formatYear: 'yy',
          startingDay: 1
        };
        $scope.disabled = function(date, mode) {
          return ( mode === 'day' && ( date.getDay() === 0 || date.getDay() === 6 ) );
        };

        $scope.open = function($event) {
          $scope.status.opened = true;
        };

        $scope.ismeridian = true;
        $scope.mstep = 15;
        $scope.hstep = 1;
        
        $scope.cancel = function () {
          $uibModalInstance.dismiss('cancel');
        };
    }


})();