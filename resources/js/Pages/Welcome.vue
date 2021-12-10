<template>
<AppLayout>
    <p class="text-center">LaravelとInertiaとDiscord Oauth2を統合しました！</p>
</AppLayout>
</template>

<style scoped>
</style>

<script>
import {
    defineComponent
} from 'vue'
import {
    Head,
    Link
} from '@inertiajs/inertia-vue3';
import AppLayout from '@/Layouts/AppLayout.vue'
import {
    v4 as uuidv4
} from "uuid";

export default defineComponent({
    data() {
        return {}
    },
    components: {
        Head,
        Link,
        AppLayout
    }
})
</script>
