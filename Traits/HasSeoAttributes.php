<?php

namespace App\Modules\SeoManager\Traits;

trait HasSeoAttributes
{
    protected function seoFieldMap(): array
    {
        return [
            'meta_title'          => 'title',
            'meta_description'    => 'description',
            'meta_keywords'       => 'keywords',
            'canonical_url'       => 'canonical',
            'robots'              => 'robots',
            'og_title'            => 'og_title',
            'og_description'      => 'og_description',
            'og_type'             => 'og_type',
            'og_url'              => 'og_url',
            'og_image'            => 'og_image',
            'og_image_url'        => 'og_image',
            'og_image_alt'        => 'og_image_alt',
            'og_site_name'        => 'og_site_name',
            'twitter_card'        => 'twitter_card',
            'twitter_title'       => 'twitter_title',
            'twitter_description' => 'twitter_description',
            'twitter_image'       => 'twitter_image',
            'twitter_image_url'   => 'twitter_image',
            'twitter_site'        => 'twitter_site',
            'twitter_creator'     => 'twitter_creator',
        ];
    }

    public function getSeoAttributesPayload(array $defaults = []): array
    {
        $payload = $defaults;

        foreach ($this->seoFieldMap() as $field => $target) {
            $value = $this->{$field} ?? null;

            if ($value === null || $value === '') {
                continue;
            }

            if (in_array($target, ['og_image', 'twitter_image', 'canonical', 'og_url'], true)) {
                $value = $this->formatSeoUrl($value);
            }

            $payload[$target] = $value;
        }

        if (! empty($this->schema_markup)) {
            $payload['schema_markup'] = $this->schema_markup;
        }

        return $payload;
    }

    protected function formatSeoUrl(?string $value): ?string
    {
        if (! $value) {
            return null;
        }

        if (str_starts_with($value, 'http://') || str_starts_with($value, 'https://')) {
            return $value;
        }

        $base = rtrim(config('app.url'), '/');
        $clean = ltrim($value, '/');

        return "{$base}/{$clean}";
    }
}


