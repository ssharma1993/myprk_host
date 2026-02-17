import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../../../wayfinder'
/**
* @see \App\Http\Controllers\NewsletterController::subscribe
* @see app/Http/Controllers/NewsletterController.php:26
* @route '/newsletter/subscribe'
*/
export const subscribe = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: subscribe.url(options),
    method: 'post',
})

subscribe.definition = {
    methods: ["post"],
    url: '/newsletter/subscribe',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\NewsletterController::subscribe
* @see app/Http/Controllers/NewsletterController.php:26
* @route '/newsletter/subscribe'
*/
subscribe.url = (options?: RouteQueryOptions) => {
    return subscribe.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\NewsletterController::subscribe
* @see app/Http/Controllers/NewsletterController.php:26
* @route '/newsletter/subscribe'
*/
subscribe.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: subscribe.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\NewsletterController::subscribe
* @see app/Http/Controllers/NewsletterController.php:26
* @route '/newsletter/subscribe'
*/
const subscribeForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: subscribe.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\NewsletterController::subscribe
* @see app/Http/Controllers/NewsletterController.php:26
* @route '/newsletter/subscribe'
*/
subscribeForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: subscribe.url(options),
    method: 'post',
})

subscribe.form = subscribeForm

/**
* @see \App\Http\Controllers\NewsletterController::unsubscribe
* @see app/Http/Controllers/NewsletterController.php:51
* @route '/newsletter/unsubscribe/{token}'
*/
export const unsubscribe = (args: { token: string | number } | [token: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: unsubscribe.url(args, options),
    method: 'get',
})

unsubscribe.definition = {
    methods: ["get","head"],
    url: '/newsletter/unsubscribe/{token}',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\NewsletterController::unsubscribe
* @see app/Http/Controllers/NewsletterController.php:51
* @route '/newsletter/unsubscribe/{token}'
*/
unsubscribe.url = (args: { token: string | number } | [token: string | number ] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { token: args }
    }

    if (Array.isArray(args)) {
        args = {
            token: args[0],
        }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
        token: args.token,
    }

    return unsubscribe.definition.url
            .replace('{token}', parsedArgs.token.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\NewsletterController::unsubscribe
* @see app/Http/Controllers/NewsletterController.php:51
* @route '/newsletter/unsubscribe/{token}'
*/
unsubscribe.get = (args: { token: string | number } | [token: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: unsubscribe.url(args, options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\NewsletterController::unsubscribe
* @see app/Http/Controllers/NewsletterController.php:51
* @route '/newsletter/unsubscribe/{token}'
*/
unsubscribe.head = (args: { token: string | number } | [token: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: unsubscribe.url(args, options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\NewsletterController::unsubscribe
* @see app/Http/Controllers/NewsletterController.php:51
* @route '/newsletter/unsubscribe/{token}'
*/
const unsubscribeForm = (args: { token: string | number } | [token: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: unsubscribe.url(args, options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\NewsletterController::unsubscribe
* @see app/Http/Controllers/NewsletterController.php:51
* @route '/newsletter/unsubscribe/{token}'
*/
unsubscribeForm.get = (args: { token: string | number } | [token: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: unsubscribe.url(args, options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\NewsletterController::unsubscribe
* @see app/Http/Controllers/NewsletterController.php:51
* @route '/newsletter/unsubscribe/{token}'
*/
unsubscribeForm.head = (args: { token: string | number } | [token: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: unsubscribe.url(args, {
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'HEAD',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'get',
})

unsubscribe.form = unsubscribeForm

/**
* @see \App\Http\Controllers\NewsletterController::index
* @see app/Http/Controllers/NewsletterController.php:13
* @route '/admin/newsletter'
*/
export const index = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

index.definition = {
    methods: ["get","head"],
    url: '/admin/newsletter',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\NewsletterController::index
* @see app/Http/Controllers/NewsletterController.php:13
* @route '/admin/newsletter'
*/
index.url = (options?: RouteQueryOptions) => {
    return index.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\NewsletterController::index
* @see app/Http/Controllers/NewsletterController.php:13
* @route '/admin/newsletter'
*/
index.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\NewsletterController::index
* @see app/Http/Controllers/NewsletterController.php:13
* @route '/admin/newsletter'
*/
index.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: index.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\NewsletterController::index
* @see app/Http/Controllers/NewsletterController.php:13
* @route '/admin/newsletter'
*/
const indexForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: index.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\NewsletterController::index
* @see app/Http/Controllers/NewsletterController.php:13
* @route '/admin/newsletter'
*/
indexForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: index.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\NewsletterController::index
* @see app/Http/Controllers/NewsletterController.php:13
* @route '/admin/newsletter'
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
* @see \App\Http\Controllers\NewsletterController::preview
* @see app/Http/Controllers/NewsletterController.php:85
* @route '/admin/newsletter/preview'
*/
export const preview = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: preview.url(options),
    method: 'get',
})

preview.definition = {
    methods: ["get","head"],
    url: '/admin/newsletter/preview',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\NewsletterController::preview
* @see app/Http/Controllers/NewsletterController.php:85
* @route '/admin/newsletter/preview'
*/
preview.url = (options?: RouteQueryOptions) => {
    return preview.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\NewsletterController::preview
* @see app/Http/Controllers/NewsletterController.php:85
* @route '/admin/newsletter/preview'
*/
preview.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: preview.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\NewsletterController::preview
* @see app/Http/Controllers/NewsletterController.php:85
* @route '/admin/newsletter/preview'
*/
preview.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: preview.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\NewsletterController::preview
* @see app/Http/Controllers/NewsletterController.php:85
* @route '/admin/newsletter/preview'
*/
const previewForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: preview.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\NewsletterController::preview
* @see app/Http/Controllers/NewsletterController.php:85
* @route '/admin/newsletter/preview'
*/
previewForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: preview.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\NewsletterController::preview
* @see app/Http/Controllers/NewsletterController.php:85
* @route '/admin/newsletter/preview'
*/
previewForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: preview.url({
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'HEAD',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'get',
})

preview.form = previewForm

/**
* @see \App\Http\Controllers\NewsletterController::send
* @see app/Http/Controllers/NewsletterController.php:63
* @route '/admin/newsletter/send'
*/
export const send = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: send.url(options),
    method: 'post',
})

send.definition = {
    methods: ["post"],
    url: '/admin/newsletter/send',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\NewsletterController::send
* @see app/Http/Controllers/NewsletterController.php:63
* @route '/admin/newsletter/send'
*/
send.url = (options?: RouteQueryOptions) => {
    return send.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\NewsletterController::send
* @see app/Http/Controllers/NewsletterController.php:63
* @route '/admin/newsletter/send'
*/
send.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: send.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\NewsletterController::send
* @see app/Http/Controllers/NewsletterController.php:63
* @route '/admin/newsletter/send'
*/
const sendForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: send.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\NewsletterController::send
* @see app/Http/Controllers/NewsletterController.php:63
* @route '/admin/newsletter/send'
*/
sendForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: send.url(options),
    method: 'post',
})

send.form = sendForm

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

const NewsletterController = { subscribe, unsubscribe, index, preview, send, destroy }

export default NewsletterController