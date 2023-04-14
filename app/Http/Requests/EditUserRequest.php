<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama_member'=> 'required',
            'email'=> 'required',
            'tanggal_lahir'=> 'required|date',
            'no_ktp'=> 'required|max:16|min:16',
            'jenis_kelamin'=>'required',
            'no_hp'=>'required|min:10|numeric',
            'foto'=>'image|max:1024'
        ];
    }
}
