import * as galleryRoutes from '@/routes/gallery';
import * as newsletterRoutes from '@/routes/newsletter';
import * as newsletterSubscriberRoutes from '@/routes/newsletter/subscribers';
import * as sponsorRoutes from '@/routes/sponsors';

type RouteName =
    | 'gallery.index'
    | 'gallery.create'
    | 'gallery.store'
    | 'gallery.edit'
    | 'gallery.update'
    | 'gallery.destroy'
    | 'sponsors.index'
    | 'sponsors.create'
    | 'sponsors.store'
    | 'sponsors.edit'
    | 'sponsors.update'
    | 'sponsors.destroy'
    | 'newsletter.index'
    | 'newsletter.preview'
    | 'newsletter.send'
    | 'newsletter.subscribers.destroy';

/**
 * Global route helper that uses wayfinder generated routes
 */
export function route(name: RouteName, params?: any): string {
    try {
        if (name === 'gallery.index') return galleryRoutes.index().url;
        if (name === 'gallery.create') return galleryRoutes.create().url;
        if (name === 'gallery.store') return galleryRoutes.store().url;
        if (name === 'gallery.edit') return galleryRoutes.edit(params).url;
        if (name === 'gallery.update') return galleryRoutes.update(params).url;
        if (name === 'gallery.destroy')
            return galleryRoutes.destroy(params).url;

        if (name === 'sponsors.index') return sponsorRoutes.index().url;
        if (name === 'sponsors.create') return sponsorRoutes.create().url;
        if (name === 'sponsors.store') return sponsorRoutes.store().url;
        if (name === 'sponsors.edit') return sponsorRoutes.edit(params).url;
        if (name === 'sponsors.update') return sponsorRoutes.update(params).url;
        if (name === 'sponsors.destroy')
            return sponsorRoutes.destroy(params).url;

        if (name === 'newsletter.index') return newsletterRoutes.index().url;
        if (name === 'newsletter.preview')
            return newsletterRoutes.preview().url;
        if (name === 'newsletter.send') return newsletterRoutes.send().url;
        if (name === 'newsletter.subscribers.destroy')
            return newsletterSubscriberRoutes.destroy(params).url;

        console.error(`Route ${name} not found`);
        return '#';
    } catch (error) {
        console.error(`Error generating route ${name}:`, error);
        return '#';
    }
}

/**
 * Hook to access routes - for use in React components
 */
export function useRoute() {
    return route;
}
