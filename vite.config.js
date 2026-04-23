import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite'; // Import plugin ini

export default defineConfig({
    plugins: [
        tailwindcss(), // Letakkan tailwindcss() DI ATAS laravel()
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
