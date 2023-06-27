<?php

namespace App\Http\Requests\Admin\Chapters;

use Illuminate\Foundation\Http\FormRequest;

class CreateChapterRequest extends FormRequest
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
            'comic_id'=>'required',
            'name'=>'required',
            'number_chapter'=>'required',
            'images'=>'required',
            'status'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'comic_id.required'=>'Không được để trống tên truyện',
            'name.required'=>'Không được để trống tiêu đề',
            'number_chapter.required'=>'Không được để trống chapter',
            'images.required'=>'Không được để trống ảnh',
            'status.required'=>'Không được để trống trạng thái',
        ];
    }
}
