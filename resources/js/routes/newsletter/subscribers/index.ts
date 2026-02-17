import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../../wayfinder'
/**
* @see \App\Http\Controllers\NewsletterController::destroy
* @see app/Http/Controllers/NewsletterController.php:104
* @route '/admin/newsletter/subscribers/{subscriber}'
*/
export const destroy = (args: { subscriber: number | { id: number } } | [subscriber: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(args, options),
    method: 'delete',
})

destroy.definition = {
    methods: ["delete"],
    url: '/admin/newsletter/subscribers/{subscriber}',
} satisfies RouteDefinition<["delete"]>

/**
* @see \App\Http\Controllers\NewsletterController::destroy
* @see app/Http/Controllers/NewsletterController.php:104
* @route '/admin/newsletter/subscribers/{subscriber}'
*/
destroy.url = (args: { subscriber: number | { id: number } } | [subscriber: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { subscriber: args }
    }

    if (typeof args === 'object' && !Array.isArray(args) && 'id' in args) {
        args = { subscriber: args.id }
    }

    if (Array.isArray(args)) {
        args = {
            subscriber: args[0],
        }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
        subscriber: typeof args.subscriber === 'object'
        ? args.subscriber.id
        : args.subscriber,
    }

    return destroy.definition.url
            .replace('{subscriber}', parsedArgs.subscriber.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\NewsletterController::destroy
* @see app/Http/Controllers/NewsletterController.php:104
* @route '/admin/newsletter/subscribers/{subscriber}'
*/
destroy.delete = (args: { subscriber: number | { id: number } } | [subscriber: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(args, options),
    method: 'delete',
})

/**
* @see \App\Http\Controllers\NewsletterController::destroy
* @see app/Http/Controllers/NewsletterController.php:104
* @route '/admin/newsletter/subscribers/{subscriber}'
*/
const destroyForm = (args: { subscriber: number | { id: number } } | [subscriber: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: destroy.url(args, {
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'DELETE',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'post',
})

/**
* @see \App\Http\Controllers\NewsletterController::destroy
* @see app/Http/Controllers/NewsletterController.php:104
* @route '/admin/newsletter/subscribers/{subscriber}'
*/
destroyForm.delete = (args: { subscriber: number | { id: number } } | [subscriber: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: destroy.url(args, {
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'DELETE',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'post',
})

destroy.form = destroyForm

const subscribers = {
    destroy: Object.assign(destroy, destroy),
}

export default subscribers