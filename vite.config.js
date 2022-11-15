import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            // input: ['/../../public_html/book_summary/build/resources/css/app.css', '/../../public_html/book_summary/build/resources/js/app.js'],
            // buildDirectory: '../../public/build',
            refresh: true,
        }),
    ],
});
