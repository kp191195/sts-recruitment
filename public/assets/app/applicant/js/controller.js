(function() {
    'use strict';

    angular
        .module('ApplicantApp')
        .controller('ApplicantController', ApplicantController)
        .controller('ApplicantModalController', ApplicantModalController)
        .controller('ApplicantHistoryActivityModalController', ApplicantHistoryActivityModalController)
        .controller('ApplicantAcceptedModalController',ApplicantAcceptedModalController);
        
        
    ApplicantController.$inject = ['$scope','$state','$stateParams','$window','$uibModal','ApplicantService'];
    ApplicantModalController.$inject = ['$scope','$state','$uibModalInstance','applicantData','activeTab','dataForSendEmail','dataForSendNote','ApplicantService'];
    ApplicantHistoryActivityModalController.$inject = ['$scope','$state','$uibModalInstance','applicantData','ApplicantService'];
    ApplicantAcceptedModalController.$inject = ['$scope','$state','$uibModalInstance','applicantData','ApplicantService'];
   
    function ApplicantController($scope,$state,$stateParams,$window,$uibModal,ApplicantService){
      console.log('Masuk ke applicant controller');
      //console.log($stateParams.jobId);
      $scope.flgQualified = false;
      $scope.flgAccepted = false;
      $scope.flgFiltered = 'N';
      $scope.paramJobId = $stateParams.jobId;
      getJobList();
      getApplicantListForFirstLoad();

      // Digunakan untuk dropdown JOB
      function getJobList(){
          ApplicantService.getJobList($scope.paramJobId)
          .then(function(response){
              if (response.status == 'OK'){
                  //console.log(response);
                  $scope.jobList = response.result;
              } else{
                  alert("Terjadi kesalahan pada server!");
              }
          },function(response){
              alert("Terjadi kesalahan pada server!");
          });
      }

      function getApplicantListForFirstLoad(){
          var input = {
              jobId:$scope.paramJobId,
              flgFiltered:$scope.flgFiltered,
              flgQualified:$scope.flgQualified,
              flgAccepted:$scope.flgAccepted
          };
          //console.log(input);
          ApplicantService.getApplicantList(input)
          .then(function(response){
              if (response.status == 'OK'){
                  console.log(response);
                  $scope.applicantList = response.result;
              } else{
                  alert("Terjadi kesalahan pada server!");
              }
          },function(response){
              alert("Terjadi kesalahan pada server!");
          });
      }

      $scope.changedSelectedJob = function(selectedJob){
          console.log("INI JOB YANG DIPILIH");
          console.log(selectedJob);
          var input = {
              jobId:selectedJob,
              flgAccepted:$scope.flgAccepted,
              flgQualified:$scope.flgQualified,
              flgFiltered:$scope.flgFiltered
          }
          ApplicantService.getApplicantList(input)
          .then(function(response){
              if (response.status == 'OK'){
                  //console.log(response);
                  $scope.applicantList = response.result;
              } else{
                  alert("Terjadi kesalahan pada server!");
              }
          },function(response){
              alert("Terjadi kesalahan pada server!");
          });
      }

      $scope.filterApplicant = function(){
          var input = undefined;
          if($scope.flgQualified || $scope.flgAccepted){
              $scope.flgFiltered = 'Y'
          }
          else{
              $scope.flgFiltered = 'N'
          }
          console.log($scope.flgQualified);
          console.log($scope.flgAccepted);
          if($scope.selectedJob==undefined){
              input={
                  flgQualified:$scope.flgQualified,
                  flgAccepted:$scope.flgAccepted,
                  jobId:$scope.paramJobId,
                  flgFiltered:$scope.flgFiltered
              };
          }
          else{
              input={
                  flgQualified:$scope.flgQualified,
                  flgAccepted:$scope.flgAccepted,
                  jobId:$scope.selectedJob,
                  flgFiltered:$scope.flgFiltered
              };
          }


          // var input = {
          //     jobId:selectedJob
          // }
          ApplicantService.getApplicantList(input)
          .then(function(response){
              if (response.status == 'OK'){
                  //console.log(response);
                  $scope.applicantList = response.result;
              } else{
                  alert("Terjadi kesalahan pada server!");
              }
          },function(response){
              alert("Terjadi kesalahan pada server!");
          });
      }

      $scope.downloadCv = function(dataApplicant){
          $window.open('/api/downloadFileCv/'+dataApplicant.applicant_id);
      }

      $scope.downloadOtherFile = function(dataApplicant){
          $window.open('/api/downloadOtherFile/'+dataApplicant.applicant_id);
      }
      $scope.dataForSendEmail = {
          name:"",
          email:"",
          phone:"",
          contactBy:"",
          picName:"",
          meetingLocation:"",
          meetingDate:"",
          meetingTime:"",
          remark:"",
          note:""
      }
      $scope.dataForSendNote = {
        name:"",
        email:"",
        activity:"",
        remark:"",
        applicantId:""
    }
    $scope.updateQualified = function(dataApplicant){
        ApplicantService.updateQualified(dataApplicant)
        .then(function(response){
            if (response.status == 'OK'){
                getJobList();
                getApplicantListForFirstLoad();
                //console.log(response);
                //$scope.dataHistoryActivity = response.result;
                //$uibModalInstance.dismiss('cancel');
                // $scope.applicantList = response.result;
            } else{
                alert("Terjadi kesalahan pada server!");
            }
        },function(response){
            alert("Terjadi kesalahan pada server!");
        });
    }
    $scope.updateAccepted = function(dataApplicant){
        ApplicantService.updateAccepted(dataApplicant)
        .then(function(response){
            if (response.status == 'OK'){
                getJobList();
                getApplicantListForFirstLoad();
                //console.log(response);
                //$scope.dataHistoryActivity = response.result;
                //$uibModalInstance.dismiss('cancel');
                // $scope.applicantList = response.result;
            } else{
                alert("Terjadi kesalahan pada server!");
            }
        },function(response){
            alert("Terjadi kesalahan pada server!");
        });
    }
      $scope.openModal = function(dataApplicant,activeTab){
          var modalInstance = $uibModal.open({
            animation: true,
            ariaLabelledBy: 'modal-title',
            ariaDescribedBy: 'modal-body',
            templateUrl: '/assets/app/applicant/views/modalActivityNote.html',
            controller: 'ApplicantModalController',
            size:'lg',
            resolve: {
                  applicantData: function () {
                      return dataApplicant;
                  },
                  activeTab:function () {
                      return activeTab;
                  },
                  dataForSendEmail: function (){
                      return $scope.dataForSendEmail;
                  },
                  dataForSendNote: function (){
                      return $scope.dataForSendNote
                  }
            }
          });
      
          modalInstance.result.then(function (response) {
              if(response == 'OK'){
                  console.log("ASD");
                  getJobList();
                  getApplicantListForFirstLoad();
              }
              // $scope.picName = response;
              // console.log($scope.picName);
          }, function () {
            console.log('Modal dismissed at: ' + new Date());
          });
        };

        $scope.openModalHistoryActivity = function(dataApplicant){
          var modalInstance = $uibModal.open({
            animation: true,
            ariaLabelledBy: 'modal-title',
            ariaDescribedBy: 'modal-body',
            templateUrl: '/assets/app/applicant/views/modalHistoryActivity.html',
            controller: 'ApplicantHistoryActivityModalController',
            size:'lg',
            resolve: {
                  applicantData: function () {
                      return dataApplicant;
                  }
            }
          });
      
          modalInstance.result.then(function () {
              // $scope.picName = response;
              // console.log($scope.picName);
          }, function () {
            console.log('Modal dismissed at: ' + new Date());
          });
        };

        $scope.openModalAccepted = function(dataApplicant){
            var modalInstance = $uibModal.open({
              animation: true,
              ariaLabelledBy: 'modal-title',
              ariaDescribedBy: 'modal-body',
              templateUrl: '/assets/app/applicant/views/modalAccepted.html',
              controller: 'ApplicantAcceptedModalController',
              size:'lg',
              resolve: {
                    applicantData: function () {
                        return dataApplicant;
                    }
              }
            });
        
            modalInstance.result.then(function (response) {
                if(response == 'OK'){
                    console.log("ASD");
                    getJobList();
                    getApplicantListForFirstLoad();
                }
            }, function () {
              console.log('Modal dismissed at: ' + new Date());
            });
            console.log("ini method loooo");
          };
        

  }

  function ApplicantModalController($scope,$state,$uibModalInstance,applicantData,activeTab,dataForSendEmail,dataForSendNote,ApplicantService){
    console.log('Masuk ke controller modal');
    $scope.activityActive = false;
    $scope.noteActive = false;
    if(activeTab=='activity'){
        $scope.activityActive = true;
    }
    else{
        $scope.noteActive = true;
    }
    $scope.applicantData = applicantData;
    $scope.dataForSendEmail = dataForSendEmail;
    $scope.dataForSendNote = dataForSendNote
    $scope.dataForSendEmail.name = $scope.applicantData.name;
    $scope.dataForSendEmail.email = $scope.applicantData.email;
    $scope.dataForSendEmail.phone = $scope.applicantData.phone_no;
    console.log($scope.applicantData);
    console.log($scope.dataForSendEmail);
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

    $scope.sendEmail = function () {
        console.log($scope.dataForSendEmail);
        ApplicantService.sendEmail($scope.dataForSendEmail)
        .then(function(response){
            if (response.status == 'OK'){
                console.log(response);
                $uibModalInstance.dismiss('cancel');
                // $scope.applicantList = response.result;
            } else{
                alert("Terjadi kesalahan pada server!");
            }
        },function(response){
            alert("Terjadi kesalahan pada server!");
        });
    };

    $scope.sendNote = function () {
        $scope.dataForSendNote.applicantId =  $scope.applicantData.applicant_id;
        $scope.dataForSendNote.name =  $scope.applicantData.name;
        $scope.dataForSendNote.email =  $scope.applicantData.email;
        console.log($scope.dataForSendNote);
        ApplicantService.saveNote($scope.dataForSendNote)
        .then(function(response){
            if (response.status == 'OK'){
                console.log(response);
                $uibModalInstance.close(response.status);
                // $scope.applicantList = response.result;
            } else{
                alert("Terjadi kesalahan pada server!");
            }
        },function(response){
            alert("Terjadi kesalahan pada server!");
        });

    };
}

function ApplicantHistoryActivityModalController($scope,$state,$uibModalInstance,applicantData,ApplicantService){
    console.log('Masuk ke controller history activity modal');
    $scope.applicantData = applicantData;
    ApplicantService.getHistoryActivity(applicantData)
    .then(function(response){
        if (response.status == 'OK'){
            //console.log(response);
            $scope.dataHistoryActivity = response.result;
            //$uibModalInstance.dismiss('cancel');
            // $scope.applicantList = response.result;
        } else{
            alert("Terjadi kesalahan pada server!");
        }
    },function(response){
        alert("Terjadi kesalahan pada server!");
    });
    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
      };
}

function ApplicantAcceptedModalController($scope,$state,$uibModalInstance,applicantData,ApplicantService){
    console.log('Masuk ke controller history activity modal');
    console.log(applicantData);
    $scope.combo = undefined;
    $scope.accept = {
        applicantName:applicantData.name,
        applicantId:applicantData.applicant_id,
        jobApplyId:applicantData.job_apply_id,
        jobName:"",
        joinDate:"",
        startDate:"",
        placement:"",
        membership:"",
        supervisor:"",
    };
    var dataInput = {
        id:applicantData.job_apply_id
    }
    getComboForAcceptModal(dataInput);

    function getComboForAcceptModal(data){
        ApplicantService.getComboForAcceptModal(data)
            .then(function(response){
                console.log(response);
                $scope.combo = response.result;
                $scope.accept.jobName=response.result.jobName; 
            },function(response){
                alert("Terjadi kesalahan pada server!");
            });
        
    }

    $scope.status = {
        opened: false
      };
      $scope.status2 = {
        opened: false
      };
    $scope.format = 'dd-MMMM-yyyy';
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

    $scope.open2 = function($event) {
        $scope.status2.opened = true;
    };

    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
      };

      $scope.acceptEmployee = function () {
        console.log("HALO");
        console.log($scope.accept);

        ApplicantService.addEmployee($scope.accept)
            .then(function(response){
                console.log(response);
                $scope.combo = response.result;
                $uibModalInstance.close(response.status);
            },function(response){
                alert("Terjadi kesalahan pada server!");
            });

        
      };
    
}
    


})();