<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
        protected $connection = 'mysql';
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'categorys';

	public $timestamps  = false;

}
