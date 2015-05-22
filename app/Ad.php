<?php namespace App;

use Illuminate\Database\Eloquent\Model;

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
