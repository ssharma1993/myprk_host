import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../wayfinder'
/**
* @see \App\Http\Controllers\QRCodeController::index
* @see app/Http/Controllers/QRCodeController.php:69
* @route '/qrcode'
*/
export const index = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

index.definition = {
    methods: ["get","head"],
    url: '/qrcode',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\QRCodeController::index
* @see app/Http/Controllers/QRCodeController.php:69
* @route '/qrcode'
*/
index.url = (options?: RouteQueryOptions) => {
    return index.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\QRCodeController::index
* @see app/Http/Controllers/QRCodeController.php:69
* @route '/qrcode'
*/
index.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\QRCodeController::index
* @see app/Http/Controllers/QRCodeController.php:69
* @route '/qrcode'
*/
index.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: index.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\QRCodeController::index
* @see app/Http/Controllers/QRCodeController.php:69
* @route '/qrcode'
*/
const indexForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: index.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\QRCodeController::index
* @see app/Http/Controllers/QRCodeController.php:69
* @route '/qrcode'
*/
indexForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: index.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\QRCodeController::index
* @see app/Http/Controllers/QRCodeController.php:69
* @route '/qrcode'
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
* @see \App\Http\Controllers\QRCodeController::generate
* @see app/Http/Controllers/QRCodeController.php:74
* @route '/qrcode/generate'
*/
export const generate = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: generate.url(options),
    method: 'post',
})

generate.definition = {
    methods: ["post"],
    url: '/qrcode/generate',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\QRCodeController::generate
* @see app/Http/Controllers/QRCodeController.php:74
* @route '/qrcode/generate'
*/
generate.url = (options?: RouteQueryOptions) => {
    return generate.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\QRCodeController::generate
* @see app/Http/Controllers/QRCodeController.php:74
* @route '/qrcode/generate'
*/
generate.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: generate.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\QRCodeController::generate
* @see app/Http/Controllers/QRCodeController.php:74
* @route '/qrcode/generate'
*/
const generateForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: generate.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\QRCodeController::generate
* @see app/Http/Controllers/QRCodeController.php:74
* @route '/qrcode/generate'
*/
generateForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: generate.url(options),
    method: 'post',
})

generate.form = generateForm

/**
* @see \App\Http\Controllers\QRCodeController::download
* @see app/Http/Controllers/QRCodeController.php:127
* @route '/qrcode/download'
*/
export const download = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: download.url(options),
    method: 'post',
})

download.definition = {
    methods: ["post"],
    url: '/qrcode/download',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\QRCodeController::download
* @see app/Http/Controllers/QRCodeController.php:127
* @route '/qrcode/download'
*/
download.url = (options?: RouteQueryOptions) => {
    return download.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\QRCodeController::download
* @see app/Http/Controllers/QRCodeController.php:127
* @route '/qrcode/download'
*/
download.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: download.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\QRCodeController::download
* @see app/Http/Controllers/QRCodeController.php:127
* @route '/qrcode/download'
*/
const downloadForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: download.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\QRCodeController::download
* @see app/Http/Controllers/QRCodeController.php:127
* @route '/qrcode/download'
*/
downloadForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: download.url(options),
    method: 'post',
})

download.form = downloadForm

const qrcode = {
    index: Object.assign(index, index),
    generate: Object.assign(generate, generate),
    download: Object.assign(download, download),
}

export default qrcode