adsManagementApp.controller('mainController', function($scope, $http, $timeout, defaultValue, Data, Action){

// Функция сброса формы
    $scope.resetForm = function(form) {
        form.$rollbackViewValue();
            form.$setPristine(); //Set pristine state
                form.$setUntouched(); //Set state from touched to untouched
        Action.resetFormValue($scope);
    };
    
// Устанавливаем начальные значения формы
    Action.resetFormValue($scope);
    
// Сохранение объявления
    
    $scope.save = function (ad, form){
        //if(form.$valid){
            Data.
                saveAdFromDb(ad).
                    then(
                        function(answer) {
                            Action.successSaveAd (answer, form, $scope);
                        },
                        function(answer){
                            Action.errorSaveAd (answer, $scope);
                        }
                    );
        //}
    };

// Удаление объявления
    $scope.removeAd = function (index, form){
        Data.
            removeAdFromDb($scope.adsstore[index].id).
                then(
                    function(answer) {
                        Action.successRemoveAd (answer, form, index, $scope);
                    },
                    function(){
                        Action.errorRemoveAd ($scope);
                    }
                );
    };
        
    // Показ объявления в форме
    
    $scope.showAd = function (form, index, adsstore ){
        Action.showAd(form, index, adsstore, $scope);
    };

});