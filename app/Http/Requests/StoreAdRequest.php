<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreAdRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true ;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()	{
            
		return [
                    'title' => 'required|max:40',
                    'price' => 'required|numeric',
                    'seller_name' => 'required|max:40',
                    'type' => 'required',
                    'email' => 'required|email|max:40',
                    'phone' => 'required|max:20',
                    'location_id' => 'required',
                    'category_id' => 'required',
                    'description' => 'required|max:255'
		];
	}

}
