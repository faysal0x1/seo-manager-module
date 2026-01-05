<?php

namespace App\Modules\SeoManager\Repositories;

use App\Modules\SeoManager\Models\SeoEntry;
use App\Repositories\BaseRepository;

class SeoEntryRepository extends BaseRepository
{
    public function __construct(SeoEntry $model)
    {
        parent::__construct($model);
    }

    protected function getSearchableFields(): array
    {
        return [
            'name',
            'slug',
            'context',
            'meta_title',
            'meta_description',
            'meta_keywords',
            'route_name',
        ];
    }

    protected function getSortableFields(): array
    {
        return ['name', 'slug', 'context', 'is_active', 'created_at', 'updated_at'];
    }

    public function findByContext(string $context): ?SeoEntry
    {
        return $this->model
            ->where('context', $context)
            ->where('is_active', true)
            ->first();
    }

    public function findBySlug(string $slug): ?SeoEntry
    {
        return $this->model
            ->where('slug', $slug)
            ->where('is_active', true)
            ->first();
    }
}


