import GlobalForm from '@/components/GlobalForm';
import AppLayout from '@/layouts/app-layout.jsx';
import { Head } from '@inertiajs/react';
import { seoEntryFields } from './fields';

const defaultData = {
    name: '',
    slug: '',
    context: '',
    route_name: '',
    seoable_type: '',
    seoable_id: '',
    meta_title: '',
    meta_description: '',
    meta_keywords: '',
    canonical_url: '',
    robots: 'index, follow',
    og_title: '',
    og_description: '',
    og_type: 'website',
    og_url: '',
    og_image: '',
    og_image_url: '',
    og_image_alt: '',
    og_site_name: '',
    twitter_card: 'summary_large_image',
    twitter_title: '',
    twitter_description: '',
    twitter_image: '',
    twitter_image_url: '',
    twitter_site: '',
    twitter_creator: '',
    schema_markup: '',
    is_active: true,
};

export default function SeoEntryCreate() {
    return (
        <AppLayout breadcrumbs={[{ title: 'SEO Manager', href: route('seo-manager.index') }, { title: 'Create', href: route('seo-manager.create') }]}>
            <Head title="Create SEO Entry" />
            <GlobalForm
                title="Create SEO Entry"
                description="Define reusable SEO metadata for any route, slug, or module."
                initialData={defaultData}
                fields={seoEntryFields}
                submitUrl={route('seo-manager.store')}
                submitLabel="Save Entry"
                cancelUrl={route('seo-manager.index')}
                successMessage="SEO entry created successfully."
            />
        </AppLayout>
    );
}


