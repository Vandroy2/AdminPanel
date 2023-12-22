<?php

use Illuminate\Foundation\Http\FormRequest;
use  Edguy\AdminPanel\Traits\ValidationRule;

class SeoRequest extends FormRequest
{
    use ValidationRule;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title_uk' => $this->stringRule(),
            'title_en' => $this->stringRule(),
            'description_uk' => $this->stringRule(true, 100000),
            'description_en' => $this->stringRule(true, 100000),
            'seo_url' =>  $this->stringRule(),
        ];
    }

    public function messages()
    {
        return [
            'title_uk.required' => 'Помилка.Заголовок українською є обов\'язковим',
            'title_en.required' => 'Помилка.Заголовок англiйською є обов\'язковим',
            'description_uk.required' => 'Помилка.Опис українською є обов\'язковим',
            'description_en.required' => 'Помилка.Опис англiйською є обов\'язковим',
            'seo_url.required' => 'Помилка.Адреса є обов\'язковою',
        ];
    }
}
