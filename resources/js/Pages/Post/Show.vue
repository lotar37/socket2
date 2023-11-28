<template>
<div class="w-96 mx-auto pt-6">
    <h1 class="text-lg mb-8">Записи</h1>
    <div>
        <Link :href="route('post.index')" class="text-sky-600 text-sm mb-8">Back</Link>
    </div>
    <div class="mb-8 mt-8 border-t border-gray-300">
      <div>id:{{ post.id }}</div>
        <div>title:{{ post.title }}</div>
        <div>content:{{ post.content }}</div>
        <div class="text-sm text-right">created_at:{{ post.date }}</div>

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
        'post'
    ]


}
</script>

<style scoped>

</style>
