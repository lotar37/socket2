<script setup>
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
</script>

<script>
import {Link} from "@inertiajs/vue3";

export default {
    name: "Index",
    // layout: AuthenticatedLayout,
    components:{
        Link
    },
    props:[
        'posts'
    ],
    mounted() {
        console.log(this.posts)
    },
    methods:{
        deletePost(id) {
            this.$inertia.delete(`/posts/${id}`)
        },
    }
}
</script>
<template>
    <Head title="Index" />

    <AuthenticatedLayout>
<!--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboardыыы</h2>-->
        <template #header>
            <h1 class="text-xl">Мой чат</h1>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="text-lg mb-8">Записи</h1>
                <div>
                    <Link :href="route('post.create')" class="block hover:bg-white hover:text-sky-500 border border-sky-500 bg-sky-500 rounded-full text-center text-white p-2 w-32">Add Post</Link>
                </div>
                <div v-for="post in posts" class="mb-8 mt-8 border-t border-gray-300">
                      <div>id:{{ post.id }}</div>
                        <div>Заголовок: <span class="text-xl">{{ post.title }}</span></div>
                        <div style="white-space: pre-line">Содержание: {{ post.content }}</div>
                        <div class="text-sm text-right">created_at:{{ post.date }}</div>
                        <div class="text-sm text-right text-sky-500">
                            <Link :href="route('post.show',post.id)">Show</Link>
                            <Link :href="route('post.edit',post.id)" class="ml-4">Edit</Link>
                            <Link @click.prevent="deletePost(post.id)" class="ml-4 text-red-500">Delete</Link>
                        </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>

</template>



<style scoped>

</style>
