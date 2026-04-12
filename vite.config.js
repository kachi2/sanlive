import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
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
