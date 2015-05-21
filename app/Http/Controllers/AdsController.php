<?php namespace App\Http\Controllers;

use App\Ad;
use Request;
use App\Http\Requests\StoreAdRequest;

class AdsController extends Controller {
    
        public function postSave(StoreAdRequest $request){
            // получение данных POST
            $data = Request::all();
            // обработка данных
            if ($data['seller_name'] && $data['description']) { // если была нажата кнопка
                $id = isset($data['id']) ? $data['id'] : null;
                    return Ad::saveAdToDb($data);
            }			
        }
    
        // Удаление объявления
        public function getDelete($id){
            return Ad::deleteAdFromDb ($id);
        }
}
