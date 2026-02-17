import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../../../wayfinder'
/**
* @see \App\Http\Controllers\ServiceController::index
* @see app/Http/Controllers/ServiceController.php:14
* @route '/services'
*/
export const index = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

index.definition = {
    methods: ["get","head"],
    url: '/services',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\ServiceController::index
* @see app/Http/Controllers/ServiceController.php:14
* @route '/services'
*/
index.url = (options?: RouteQueryOptions) => {
    return index.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\ServiceController::index
* @see app/Http/Controllers/ServiceController.php:14
* @route '/services'
*/
index.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\ServiceController::index
* @see app/Http/Controllers/ServiceController.php:14
* @route '/services'
*/
index.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: index.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\ServiceController::index
* @see app/Http/Controllers/ServiceController.php:14
* @route '/services'
*/
const indexForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: index.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\ServiceController::index
* @see app/Http/Controllers/ServiceController.php:14
* @route '/services'
*/
indexForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: index.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\ServiceController::index
* @see app/Http/Controllers/ServiceController.php:14
* @route '/services'
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
* @see \App\Http\Controllers\ServiceController::getAll
* @see app/Http/Controllers/ServiceController.php:76
* @route '/services/list'
*/
export const getAll = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: getAll.url(options),
    method: 'get',
})

getAll.definition = {
    methods: ["get","head"],
    url: '/services/list',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\ServiceController::getAll
* @see app/Http/Controllers/ServiceController.php:76
* @route '/services/list'
*/
getAll.url = (options?: RouteQueryOptions) => {
    return getAll.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\ServiceController::getAll
* @see app/Http/Controllers/ServiceController.php:76
* @route '/services/list'
*/
getAll.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: getAll.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\ServiceController::getAll
* @see app/Http/Controllers/ServiceController.php:76
* @route '/services/list'
*/
getAll.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: getAll.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\ServiceController::getAll
* @see app/Http/Controllers/ServiceController.php:76
* @route '/services/list'
*/
const getAllForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: getAll.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\ServiceController::getAll
* @see app/Http/Controllers/ServiceController.php:76
* @route '/services/list'
*/
getAllForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: getAll.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\ServiceController::getAll
* @see app/Http/Controllers/ServiceController.php:76
* @route '/services/list'
*/
getAllForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: getAll.url({
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'HEAD',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'get',
})

getAll.form = getAllForm

/**
* @see \App\Http\Controllers\ServiceController::getById
* @see app/Http/Controllers/ServiceController.php:87
* @route '/services/{id}/json'
*/
export const getById = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: getById.url(args, options),
    method: 'get',
})

