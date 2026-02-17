import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../wayfinder'
/**
* @see \App\Http\Controllers\SponsorController::index
* @see app/Http/Controllers/SponsorController.php:15
* @route '/admin/sponsors'
*/
export const index = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

index.definition = {
    methods: ["get","head"],
    url: '/admin/sponsors',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\SponsorController::index
* @see app/Http/Controllers/SponsorController.php:15
* @route '/admin/sponsors'
*/
index.url = (options?: RouteQueryOptions) => {
    return index.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\SponsorController::index
* @see app/Http/Controllers/SponsorController.php:15
* @route '/admin/sponsors'
*/
index.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\SponsorController::index
* @see app/Http/Controllers/SponsorController.php:15
* @route '/admin/sponsors'
*/
index.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: index.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\SponsorController::index
* @see app/Http/Controllers/SponsorController.php:15
* @route '/admin/sponsors'
*/
const indexForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: index.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\SponsorController::index
* @see app/Http/Controllers/SponsorController.php:15
* @route '/admin/sponsors'
*/
indexForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: index.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\SponsorController::index
* @see app/Http/Controllers/SponsorController.php:15
* @route '/admin/sponsors'
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
* @see \App\Http\Controllers\SponsorController::create
* @see app/Http/Controllers/SponsorController.php:25
* @route '/admin/sponsors/create'
*/
export const create = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: create.url(options),
    method: 'get',
})

create.definition = {
    methods: ["get","head"],
    url: '/admin/sponsors/create',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\SponsorController::create
* @see app/Http/Controllers/SponsorController.php:25
* @route '/admin/sponsors/create'
*/
create.url = (options?: RouteQueryOptions) => {
    return create.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\SponsorController::create
* @see app/Http/Controllers/SponsorController.php:25
* @route '/admin/sponsors/create'
*/
create.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: create.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\SponsorController::create
* @see app/Http/Controllers/SponsorController.php:25
* @route '/admin/sponsors/create'
*/
create.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: create.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\SponsorController::create
* @see app/Http/Controllers/SponsorController.php:25
* @route '/admin/sponsors/create'
*/
const createForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: create.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\SponsorController::create
* @see app/Http/Controllers/SponsorController.php:25
* @route '/admin/sponsors/create'
*/
createForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: create.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\SponsorController::create
* @see app/Http/Controllers/SponsorController.php:25
* @route '/admin/sponsors/create'
*/
createForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: create.url({
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'HEAD',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'get',
})

create.form = createForm

/**
* @see \App\Http\Controllers\SponsorController::store
* @see app/Http/Controllers/SponsorController.php:33
* @route '/admin/sponsors'
*/
export const store = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: store.url(options),
    method: 'post',
})

store.definition = {
    methods: ["post"],
    url: '/admin/sponsors',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\SponsorController::store
* @see app/Http/Controllers/SponsorController.php:33
* @route '/admin/sponsors'
*/
store.url = (options?: RouteQueryOptions) => {
    return store.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\SponsorController::store
* @see app/Http/Controllers/SponsorController.php:33
* @route '/admin/sponsors'
*/
store.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: store.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\SponsorController::store
* @see app/Http/Controllers/SponsorController.php:33
* @route '/admin/sponsors'
*/
const storeForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: store.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\SponsorController::store
* @see app/Http/Controllers/SponsorController.php:33
* @route '/admin/sponsors'
*/
storeForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: store.url(options),
    method: 'post',
})

store.form = storeForm

/**
* @see \App\Http\Controllers\SponsorController::edit
* @see app/Http/Controllers/SponsorController.php:62
* @route '/admin/sponsors/{sponsor}/edit'
*/
export const edit = (args: { sponsor: string | number } | [sponsor: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: edit.url(args, options),
    method: 'get',
})

