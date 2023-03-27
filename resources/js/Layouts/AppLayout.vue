<template>
  <Head :title="$page.props.appName" />
  <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
    <h1 class="text-center mt-10 text-4xl mb-4">
      <Link :href="$route('index')">{{ $page.props.appName }}</Link>
    </h1>
    <div class="text-center">
      <Link v-if="!$page.props.auth.check" class="underline text-center" :href="$route('login')">Discordでログイン</Link>
      <div v-else class="text-center">
        <span>
          <span class="mr-1">Hi</span>
          <span class="mr-3">{{ $page.props.auth.user.username }} !</span>
        </span>
        <Link class="underline" :href="$route('logout')">ログアウト</Link>
      </div>
    </div>
    <slot></slot>
  </div>
</template>

<script>
import { defineComponent } from "vue";

export default defineComponent({
});
</script>
