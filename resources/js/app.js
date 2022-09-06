require('./bootstrap');
import { createSSRApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'

createInertiaApp({
  resolve: name => require(`./Pages/${name}`),
  setup({ el, App, props, plugin }) {
    const Vue = createSSRApp({ render: () => h(App, props) })
    Vue.config.globalProperties.$route = route
    Vue
      .use(plugin)
      .mount(el)
  },
})

InertiaProgress.init()
