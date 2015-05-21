<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model {
        protected $connection = 'mysql';
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'locations';

	public $timestamps  = false;

}
