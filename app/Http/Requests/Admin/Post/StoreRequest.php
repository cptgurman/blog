<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'category_id' => 'required|exists:categories,id', //Проверка на сушествование в бд категории
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо для заполнения',
            'title.string' => 'Данные должны быть строкой',
            'content.string' => 'Данные должны быть строкой',
            'content.required' => 'Это поле необходимо для заполнения',
            'preview_image.required' => 'Это поле необходимо для заполнения',
            'title.file' => 'Нужен файл',
            'main_image.required' => 'Это поле необходимо для заполнения',
            'main_image.file' => 'Нужен файл',
            'category_id.required' => 'Это поле необходимо для заполнения',
            'category_id.integer' => 'Id категории должен быть числом',
            'category_id.exists' => 'Id категории должен быть в базе',
            'tag_ids.array' => 'Необходимо отправить массив данных'
        ];
    }
}
