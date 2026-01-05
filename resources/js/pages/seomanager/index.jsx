import ListingPage from '@/components/ListingPage';
import ActionsDropdown from '@/components/ActionsDropdown';
import { column, createSerialColumn } from '@/utils/tableUtils';
import { usePage } from '@inertiajs/react';

export default function SeoManagerIndex() {
    const { entries, filters = {}, auth } = usePage().props;

    const columns = [
        createSerialColumn('Serial'),
        column('name', 'Name'),
        column('slug', 'Slug'),
        column('context', 'Context', (item) => item.context || '—'),
        column('route_name', 'Route', (item) => item.route_name || '—'),
        column('meta_title', 'Meta Title', (item) => item.meta_title || '—'),
        column(
            'is_active',
            'Status',
            (item) => (
                <span className={`inline-flex rounded-full px-2 text-xs font-semibold leading-5 ${item.is_active ? 'bg-green-100 text-green-800' : 'bg-gray-200 text-gray-700'}`}>
                    {item.is_active ? 'Active' : 'Inactive'}
                </span>
            ),
        ),
        column('actions', 'Actions', (item) => (
            <ActionsDropdown
                item={item}
                actions={[
                    {
                        type: 'edit',
                        label: 'Edit',
                        route: (id) => route('seo-manager.edit', id),
                    },
                    {
                        type: 'delete',
                        label: 'Delete',
                        route: (id) => route('seo-manager.destroy', id),
                        method: 'delete',
                    },
                ]}
            />
        )),
    ];

    return (
        <ListingPage
            title="SEO Manager"
            data={entries}
            filters={filters}
            currentUser={auth?.user}
            resourceName="seo-manager"
            breadcrumbs={[{ title: 'SEO Manager', href: route('seo-manager.index') }]}
            columns={columns}
            createButtonText="New SEO Entry"
        />
    );
}


