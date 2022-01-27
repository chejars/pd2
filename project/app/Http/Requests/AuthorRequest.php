<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
        'name' => 'required',
        ];
    }

    public function messages()
    {
        return [
        'required' => 'Lauks ":attribute" ir obligāts',
        'min' => 'Laukam ":attribute" jābūt vismaz :min simbolus garam',
        'max' => 'Lauks ":attribute" nedrīkst būt garāks par :max simboliem',
        'boolean' => 'Lauka ":attribute" vērtībai jābūt "true" vai "false"',
        'unique' => 'Šāda lauka ":attribute" vērtība jau ir reģistrēta',
        'numeric' => 'Lauka ":attribute" vērtībai jābūt skaitlim',
        ];
    }

    public function attributes()
    {
        return [
        'name' => 'vārds',
        ];
    }
}
