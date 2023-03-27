
import './bootstrap'

//import { createApp, h } from 'vue'
import { createSSRApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { Link, Head } from '@inertiajs/vue3'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

createInertiaApp({
  resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
  setup({ el, App, props, plugin }) {
    const vue = createSSRApp({ render: () => h(App, props) })
    vue.config.globalProperties.$route = route
    vue
      .use(plugin)
      .component('Link', Link)
      .component('Head', Head)
      .mount(el)
  },
})