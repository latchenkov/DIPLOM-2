var adsManagementApp = angular.module('adsManagementApp', [])

.constant('defaultValue', {
default_ad : {type:'private',location_id:'Новосибирск', price:0.00, allow_mails:false},
button_value : 'Добавить объявление'
})
.run(function($rootScope, Data, Informer, $http, $timeout){
    
// Начальная загрузка списка городов
    Data.
        getLocationList().
            then(function(value) { 
                $rootScope.location_list = value; 
            });
// Начальная загрузка списка категорий            
    Data.
        getCategoryList().
            then(function(value) { 
                $rootScope.category_list = value; 
            });
// Начальная загрузка хранилища объявлений            
    Data.
        getAllAdsFromDb().
            then(function(value) { 
                if (value.status === 'success'){
                    $rootScope.adsstore = value.data;
                }
                else if (value.status === 'warning'){
                    $rootScope.adsstore = [];
                    Informer.show ( $rootScope, value.status, value.message);
                } 
            });
});

