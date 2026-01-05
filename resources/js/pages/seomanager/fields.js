export const seoEntryFields = [
    { name: 'name', label: 'Entry Name', type: 'text', required: true },
    { name: 'slug', label: 'Slug', type: 'text', required: true, helpText: 'Unique identifier for reference (e.g. return-policy)' },
    { name: 'context', label: 'Context Key', type: 'text', helpText: 'Optional key used by SeoHelper (e.g. page::home, static::privacy-policy)' },
    { name: 'route_name', label: 'Route Name', type: 'text', helpText: 'Link this entry to a Laravel route name (optional)' },
    { name: 'seoable_type', label: 'Seoable Type', type: 'text', helpText: 'Fully qualified model class to auto-attach SEO (optional)' },
    { name: 'seoable_id', label: 'Seoable ID', type: 'number', helpText: 'Model identifier (optional)' },

    // Meta basics
    { name: 'meta_title', label: 'Meta Title', type: 'text' },
    { name: 'meta_description', label: 'Meta Description', type: 'textarea', rows: 3 },
    { name: 'meta_keywords', label: 'Meta Keywords', type: 'textarea', rows: 2, helpText: 'Comma separated keywords' },
    { name: 'canonical_url', label: 'Canonical URL', type: 'url' },
    { name: 'robots', label: 'Robots', type: 'text', placeholder: 'index, follow' },

    // Open Graph
    { name: 'og_title', label: 'OG Title', type: 'text' },
    { name: 'og_description', label: 'OG Description', type: 'textarea', rows: 3 },
    { name: 'og_type', label: 'OG Type', type: 'text', placeholder: 'website' },
    { name: 'og_url', label: 'OG URL', type: 'url' },
    { name: 'og_image_url', label: 'OG Image URL', type: 'url' },
    { name: 'og_image', label: 'OG Image Path', type: 'text', helpText: 'Relative path alternative to full URL' },
    { name: 'og_image_alt', label: 'OG Image Alt', type: 'text' },
    { name: 'og_site_name', label: 'OG Site Name', type: 'text' },

    // Twitter
    { name: 'twitter_card', label: 'Twitter Card', type: 'text', placeholder: 'summary_large_image' },
    { name: 'twitter_title', label: 'Twitter Title', type: 'text' },
    { name: 'twitter_description', label: 'Twitter Description', type: 'textarea', rows: 3 },
    { name: 'twitter_image_url', label: 'Twitter Image URL', type: 'url' },
    { name: 'twitter_image', label: 'Twitter Image Path', type: 'text' },
    { name: 'twitter_site', label: 'Twitter Site', type: 'text' },
    { name: 'twitter_creator', label: 'Twitter Creator', type: 'text' },

    { name: 'schema_markup', label: 'Schema Markup (JSON-LD)', type: 'textarea', rows: 6 },
    { name: 'is_active', label: 'Active', type: 'switch' },
];


