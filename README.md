# SeoManager Module

Reusable nwidart module that centralises SEO metadata (meta tags, Open Graph, Twitter cards and schema) for Laravel + Inertia projects.

## Features

- CRUD UI (Inertia/React) for defining SEO contexts (e.g. `page::home`, `static::privacy-policy`)
- Context-aware overrides consumed by `App\Helpers\SeoHelper`
- Extendable trait for models to expose SEO fields (`App\Modules\SeoManager\Traits\HasSeoAttributes`)
- Service class `App\Modules\SeoManager\Services\SeoManager` for retrieving/merging SEO payloads
- Publishable React pages via `php artisan vendor:publish --tag=seo-manager-views`

## Installation

```bash
composer require faysal0x1/seo-manager-module
php artisan module:enable SeoManager
php artisan migrate
```

## Usage

- Visit `/seo-manager` (authenticated) to manage entries.
- Tag specific contexts using `context` (e.g. `page::cart`, `static::return-policy`).
- Attach SEO directly to models by using the provided `HasSeoAttributes` trait.


