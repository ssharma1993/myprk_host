import { build } from 'esbuild';
import { copyFile, mkdir } from 'node:fs/promises';
import path from 'node:path';
import process from 'node:process';
import { fileURLToPath } from 'node:url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);
const rootDir = path.resolve(__dirname, '..');

const mode = process.argv[2] === 'prod' ? 'prod' : 'dev';
const isProd = mode === 'prod';

const themeCssInput = path.join(
    rootDir,
    'public/client/assets/css/visanet.css',
);
const themeJsInput = path.join(rootDir, 'public/client/assets/js/visanet.js');

const themeCssOutput = path.join(
    rootDir,
    'public/client/assets/css/visanet.min.css',
);
const themeJsOutput = path.join(
    rootDir,
    'public/client/assets/js/visanet.min.js',
);

const jquerySource = path.join(
    rootDir,
    'node_modules/jquery/dist',
    isProd ? 'jquery.min.js' : 'jquery.js',
);

const jqueryOutput = path.join(
    rootDir,
    'public/client/assets/vendors/jquery',
    isProd ? 'jquery-3.7.1.min.js' : 'jquery-3.7.1.js',
);

await mkdir(path.dirname(themeCssOutput), { recursive: true });
await mkdir(path.dirname(themeJsOutput), { recursive: true });
await mkdir(path.dirname(jqueryOutput), { recursive: true });

await build({
    entryPoints: [themeCssInput],
    outfile: themeCssOutput,
    bundle: false,
    minify: isProd,
    legalComments: 'none',
    loader: {
        '.css': 'css',
    },
});

await build({
    entryPoints: [themeJsInput],
    outfile: themeJsOutput,
    bundle: false,
    minify: isProd,
    target: ['es2017'],
    legalComments: 'none',
});

await copyFile(jquerySource, jqueryOutput);

console.log(
    `[optimize-client-assets] Mode: ${mode}. Generated ${path.relative(rootDir, themeCssOutput)}, ${path.relative(rootDir, themeJsOutput)}, and ${path.relative(rootDir, jqueryOutput)}`,
);
