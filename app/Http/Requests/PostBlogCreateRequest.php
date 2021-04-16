<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostBlogCreateRequest extends FormRequest
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
            'title' => 'required|string|min:3|max:191',
            'subtitle' => 'required|string|min:3|max:191',
            'headline' => 'required|string|min:20|max:300',
            'contents' => 'required|string|min:100|max:50000',
            'image_path' => 'required|image|mimes:jpeg,png,bmp,svg,webp|max:5120',
            'category_id' => 'required',
        ];
    }

    public function attributes() {
        return [
            'title' => 'título',
            'subtitle' => 'subtítulo',
            'headline' => 'resumo',
            'contents' => 'conteúdo',
            'image_path' => 'imagem',
            'category_id' => 'categoria',
        ];
    }
}
