<?php

namespace App\Modules\SeoManager\Services;

use App\Modules\SeoManager\Repositories\SeoEntryRepository;
use Illuminate\Database\Eloquent\Model;

class SeoManager
{
    public function __construct(
        private readonly SeoEntryRepository $entries
    ) {
    }

    public function forContext(?string $context): array
    {
        if (! $context) {
            return [];
        }

        $entry = $this->entries->findByContext($context);

        if (! $entry) {
            return [];
        }

        return $this->transform($entry->toArray());
    }

    public function forModel(Model $model, array $defaults = []): array
    {
        if (method_exists($model, 'getSeoAttributesPayload')) {
            return $model->getSeoAttributesPayload($defaults);
        }

        if (method_exists($model, 'getSeoAttributes')) {
            return array_merge($defaults, array_filter(
                $model->getSeoAttributes(),
                fn ($value) => $value !== null && $value !== ''
            ));
        }

        return $defaults;
    }

    public function merge(array ...$groups): array
    {
        $merged = [];

        foreach ($groups as $group) {
            foreach ($group as $key => $value) {
                if ($value === null || $value === '') {
                    continue;
                }

                $merged[$key] = $value;
            }
        }

        return $merged;
    }

    protected function transform(array $data): array
    {
        $map = [
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
            'schema_markup'       => 'schema_markup',
        ];

        $payload = [];

        foreach ($map as $source => $target) {
            if (! array_key_exists($source, $data) || $data[$source] === null || $data[$source] === '') {
                continue;
            }

            $value = $data[$source];

            if (in_array($target, ['og_image', 'twitter_image', 'canonical', 'og_url'], true)) {
                $value = $this->formatUrl($value);
            }

            $payload[$target] = $value;
        }

        return $payload;
    }

    protected function formatUrl(?string $value): ?string
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


