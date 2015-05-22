<?php namespace App\Http\Controllers;

use App\Ad;
use Request;
use App\Http\Requests\StoreAdRequest;
use Illuminate\Support\Facades\App;

class AdsController extends Controller {
    
        public function postSave(StoreAdRequest $request){
            // получение данных POST
            $data = Request::all();
            // обработка данных
            if ($data['seller_name'] && $data['description']) { // если была нажата кнопка
                $id = isset($data['id']) ? $data['id'] : null;
                    $id = isset($data['id']) ? $data['id'] : null;
                    $model = Ad::findOrNew($id); 
                        $model->setAttributes($data);
                            if($model->save()){ 
                                $result['status']='success';
                                $result['message'] = "Объявление № ".$model->id." сохранено в базе данных";
                                $result['data'] = $model->attributesToArray();
                            }
                            else{
                                $result['status']='error';
                                $result['message'] = "Объявление не удалось сохранить в базе данных";
                            }
                return response()->json($result);
            }			
        }
    
        // Удаление объявления
        public function getDelete($id){
            if($this -> loadModel($id) -> delete()){
                    $result['status']='success';
                    $result['message'] = "Объявление ".$id." удалено из базы данных";
                }
                else{
                    $result['status']='error';
                    $result['message'] = "При удалении объявления возникли ошибки";
                }
            return response()->json($result);
        }
        
        // Находит и загружает модель из БД        
        public function loadModel($id){
            $model=Ad::find($id);
		if($model===null){
                    App::abort(404);
                }
            return $model;
	}
}
