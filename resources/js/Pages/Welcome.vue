<template>
  <AppLayout>
    <p class="text-center">LaravelとInertiaとDiscord Oauth2を統合しました！</p>
    <Link href="/test">TEST
    </Link>
  </AppLayout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";

export default defineComponent({
  components: {
    AppLayout,
  },
});
</script>
