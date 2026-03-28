
import { createApp, h } from 'vue';
import { createInertiaApp, router } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

const appName = import.meta.env.VITE_APP_NAME || 'Sanlive Pharmacy';


createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .mount(el);
    }
});

// Force full page reload on every GET navigation so Vue <Head> meta tags are always
// rendered fresh. CSS/JS are still served from browser cache via Vite hashed filenames.
router.on('before', (event) => {
    const { method, url } = event.detail.visit;
    if (method === 'get') {
        event.preventDefault();
        window.location.assign(url.toString());
    }
});

if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
        navigator.serviceWorker.register('/sw.js')
            .then(reg => console.log('✅ Service Worker registered:', reg))
            .catch(err => console.error('❌ Service Worker registration failed:', err));
    });
}


