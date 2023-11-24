<template>
<div class="w-96 mx-auto pt-6">
    <h1 class="text-lg mb-8">Posts</h1>
    <div>
        <Link :href="route('post.create')" class="block hover:bg-white hover:text-sky-500 border border-sky-500 bg-sky-500 rounded-full text-center text-white p-2 w-32">Add Post</Link>
    </div>
</div>
</template>

<script>
import {Link} from "@inertiajs/vue3";

export default {
    name: "Index",
    components:{
        Link
    }
}
</script>

<style scoped>

</style>
