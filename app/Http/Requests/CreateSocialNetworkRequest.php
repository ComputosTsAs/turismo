<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\SocialNetwork;

class CreateSocialNetworkRequest extends FormRequest
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
        return SocialNetwork::$rules;
    }

    /**
     * Get the messages for validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return SocialNetwork::$messages_es;
    }
}