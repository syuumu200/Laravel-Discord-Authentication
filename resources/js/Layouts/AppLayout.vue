<template>
<Head :title="$page.props.appName" />
<div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
    <h1 class="text-center mt-10 text-4xl mb-4">{{$page.props.appName}}</h1>
    <div class="text-center">
        <a v-if="!$page.props.auth.check" class="underline text-center"
            :href='$page.props.auth.loginUrl'>Discordでログイン</a>
        <div v-else class="text-center">
            <span>
                <span class="mr-1">Hi</span>
                <span class="mr-3">{{$page.props.auth.user.username}} !</span>
            </span>
            <Link class="underline" href="/api/logout">ログアウト</Link>
        </div>
    </div>
    <slot></slot>
</div>
</template>

<script>
import {
    defineComponent
} from 'vue'
import {
    Head,
    Link
} from '@inertiajs/inertia-vue3';

export default defineComponent({
    data() {
        return {}
    },
    components: {
        Head,
        Link
    }
})
</script>