edit.definition = {
    methods: ["get","head"],
    url: '/admin/sponsors/{sponsor}/edit',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\SponsorController::edit
* @see app/Http/Controllers/SponsorController.php:62
* @route '/admin/sponsors/{sponsor}/edit'
*/
edit.url = (args: { sponsor: string | number } | [sponsor: string | number ] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { sponsor: args }
    }

    if (Array.isArray(args)) {
        args = {
            sponsor: args[0],
        }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
        sponsor: args.sponsor,
    }

    return edit.definition.url
            .replace('{sponsor}', parsedArgs.sponsor.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\SponsorController::edit
* @see app/Http/Controllers/SponsorController.php:62
* @route '/admin/sponsors/{sponsor}/edit'
*/
edit.get = (args: { sponsor: string | number } | [sponsor: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: edit.url(args, options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\SponsorController::edit
* @see app/Http/Controllers/SponsorController.php:62
* @route '/admin/sponsors/{sponsor}/edit'
*/
edit.head = (args: { sponsor: string | number } | [sponsor: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: edit.url(args, options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\SponsorController::edit
* @see app/Http/Controllers/SponsorController.php:62
* @route '/admin/sponsors/{sponsor}/edit'
*/
const editForm = (args: { sponsor: string | number } | [sponsor: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: edit.url(args, options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\SponsorController::edit
* @see app/Http/Controllers/SponsorController.php:62
* @route '/admin/sponsors/{sponsor}/edit'
*/
editForm.get = (args: { sponsor: string | number } | [sponsor: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: edit.url(args, options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\SponsorController::edit
* @see app/Http/Controllers/SponsorController.php:62
* @route '/admin/sponsors/{sponsor}/edit'
*/
editForm.head = (args: { sponsor: string | number } | [sponsor: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: edit.url(args, {
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'HEAD',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'get',
})

edit.form = editForm

/**
* @see \App\Http\Controllers\SponsorController::update
* @see app/Http/Controllers/SponsorController.php:72
* @route '/admin/sponsors/{sponsor}'
*/
export const update = (args: { sponsor: string | number } | [sponsor: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: update.url(args, options),
    method: 'put',
})

update.definition = {
    methods: ["put","patch"],
    url: '/admin/sponsors/{sponsor}',
} satisfies RouteDefinition<["put","patch"]>

/**
* @see \App\Http\Controllers\SponsorController::update
* @see app/Http/Controllers/SponsorController.php:72
* @route '/admin/sponsors/{sponsor}'
*/
update.url = (args: { sponsor: string | number } | [sponsor: string | number ] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { sponsor: args }
    }

    if (Array.isArray(args)) {
        args = {
            sponsor: args[0],
        }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
        sponsor: args.sponsor,
    }

    return update.definition.url
            .replace('{sponsor}', parsedArgs.sponsor.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\SponsorController::update
* @see app/Http/Controllers/SponsorController.php:72
* @route '/admin/sponsors/{sponsor}'
*/
update.put = (args: { sponsor: string | number } | [sponsor: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: update.url(args, options),
    method: 'put',
})

/**
* @see \App\Http\Controllers\SponsorController::update
* @see app/Http/Controllers/SponsorController.php:72
* @route '/admin/sponsors/{sponsor}'
*/
update.patch = (args: { sponsor: string | number } | [sponsor: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'patch'> => ({
    url: update.url(args, options),
    method: 'patch',
})

/**
* @see \App\Http\Controllers\SponsorController::update
* @see app/Http/Controllers/SponsorController.php:72
* @route '/admin/sponsors/{sponsor}'
*/
const updateForm = (args: { sponsor: string | number } | [sponsor: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: update.url(args, {
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'PUT',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'post',
})

/**
* @see \App\Http\Controllers\SponsorController::update
* @see app/Http/Controllers/SponsorController.php:72
* @route '/admin/sponsors/{sponsor}'
*/
updateForm.put = (args: { sponsor: string | number } | [sponsor: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: update.url(args, {
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'PUT',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'post',
})

/**
* @see \App\Http\Controllers\SponsorController::update
* @see app/Http/Controllers/SponsorController.php:72
* @route '/admin/sponsors/{sponsor}'
*/
updateForm.patch = (args: { sponsor: string | number } | [sponsor: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: update.url(args, {
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'PATCH',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'post',
})

update.form = updateForm

/**
* @see \App\Http\Controllers\SponsorController::destroy
* @see app/Http/Controllers/SponsorController.php:98
* @route '/admin/sponsors/{sponsor}'
*/
export const destroy = (args: { sponsor: string | number } | [sponsor: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(args, options),
    method: 'delete',
})

destroy.definition = {
    methods: ["delete"],
    url: '/admin/sponsors/{sponsor}',
} satisfies RouteDefinition<["delete"]>

/**
* @see \App\Http\Controllers\SponsorController::destroy
* @see app/Http/Controllers/SponsorController.php:98
* @route '/admin/sponsors/{sponsor}'
*/
destroy.url = (args: { sponsor: string | number } | [sponsor: string | number ] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { sponsor: args }
    }

    if (Array.isArray(args)) {
        args = {
            sponsor: args[0],
        }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
        sponsor: args.sponsor,
    }

    return destroy.definition.url
            .replace('{sponsor}', parsedArgs.sponsor.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\SponsorController::destroy
* @see app/Http/Controllers/SponsorController.php:98
* @route '/admin/sponsors/{sponsor}'
*/
destroy.delete = (args: { sponsor: string | number } | [sponsor: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(args, options),
    method: 'delete',
})

/**
* @see \App\Http\Controllers\SponsorController::destroy
* @see app/Http/Controllers/SponsorController.php:98
* @route '/admin/sponsors/{sponsor}'
*/
const destroyForm = (args: { sponsor: string | number } | [sponsor: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: destroy.url(args, {
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'DELETE',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'post',
})

/**
* @see \App\Http\Controllers\SponsorController::destroy
* @see app/Http/Controllers/SponsorController.php:98
* @route '/admin/sponsors/{sponsor}'
*/
destroyForm.delete = (args: { sponsor: string | number } | [sponsor: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: destroy.url(args, {
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'DELETE',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'post',
})

destroy.form = destroyForm

const sponsors = {
    index: Object.assign(index, index),
    create: Object.assign(create, create),
    store: Object.assign(store, store),
    edit: Object.assign(edit, edit),
    update: Object.assign(update, update),
    destroy: Object.assign(destroy, destroy),
}

export default sponsors