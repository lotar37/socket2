<template>
    <AuthenticatedLayout>
            <template #header>
            <h1 class="text-xl">Домашние задания / Новое</h1>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


                <form @submit.prevent="store">
                    <div>
                        <input class="mb-2 w-full rounded-lg border border-gray-300 " v-model="title" type="text" placeholder="Заголовок">
                    </div>
                    <div>
                        <textarea rows="10" class="mb-2 w-full rounded-lg border border-gray-300" v-model="content" placeholder="Содержание"></textarea>
                    </div>
                    <div>
                        <input class="mb-2 w-full rounded-lg border border-gray-300 " v-model="set_for_date" type="text" placeholder="На дату">
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
import MainLayout from "@/Layouts/MainLayout.vue";

export default {
    name: "Create",
    components:{
        Link,
    },
    data() {
        return {
            title: '',
            content:'',

        }
    },
    methods:{
        store() {
            this.$inertia.post('/homeworks', {title:this.title, content : this.content, set_for_date : this.set_for_date})
        },
    }

}
</script>

<style scoped>

</style>
