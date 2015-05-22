// Функция определения индекса объявления в хранилище
    function getAdIndex (adsstore, id){
        var index = -1;
            for (var i=0; i<adsstore.length; i++){
                if (adsstore[i].id === id){
                    index = i;
                }
            }
        return index;    
    } 

adsManagementApp.factory('Action', function ($timeout, defaultValue, Informer) {
    
    return {
// Функция сохранения объявления в случае успешного ответа сервера    
    successSaveAd: function (answer, form, $scope) {
                        if (answer.status === 'success'){
                            $scope.resetForm(form);
                                var index = getAdIndex ($scope.adsstore, answer.data.id);
                                if (index < 0){
                                    $scope.adsstore.unshift(answer.data); // push если по возрастанию (в конец)
                                }
                                else{
                                    $scope.adsstore.splice(index,1,answer.data);
                                }
                            Informer.show ( $scope, answer.status, answer.message);
                        }
                        else if (answer.status === 'error'){
                            Informer.show ( $scope, answer.status, answer.message);
                        } 
                   },
// Функция сохранения объявления в случае успешного ответа сервера
    errorSaveAd: function (answer, $scope){ 
                    if (answer.status === 422){
                        $scope.error = answer;
                    }
                    else {
                        Informer.show ( $scope, 
                                        'error', 
                                        'Внимание! При сохранении объявления что-то пошло не так.<br />\n\
                                         Проверьте соединение с базой данных.');
                    }
                 },                   
// Функция удаления объявления в случае ошибочного ответа сервера    
    successRemoveAd: function (answer, form, index, $scope){
                        if (answer.status === 'success'){
                            if($scope.ad.id === $scope.adsstore[index].id){
                                $scope.resetForm(form);
                            }
                                $scope.adsstore.splice(index,1);
                                    Informer.show ( $scope, answer.status, answer.message);
                                        if ($scope.adsstore.length === 0){    
                                            answer.status = 'warning';
                                            answer.message = 'Внимание! В базе данных нет объявлений.';
                                                $timeout(function(){
                                                    Informer.show ( $scope, answer.status, answer.message);
                                                }, 3000);
                                        }
                        }    
                        else if (answer.status === 'error'){
                            Informer.show ( $scope, answer.status, answer.message);
                        } 
                    },
// Функция в случае ошибочного ответа сервера                    
    errorInform: function ($scope){
                        Informer.show ( $scope, 'error', 
                                             'Упс! Что-то пошло не так.<br />\n\
                                              Проверьте соединение с базой данных.');
                   },
// Показ объявления в форме
    showAd: function (form, index, adsstore, $scope){
                $scope.resetForm(form);
                $scope.ad = angular.copy(adsstore[index]);
                $scope.buttontext = 'Сохранить объявление';
            },
                   
// Функция установки начальных значений формы
    resetFormValue: function ($scope){
                        $scope.ad = angular.copy(defaultValue.default_ad);
                        $scope.error = {};
                        $scope.buttontext = defaultValue.button_value;
                    }
    }; 
});


