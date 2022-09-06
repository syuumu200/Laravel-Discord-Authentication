<template>
  <AppLayout>
    <p class="text-center">LaravelとInertiaとDiscord Oauth2を統合しました！</p>
  </AppLayout>
</template>

<script>
import { defineComponent } from "vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import AppLayout from "@/Layouts/AppLayout.vue";

export default defineComponent({
  components: {
    Head,
    Link,
    AppLayout,
  },
});
</script>