getById.definition = {
    methods: ["get","head"],
    url: '/services/{id}/json',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\ServiceController::getById
* @see app/Http/Controllers/ServiceController.php:87
* @route '/services/{id}/json'
*/
getById.url = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions) => {
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

    return getById.definition.url
            .replace('{id}', parsedArgs.id.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\ServiceController::getById
* @see app/Http/Controllers/ServiceController.php:87
* @route '/services/{id}/json'
*/
getById.get = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: getById.url(args, options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\ServiceController::getById
* @see app/Http/Controllers/ServiceController.php:87
* @route '/services/{id}/json'
*/
getById.head = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: getById.url(args, options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\ServiceController::getById
* @see app/Http/Controllers/ServiceController.php:87
* @route '/services/{id}/json'
*/
const getByIdForm = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: getById.url(args, options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\ServiceController::getById
* @see app/Http/Controllers/ServiceController.php:87
* @route '/services/{id}/json'
*/
getByIdForm.get = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: getById.url(args, options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\ServiceController::getById
* @see app/Http/Controllers/ServiceController.php:87
* @route '/services/{id}/json'
*/
getByIdForm.head = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: getById.url(args, {
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'HEAD',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'get',
})

getById.form = getByIdForm

/**
* @see \App\Http\Controllers\ServiceController::store
* @see app/Http/Controllers/ServiceController.php:28
* @route '/services'
*/
export const store = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: store.url(options),
    method: 'post',
})

store.definition = {
    methods: ["post"],
    url: '/services',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\ServiceController::store
* @see app/Http/Controllers/ServiceController.php:28
* @route '/services'
*/
store.url = (options?: RouteQueryOptions) => {
    return store.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\ServiceController::store
* @see app/Http/Controllers/ServiceController.php:28
* @route '/services'
*/
store.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: store.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\ServiceController::store
* @see app/Http/Controllers/ServiceController.php:28
* @route '/services'
*/
const storeForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: store.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\ServiceController::store
* @see app/Http/Controllers/ServiceController.php:28
* @route '/services'
*/
storeForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: store.url(options),
    method: 'post',
})

store.form = storeForm

/**
* @see \App\Http\Controllers\ServiceController::update
* @see app/Http/Controllers/ServiceController.php:47
* @route '/services/{service}'
*/
export const update = (args: { service: number | { id: number } } | [service: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: update.url(args, options),
    method: 'put',
})

update.definition = {
    methods: ["put"],
    url: '/services/{service}',
} satisfies RouteDefinition<["put"]>

/**
* @see \App\Http\Controllers\ServiceController::update
* @see app/Http/Controllers/ServiceController.php:47
* @route '/services/{service}'
*/
update.url = (args: { service: number | { id: number } } | [service: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { service: args }
    }

    if (typeof args === 'object' && !Array.isArray(args) && 'id' in args) {
        args = { service: args.id }
    }

    if (Array.isArray(args)) {
        args = {
            service: args[0],
        }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
        service: typeof args.service === 'object'
        ? args.service.id
        : args.service,
    }

    return update.definition.url
            .replace('{service}', parsedArgs.service.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\ServiceController::update
* @see app/Http/Controllers/ServiceController.php:47
* @route '/services/{service}'
*/
update.put = (args: { service: number | { id: number } } | [service: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: update.url(args, options),
    method: 'put',
})

/**
* @see \App\Http\Controllers\ServiceController::update
* @see app/Http/Controllers/ServiceController.php:47
* @route '/services/{service}'
*/
const updateForm = (args: { service: number | { id: number } } | [service: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: update.url(args, {
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'PUT',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'post',
})

/**
* @see \App\Http\Controllers\ServiceController::update
* @see app/Http/Controllers/ServiceController.php:47
* @route '/services/{service}'
*/
updateForm.put = (args: { service: number | { id: number } } | [service: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: update.url(args, {
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'PUT',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'post',
})

update.form = updateForm

/**
* @see \App\Http\Controllers\ServiceController::destroy
* @see app/Http/Controllers/ServiceController.php:66
* @route '/services/{service}'
*/
export const destroy = (args: { service: number | { id: number } } | [service: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(args, options),
    method: 'delete',
})

destroy.definition = {
    methods: ["delete"],
    url: '/services/{service}',
} satisfies RouteDefinition<["delete"]>

/**
* @see \App\Http\Controllers\ServiceController::destroy
* @see app/Http/Controllers/ServiceController.php:66
* @route '/services/{service}'
*/
destroy.url = (args: { service: number | { id: number } } | [service: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { service: args }
    }

    if (typeof args === 'object' && !Array.isArray(args) && 'id' in args) {
        args = { service: args.id }
    }

    if (Array.isArray(args)) {
        args = {
            service: args[0],
        }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
        service: typeof args.service === 'object'
        ? args.service.id
        : args.service,
    }

    return destroy.definition.url
            .replace('{service}', parsedArgs.service.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\ServiceController::destroy
* @see app/Http/Controllers/ServiceController.php:66
* @route '/services/{service}'
*/
destroy.delete = (args: { service: number | { id: number } } | [service: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(args, options),
    method: 'delete',
})

/**
* @see \App\Http\Controllers\ServiceController::destroy
* @see app/Http/Controllers/ServiceController.php:66
* @route '/services/{service}'
*/
const destroyForm = (args: { service: number | { id: number } } | [service: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: destroy.url(args, {
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'DELETE',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'post',
})

/**
* @see \App\Http\Controllers\ServiceController::destroy
* @see app/Http/Controllers/ServiceController.php:66
* @route '/services/{service}'
*/
destroyForm.delete = (args: { service: number | { id: number } } | [service: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: destroy.url(args, {
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'DELETE',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'post',
})

destroy.form = destroyForm

const ServiceController = { index, getAll, getById, store, update, destroy }

export default ServiceController