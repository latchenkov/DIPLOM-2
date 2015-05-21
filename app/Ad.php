<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Ad extends Model {
        protected $connection = 'mysql';
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'ads';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['type', 'title', 'price', 'seller_name', 'email', 'phone', 'location_id', 'category_id', 'description', 'allow_mails'];

        protected $casts = ['allow_mails' => 'boolean'];
        
// Извлекает все объявления        
        public static function getAllAds() {
            $data = self::all()->sortByDesc('id')->values();
                if ($data->isEmpty()){
                    $result['status']='warning';
                    $result['message'] = "Внимание! В базе данных нет объявлений.";
                }
                else {
                    $result['status'] = 'success';
                    $result['data'] = $data;
                }
            return response()->json($result);
	}
// Сохраняет или обновляет объявление в базе данных        
        public static function saveAdToDb ($data){
            $id = isset($data['id']) ? $data['id'] : null;
                    $model = self::findOrNew($id); 
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
// Удаляет объявление из БД        
        public static function deleteAdFromDb ($id){
            if(self::loadModel($id)->delete()){
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
        public static function loadModel($id){
            $model=self::find($id);
		if($model===null){
			App::abort(404);
                }
            return $model;
	}
// Устанавливает значения всех полей        
        public function setAttributes($attributes) {
            foreach ($attributes as $key => $value){
                $this->setAttribute($key, $value);
            }    
        }
// Переопределяет формат даты в timestamp       
        protected function getDateFormat() {
            return 'U';
        }
// Возвращает значение времени timestamp        
        protected function asDateTime($value){
            return $value;
        }
        
// Удаление лишних тэгов       
        public function setSellerNameAttribute($value) {
        $this->attributes['seller_name'] = strip_tags($value);
        }
        
        public function setPhoneAttribute($value) {
        $this->attributes['phone'] = strip_tags($value);
        }
        
        public function setTitleAttribute($value) {
        $this->attributes['title'] = strip_tags($value);
        }
        
        public function setDescriptionAttribute($value) {
        $this->attributes['description'] = strip_tags($value);
        }
}
