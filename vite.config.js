import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    build: {
        // Target modern browsers only — drops legacy polyfills (~14 KiB savings)
        target: ['es2017', 'chrome87', 'firefox78', 'safari14', 'edge88'],
        cssMinify: true,
    },
    plugins: [
        laravel({
            input: [
                'resources/css/vendor.css',
                'resources/css/frontend.css',
            ],
            refresh: true,
        }),
    ],
});
