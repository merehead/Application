$.noConflict();

//App===============================================================================
var HolmApp = angular.module('HolmApp', [], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });


//Services===============================================================================
HolmApp.service('Helper', function(){

    this.isUpperCase = function(str) {
      return (str == str.toUpperCase());
    }
    this.isLowerCase = function(string) {
      return (str == str.toLowerCase());
    }

});


//Controllers===============================================================================
HolmApp.controller('CustomerRegisration', function($scope, $http){

    //MAIN==========================================================

    $scope.sendToServer = function(action){
        var data = {
            email: $scope.user.email,
            pass: $scope.user.pass.val
        }
        $http.post('/customer-registration/ajax', data).then(function(response){
            console.log(response);
        }, function(){})
    }





    //STEP 1=======================================
    $scope.user = {
        email: '',
        pass:{
            val: '',
        },
        confirmPass:{
            val: ''
        }
    }
    $scope.checkPass = function(){
        if(typeof $scope.user.pass.val === 'undefined')
            return false;

        $scope.passLength = {width: $scope.user.pass.val.length * 100/10+'%'};

        if($scope.user.pass.val.length >= 6){
            $scope.user.pass.errorClass = ''
            $scope.user.pass.check = 'check';
        }
        else{
            $scope.user.pass.errorClass = 'registrationForm__ico--wrong';
            $scope.user.pass.check = 'times';
        }
    }

    $scope.checkConfirmPass = function(){
        if(typeof $scope.user.confirmPass.val === 'undefined')
            return false;

        if($scope.user.confirmPass.val === $scope.user.pass.val){
            $scope.user.confirmPass.errorClass = ''
            $scope.user.confirmPass.check = 'check';
        }
        else{
            $scope.user.confirmPass.errorClass = 'registrationForm__ico--wrong';
            $scope.user.confirmPass.check = 'times';
        }
    }

});

