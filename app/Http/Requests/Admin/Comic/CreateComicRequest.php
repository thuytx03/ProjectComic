<?php

namespace App\Http\Requests\Admin\Comic;

use Illuminate\Foundation\Http\FormRequest;

class CreateComicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required',
            'cover_image'=>'required',
            'genre_id' => 'required|array',
            'genres_id.*' => 'exists:genres,id',
            'author'=>'required',
            'description'=>'required',
            'status'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Không được để trống tên truyện',
            'cover_image.required' => 'Không được để trống ảnh bìa',
            'genre_id.required' => 'Không được để trống thể loại truyện',
            'author.required' => 'Không được để trống tác giả truyện',
            'description.required' => 'Không được để trống mô tả truyện',
            'status.required' => 'Không được để trống trạng thái truyện',
        ];
    }
}
