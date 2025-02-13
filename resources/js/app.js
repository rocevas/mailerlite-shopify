import './bootstrap';
import '@ownego/polaris-vue/dist/style.css'
import PolarisVue from '@ownego/polaris-vue'

import { createApp, h } from 'vue'
import createAppBridge from '@shopify/app-bridge';
import { createInertiaApp } from '@inertiajs/vue3'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'
import { ZiggyVue } from '../../vendor/tightenco/ziggy'
import { getSessionToken } from '@shopify/app-bridge/utilities';
import { redirect } from '@shopify/app-bridge/client/redirect';
import axios from 'axios';

const host = new URLSearchParams(location.search).get('host');
if (!host) throw new Error('APP::ERROR::INVALID_CONFIG: host must be provided');

const app = createAppBridge({
    apiKey: import.meta.env.VITE_SHOPIFY_API_KEY,
    host,
    forceRedirect: true,
});
axios.interceptors.request.use(async (config) => {
    try {
        const sessionToken = await getSessionToken(app);
        config.headers.Authorization = `Bearer ${sessionToken}`;
    } catch (error) {
        console.error("Failed to get session token:", error);
    }

    config.params = {
        ...config.params,
        shop: new URLSearchParams(location.search).get('shop'),
        embedded: new URLSearchParams(location.search).get('embedded'),
        host,
        id_token: new URLSearchParams(location.search).get('id_token'),
        locale: new URLSearchParams(location.search).get('locale'),
        session: new URLSearchParams(location.search).get('session'),
        hmac: new URLSearchParams(location.search).get('hmac'),
        timestamp: new URLSearchParams(location.search).get('timestamp'),
    };
    return config;
});

axios.interceptors.response.use(
    response => response,
    error => {
        if (error.response.status === 403 && error.response.data.forceRedirectUrl) {
            redirect(error.response.data.forceRedirectUrl);
        }
        return Promise.reject(error);
    }
);

createInertiaApp({
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(PolarisVue)
            .use(ZiggyVue)
            .mount(el)
    },
    progress: false,
});
