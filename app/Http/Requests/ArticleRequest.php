<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class ArticleRequest extends Request
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
            'published_at' => ['required', 'date']
        ];

        return $rules;
    }


}

