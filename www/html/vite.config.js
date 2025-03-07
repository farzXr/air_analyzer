import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: '0.0.0.0', // Позволяет доступ извне контейнера
        port: 5173, // Явно указываем порт
        hmr: {
            host: 'localhost', // Или замените на IP вашей машины
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
