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
        'homeworks'
    ],

    methods:{
        deletePost(id) {
            this.$inertia.delete(`/homeworks/${id}`)
        },
    }
}
</script>
<template>
    <Head title="Index" />

    <AuthenticatedLayout>
<!--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboardыыы</h2>-->
        <template #header>
            <h1 class="text-xl">Классы:</h1>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="text-lg mb-8">Домашние задания</h1>
                <div class="mb-6">
                    <Link :href="route('homework.create')" class="block hover:bg-white hover:text-sky-500 border border-sky-500 bg-sky-500 rounded-xl text-center text-white p-2 w-32">Новое д/з</Link>
                </div>
                <div v-if="homeworks.length">
                    <div v-for="homework in homeworks" class="mb-8 mt-8 border-t border-gray-300">
                          <div>id:{{ homework.id }}</div>
                            <div>Заголовок: <span class="text-xl">{{ homework.title }}</span></div>
                            <div style="white-space: pre-line">Содержание: {{ homework.content }}</div>
                            <div class="text-sm text-right">created_at:{{ homework.date }}</div>
                            <div class="text-sm text-right text-sky-500">
<!--                                <Link :href="route('homework.show',homework.id)">Show</Link>-->
<!--                                <Link :href="route('homework.edit',homework.id)" class="ml-4">Edit</Link>-->
<!--                                <Link @click.prevent="deletePost(homework.id)" class="ml-4 text-red-500">Delete</Link>-->
                            </div>
                    </div>
                </div>
                <div v-else>
                    Д/з нету
                </div>
            </div>
        </div>
    </AuthenticatedLayout>

</template>



<style scoped>

</style>
