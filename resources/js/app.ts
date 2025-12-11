import '../css/app.css'

import { initializeUiColor } from '@/composables/useColorUi'
import { createInertiaApp, router } from '@inertiajs/vue3'
import { configureEcho, echo } from '@laravel/echo-vue'
import ui from '@nuxt/ui/vue-plugin'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'
import type { DefineComponent } from 'vue'
import { createApp, h } from 'vue'
import { ZiggyVue } from 'ziggy-js'
import { initializeTheme } from './composables/useAppearance'

configureEcho({
    broadcaster: 'reverb',
})

// @see: https://laravel.com/docs/12.x/broadcasting#only-to-others-configuration
router.on('before', (event) => {
    const id = echo().socketId()

    if (id) {
        event.detail.visit.headers['X-Socket-ID'] = id
    }
})

const appName = import.meta.env.VITE_APP_NAME || 'Mensahero'

createInertiaApp({
    progress: { color: '#f53003' },
    title: (title) => (title ? `${title} - ${appName}` : appName),
    resolve: (name) =>
        resolvePageComponent(`./pages/${name}.vue`, import.meta.glob<DefineComponent>('./pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ui)
            .use(ZiggyVue)
            .mount(el)
    },
})
// This will set light / dark mode on page load...
initializeTheme()
// This will set the UI Color
initializeUiColor()
