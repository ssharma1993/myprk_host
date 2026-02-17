import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../../../wayfinder'
/**
* @see \App\Http\Controllers\HomeController::index
* @see app/Http/Controllers/HomeController.php:27
* @route '/'
*/
export const index = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

index.definition = {
    methods: ["get","head"],
    url: '/',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\HomeController::index
* @see app/Http/Controllers/HomeController.php:27
* @route '/'
*/
index.url = (options?: RouteQueryOptions) => {
    return index.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\HomeController::index
* @see app/Http/Controllers/HomeController.php:27
* @route '/'
*/
index.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HomeController::index
* @see app/Http/Controllers/HomeController.php:27
* @route '/'
*/
index.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: index.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\HomeController::index
* @see app/Http/Controllers/HomeController.php:27
* @route '/'
*/
const indexForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: index.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HomeController::index
* @see app/Http/Controllers/HomeController.php:27
* @route '/'
*/
indexForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: index.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HomeController::index
* @see app/Http/Controllers/HomeController.php:27
* @route '/'
*/
indexForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: index.url({
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'HEAD',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'get',
})

index.form = indexForm

/**
* @see \App\Http\Controllers\HomeController::about
* @see app/Http/Controllers/HomeController.php:88
* @route '/about'
*/
export const about = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: about.url(options),
    method: 'get',
})

about.definition = {
    methods: ["get","head"],
    url: '/about',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\HomeController::about
* @see app/Http/Controllers/HomeController.php:88
* @route '/about'
*/
about.url = (options?: RouteQueryOptions) => {
    return about.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\HomeController::about
* @see app/Http/Controllers/HomeController.php:88
* @route '/about'
*/
about.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: about.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HomeController::about
* @see app/Http/Controllers/HomeController.php:88
* @route '/about'
*/
about.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: about.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\HomeController::about
* @see app/Http/Controllers/HomeController.php:88
* @route '/about'
*/
const aboutForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: about.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HomeController::about
* @see app/Http/Controllers/HomeController.php:88
* @route '/about'
*/
aboutForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: about.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HomeController::about
* @see app/Http/Controllers/HomeController.php:88
* @route '/about'
*/
aboutForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: about.url({
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'HEAD',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'get',
})

about.form = aboutForm

/**
* @see \App\Http\Controllers\HomeController::service
* @see app/Http/Controllers/HomeController.php:132
* @route '/service/{id}'
*/
export const service = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: service.url(args, options),
    method: 'get',
})

