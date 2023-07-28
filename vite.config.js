import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
      input: {
        'web-pages': 'resources/js/web-pages.js', // Entry for web pages
        'admin-panel': 'resources/js/admin-panel.js', // Entry for admin panel
      },
      refresh: [
        ...refreshPaths,
        'app/Http/Livewire/**',
      ],
    }),
  ],
  resolve: {
    alias: {
      '$': 'jQuery',
    },
  },
});