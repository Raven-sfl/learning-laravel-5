<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ObjectRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'title' => ['required', 'min:3'],
            'body' => ['required'],
            'base_id' => ['required', 'integer'],
            'price' => ['required', 'integer'],
            'published_at' => ['required', 'date'],
            'distance_to_city' => ['required', 'integer']
        ];

        return $rules;
    }

}