<template>
    <AuthenticatedLayout>
        <!--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboardыыы</h2>-->
        <template #header>
            <h1 class="text-xl">Мой чат/ Редактируем сообщение <span class="text-sky-700 font-semibold">{{ post.title }}</span></h1>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


                <form @submit.prevent="update">
                    <div>
                        <input class="mb-2 w-full rounded-full border border-gray-300 " v-model="title" type="text" placeholder="Заголовок">
                    </div>
                    <div>
                        <textarea class="mb-2 w-full rounded-l-md border border-gray-300" rows="10" v-model="content" placeholder="Содержание"></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button class="block hover:bg-white hover:text-sky-500 border border-sky-500 bg-sky-500 rounded-full text-center text-white p-2 w-32" type="submit">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>

</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
</script>
<script>
import {Link} from "@inertiajs/vue3";


export default {
    name: "Create",
    // layout: MainLayout,
    components:{
        Link,
    },
    props:[
        "post",
    ],

    data() {
        return {
            id: this.post.id,
            title: this.post.title,
            content:this.post.content,
        }
    },
    methods:{
        update() {
            this.$inertia.patch(`/posts/${this.id}`, {id:this.id,title:this.title, content : this.content})
        },
    }

}
</script>

<style scoped>

</style>
