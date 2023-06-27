<?php

namespace App\Http\Requests\Admin\Chapters;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateChapterResquest extends FormRequest
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
            'name' => [
                'required',
                Rule::unique('chapters')->ignore($this->id),
            ],
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Không được để trống tên thể loại',
            'name.unique'=>'Tên thể loại đã tồn tại, vui lòng nhập tên khác',
            // 'status.required'=>'Không được để trống trạng thái',
        ];
    }
}
