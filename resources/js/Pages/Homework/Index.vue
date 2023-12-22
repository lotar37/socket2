<script setup>
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
</script>

<script>
import {Link} from "@inertiajs/vue3";
import ClassesDesk from "@/Pages/SchoolClass/ClassesDesk.vue";
import SubjectDesk from "@/Pages/Subject/SubjectDesk.vue";

export default {
    name: "Index",
    data(){
        return{
            selected_class: {id:0, name:""},
            selected_subject: {id:0, name:""},
            homeworkss:this.homeworks,
        }
    },
    components:{
        Link,ClassesDesk,SubjectDesk,
    },
    props:[
        'homeworks',
    ],

    methods:{
        deletePost(id) {
            this.$inertia.delete(`/homeworks/${id}`)
        },
        changeClass(selected_class){

            this.selected_class = selected_class
            this.getHomeworks()
        },
        changeSubject(subject){

            this.selected_subject= subject
            this.getHomeworks()
        },
        getHomeworks(){
            console.log(`/homeworks/${this.selected_class.id}/${this.selected_subject.id}/get`)
            axios.get(`/homeworks/${this.selected_class.id}/${this.selected_subject.id}/get`)
                .then(res => (this.homeworkss = res.data))
            //this.$inertia.get(`/homeworks/${this.selected_class.id}/${this.selected_subject.id}/get`)
        }

    }
}
</script>
<template>
    <Head title="Index" />

    <AuthenticatedLayout>
        <template #header>
            <h1 class="text-xl">Классы:</h1>
            <ClassesDesk @change="changeClass"></ClassesDesk>
            <h1 class="text-xl">Предметы:</h1>
            <SubjectDesk @change="changeSubject"></SubjectDesk>

        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="text-lg mb-8">Домашние задания

                    {{ selected_subject.name ?" по предмету " + selected_subject.name : "" }}
                    {{ selected_class.name ?" для " + selected_class.name + " класса" : "" }}
                </h1>
                <div class="mb-6">
                    <Link :href="route('homework.create',[ selected_class.id, 1] )" class="block hover:bg-white hover:text-sky-500 border border-sky-500 bg-sky-500 rounded-xl text-center text-white p-2 w-32">Новое д/з</Link>
                </div>
<!--                {school_class : selected_class.id, subject : 1014}-->
                <div v-if="homeworkss.length">
                    <div v-for="homework in homeworkss" class="mb-8 mt-8 border-t border-gray-300">
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
