angular.module('AdministrasiApp',['ui.bootstrap','ui.router'],function($interpolateProvider){
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
})
.controller('AdministrasiCtrl',['$scope','$http','$window',function($scope,$http,$window){
    $scope.actionButton = function(eid,adminId,selectedCombo,status){
        window.open("http://localhost:8000/updateAdminDetail/"+eid+"/"+adminId+"/"+selectedCombo+"/"+status);
    }
}]);