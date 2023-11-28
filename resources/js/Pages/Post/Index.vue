<template>
<div class="w-96 mx-auto pt-6">
    <h1 class="text-lg mb-8">Записи</h1>
    <div>
        <Link :href="route('post.create')" class="block hover:bg-white hover:text-sky-500 border border-sky-500 bg-sky-500 rounded-full text-center text-white p-2 w-32">Add Post</Link>
    </div>
    <div v-for="post in posts" class="mb-8 mt-8 border-t border-gray-300">
      <div>id:{{ post.id }}</div>
        <div>title:{{ post.title }}</div>
        <div>content:{{ post.content }}</div>
        <div class="text-sm text-right">created_at:{{ post.date }}</div>
        <div class="text-sm text-right text-sky-500">
            <Link :href="route('post.show',post.id)">Show</Link>
        </div>

    </div>

</div>
</template>

<script>
import {Link} from "@inertiajs/vue3";

export default {
    name: "Index",
    components:{
        Link
    },
    props:[
        'posts'
    ]


}
</script>

<style scoped>

</style>
