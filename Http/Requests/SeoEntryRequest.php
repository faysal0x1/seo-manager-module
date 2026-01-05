<?php

namespace App\Modules\SeoManager\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SeoEntryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('seo_manager') ?? $this->route('seo-manager') ?? null;

        return [
            'name'                => ['required', 'string', 'max:255'],
            'slug'                => [
                'required',
                'string',
                'max:255',
                Rule::unique('seo_entries', 'slug')->ignore($id),
            ],
            'context'             => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('seo_entries', 'context')->ignore($id),
            ],
            'route_name'          => ['nullable', 'string', 'max:255'],
            'seoable_type'        => ['nullable', 'string', 'max:255'],
            'seoable_id'          => ['nullable', 'integer'],
            'meta_title'          => ['nullable', 'string', 'max:255'],
            'meta_description'    => ['nullable', 'string'],
            'meta_keywords'       => ['nullable', 'string'],
            'canonical_url'       => ['nullable', 'string', 'max:255'],
            'robots'              => ['nullable', 'string', 'max:100'],
            'og_title'            => ['nullable', 'string', 'max:255'],
            'og_description'      => ['nullable', 'string'],
            'og_type'             => ['nullable', 'string', 'max:100'],
            'og_url'              => ['nullable', 'string', 'max:255'],
            'og_image'            => ['nullable', 'string', 'max:255'],
            'og_image_url'        => ['nullable', 'string', 'max:255'],
            'og_image_alt'        => ['nullable', 'string', 'max:255'],
            'og_site_name'        => ['nullable', 'string', 'max:255'],
            'twitter_card'        => ['nullable', 'string', 'max:100'],
            'twitter_title'       => ['nullable', 'string', 'max:255'],
            'twitter_description' => ['nullable', 'string'],
            'twitter_image'       => ['nullable', 'string', 'max:255'],
            'twitter_image_url'   => ['nullable', 'string', 'max:255'],
            'twitter_site'        => ['nullable', 'string', 'max:255'],
            'twitter_creator'     => ['nullable', 'string', 'max:255'],
            'schema_markup'       => ['nullable', 'string'],
            'extras'              => ['nullable', 'array'],
            'is_active'           => ['sometimes', 'boolean'],
        ];
    }
}


