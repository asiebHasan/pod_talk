import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from 'tailwindcss';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/bootstrap.min.css',
                'resources/css/bootstrap-icons.css',
                'resources/css/owl.carousel.min.css',
                'resources/css/owl.theme.default.min.css',
                'resources/css/templatemo-pod-talk.css',

                'resources/js/jquery.min.js',
                'resources/js/bootstrap.bundle.min.js',
                'resources/js/owl.carousel.min.js',
                'resources/js/custom.js',
            ],
            refresh: true,
        }),
        // tailwindcss(),
    ],
    build: {
        rollupOptions: {
            output: {
                assetFileNames: (assetInfo) => {
                    if (assetInfo.name && assetInfo.name.endsWith('.woff2')) {
                        return 'fonts/[name][extname]';
                    }
                    if (assetInfo.name && assetInfo.name.endsWith('.woff')) {
                        return 'fonts/[name][extname]';
                    }
                    return 'assets/[name][extname]';
                },
            },
        },
    },
});