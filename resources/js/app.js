
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.min.js'


import '../frontend/plugins/font-awesome/css/font-awesome.min.css';
import '../frontend/fonts/Linearicons/Font/demo-files/demo.css';
import '../frontend/plugins/owl-carousel/assets/owl.carousel.css';
import '../frontend/plugins/slick/slick/slick.css';
import '../frontend/plugins/lightGallery/dist/css/lightgallery.min.css';
import '../frontend/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css';
import '../frontend/plugins/select2/dist/css/select2.min.css';
import '../frontend/plugins/noUiSlider/nouislider.css';
import '../frontend/css/style.css'
import '../frontend/css/home-8.css'


import '../frontend/plugins/jquery.min.js';
// import '../frontend/plugins/popper.min.js';
// import '../frontend/plugins/bootstrap4/js/bootstrap.min.js';
import '../frontend/plugins/select2/dist/js/select2.full.min.js';
import '../frontend/plugins/owl-carousel/owl.carousel.min.js';
// import '../frontend/plugins/lightGallery/dist/js/lightgallery-all.min.js';
import '../frontend/plugins/slick/slick/slick.min.js';
import '../frontend/plugins/noUiSlider/nouislider.min.js';
import '../frontend/js/main.js'; 


import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

const appName = import.meta.env.VITE_APP_NAME || 'Sanlive';


createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