service.definition = {
    methods: ["get","head"],
    url: '/service/{id}',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\HomeController::service
* @see app/Http/Controllers/HomeController.php:132
* @route '/service/{id}'
*/
service.url = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { id: args }
    }

    if (Array.isArray(args)) {
        args = {
            id: args[0],
        }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
        id: args.id,
    }

    return service.definition.url
            .replace('{id}', parsedArgs.id.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\HomeController::service
* @see app/Http/Controllers/HomeController.php:132
* @route '/service/{id}'
*/
service.get = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: service.url(args, options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HomeController::service
* @see app/Http/Controllers/HomeController.php:132
* @route '/service/{id}'
*/
service.head = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: service.url(args, options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\HomeController::service
* @see app/Http/Controllers/HomeController.php:132
* @route '/service/{id}'
*/
const serviceForm = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: service.url(args, options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HomeController::service
* @see app/Http/Controllers/HomeController.php:132
* @route '/service/{id}'
*/
serviceForm.get = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: service.url(args, options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HomeController::service
* @see app/Http/Controllers/HomeController.php:132
* @route '/service/{id}'
*/
serviceForm.head = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: service.url(args, {
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'HEAD',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'get',
})

service.form = serviceForm

/**
* @see \App\Http\Controllers\HomeController::contact
* @see app/Http/Controllers/HomeController.php:93
* @route '/contact'
*/
export const contact = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: contact.url(options),
    method: 'get',
})

contact.definition = {
    methods: ["get","head"],
    url: '/contact',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\HomeController::contact
* @see app/Http/Controllers/HomeController.php:93
* @route '/contact'
*/
contact.url = (options?: RouteQueryOptions) => {
    return contact.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\HomeController::contact
* @see app/Http/Controllers/HomeController.php:93
* @route '/contact'
*/
contact.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: contact.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HomeController::contact
* @see app/Http/Controllers/HomeController.php:93
* @route '/contact'
*/
contact.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: contact.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\HomeController::contact
* @see app/Http/Controllers/HomeController.php:93
* @route '/contact'
*/
const contactForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: contact.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HomeController::contact
* @see app/Http/Controllers/HomeController.php:93
* @route '/contact'
*/
contactForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: contact.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HomeController::contact
* @see app/Http/Controllers/HomeController.php:93
* @route '/contact'
*/
contactForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: contact.url({
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'HEAD',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'get',
})

contact.form = contactForm

/**
* @see \App\Http\Controllers\HomeController::storeContact
* @see app/Http/Controllers/HomeController.php:98
* @route '/contact'
*/
export const storeContact = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: storeContact.url(options),
    method: 'post',
})

storeContact.definition = {
    methods: ["post"],
    url: '/contact',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\HomeController::storeContact
* @see app/Http/Controllers/HomeController.php:98
* @route '/contact'
*/
storeContact.url = (options?: RouteQueryOptions) => {
    return storeContact.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\HomeController::storeContact
* @see app/Http/Controllers/HomeController.php:98
* @route '/contact'
*/
storeContact.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: storeContact.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\HomeController::storeContact
* @see app/Http/Controllers/HomeController.php:98
* @route '/contact'
*/
const storeContactForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: storeContact.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\HomeController::storeContact
* @see app/Http/Controllers/HomeController.php:98
* @route '/contact'
*/
storeContactForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: storeContact.url(options),
    method: 'post',
})

storeContact.form = storeContactForm

/**
* @see \App\Http\Controllers\HomeController::portfolio
* @see app/Http/Controllers/HomeController.php:111
* @route '/portfolio'
*/
export const portfolio = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: portfolio.url(options),
    method: 'get',
})

portfolio.definition = {
    methods: ["get","head"],
    url: '/portfolio',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\HomeController::portfolio
* @see app/Http/Controllers/HomeController.php:111
* @route '/portfolio'
*/
portfolio.url = (options?: RouteQueryOptions) => {
    return portfolio.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\HomeController::portfolio
* @see app/Http/Controllers/HomeController.php:111
* @route '/portfolio'
*/
portfolio.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: portfolio.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HomeController::portfolio
* @see app/Http/Controllers/HomeController.php:111
* @route '/portfolio'
*/
portfolio.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: portfolio.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\HomeController::portfolio
* @see app/Http/Controllers/HomeController.php:111
* @route '/portfolio'
*/
const portfolioForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: portfolio.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HomeController::portfolio
* @see app/Http/Controllers/HomeController.php:111
* @route '/portfolio'
*/
portfolioForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: portfolio.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HomeController::portfolio
* @see app/Http/Controllers/HomeController.php:111
* @route '/portfolio'
*/
portfolioForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: portfolio.url({
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'HEAD',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'get',
})

portfolio.form = portfolioForm

/**
* @see \App\Http\Controllers\HomeController::testimonials
* @see app/Http/Controllers/HomeController.php:116
* @route '/testimonials'
*/
export const testimonials = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: testimonials.url(options),
    method: 'get',
})

testimonials.definition = {
    methods: ["get","head"],
    url: '/testimonials',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\HomeController::testimonials
* @see app/Http/Controllers/HomeController.php:116
* @route '/testimonials'
*/
testimonials.url = (options?: RouteQueryOptions) => {
    return testimonials.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\HomeController::testimonials
* @see app/Http/Controllers/HomeController.php:116
* @route '/testimonials'
*/
testimonials.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: testimonials.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HomeController::testimonials
* @see app/Http/Controllers/HomeController.php:116
* @route '/testimonials'
*/
testimonials.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: testimonials.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\HomeController::testimonials
* @see app/Http/Controllers/HomeController.php:116
* @route '/testimonials'
*/
const testimonialsForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: testimonials.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HomeController::testimonials
* @see app/Http/Controllers/HomeController.php:116
* @route '/testimonials'
*/
testimonialsForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: testimonials.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HomeController::testimonials
* @see app/Http/Controllers/HomeController.php:116
* @route '/testimonials'
*/
testimonialsForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: testimonials.url({
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'HEAD',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'get',
})

testimonials.form = testimonialsForm

/**
* @see \App\Http\Controllers\HomeController::resources
* @see app/Http/Controllers/HomeController.php:121
* @route '/resources'
*/
export const resources = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: resources.url(options),
    method: 'get',
})

resources.definition = {
    methods: ["get","head"],
    url: '/resources',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\HomeController::resources
* @see app/Http/Controllers/HomeController.php:121
* @route '/resources'
*/
resources.url = (options?: RouteQueryOptions) => {
    return resources.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\HomeController::resources
* @see app/Http/Controllers/HomeController.php:121
* @route '/resources'
*/
resources.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: resources.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HomeController::resources
* @see app/Http/Controllers/HomeController.php:121
* @route '/resources'
*/
resources.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: resources.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\HomeController::resources
* @see app/Http/Controllers/HomeController.php:121
* @route '/resources'
*/
const resourcesForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: resources.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HomeController::resources
* @see app/Http/Controllers/HomeController.php:121
* @route '/resources'
*/
resourcesForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: resources.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HomeController::resources
* @see app/Http/Controllers/HomeController.php:121
* @route '/resources'
*/
resourcesForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: resources.url({
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'HEAD',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'get',
})

resources.form = resourcesForm

/**
* @see \App\Http\Controllers\HomeController::gallery
* @see app/Http/Controllers/HomeController.php:126
* @route '/gallery'
*/
export const gallery = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: gallery.url(options),
    method: 'get',
})

gallery.definition = {
    methods: ["get","head"],
    url: '/gallery',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\HomeController::gallery
* @see app/Http/Controllers/HomeController.php:126
* @route '/gallery'
*/
gallery.url = (options?: RouteQueryOptions) => {
    return gallery.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\HomeController::gallery
* @see app/Http/Controllers/HomeController.php:126
* @route '/gallery'
*/
gallery.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: gallery.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HomeController::gallery
* @see app/Http/Controllers/HomeController.php:126
* @route '/gallery'
*/
gallery.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: gallery.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\HomeController::gallery
* @see app/Http/Controllers/HomeController.php:126
* @route '/gallery'
*/
const galleryForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: gallery.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HomeController::gallery
* @see app/Http/Controllers/HomeController.php:126
* @route '/gallery'
*/
galleryForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: gallery.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HomeController::gallery
* @see app/Http/Controllers/HomeController.php:126
* @route '/gallery'
*/
galleryForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: gallery.url({
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'HEAD',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'get',
})

gallery.form = galleryForm

const HomeController = { index, about, service, contact, storeContact, portfolio, testimonials, resources, gallery }

export default HomeController