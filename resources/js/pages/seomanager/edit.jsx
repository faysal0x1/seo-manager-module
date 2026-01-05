import GlobalForm from '@/components/GlobalForm';
import AppLayout from '@/layouts/app-layout.jsx';
import { Head } from '@inertiajs/react';
import { seoEntryFields } from './fields';

export default function SeoEntryEdit({ entry }) {
    const breadcrumbs = [
        { title: 'SEO Manager', href: route('seo-manager.index') },
        { title: `Edit ${entry?.name}`, href: route('seo-manager.edit', entry?.id) },
    ];

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title={`Edit ${entry?.name}`} />
            <GlobalForm
                title={`Edit ${entry?.name}`}
                description="Update meta tags and structured data for this SEO context."
                initialData={{
                    ...entry,
                    seoable_id: entry?.seoable_id ?? '',
                    is_active: Boolean(entry?.is_active),
                }}
                fields={seoEntryFields}
                submitUrl={route('seo-manager.update', entry.id)}
                method="put"
                submitLabel="Update Entry"
                cancelUrl={route('seo-manager.index')}
                successMessage="SEO entry updated successfully."
            />
        </AppLayout>
    );
}


