<template>

    <h1 class="text-lg mb-8">Редактировать сообщение</h1>
    <form @submit.prevent="update">
        <div>
            <input class="mb-2 w-full rounded-full border border-gray-300 " v-model="title" type="text" placeholder="Заголовок">
        </div>
        <div>
            <textarea class="mb-2 w-full rounded-full border border-gray-300" v-model="content" placeholder="Содержание"></textarea>
        </div>
        <div class="flex justify-end">
            <button class="block hover:bg-white hover:text-sky-500 border border-sky-500 bg-sky-500 rounded-full text-center text-white p-2 w-32" type="submit">Сохранить</button>
        </div>
    </form>

</template>

<script>
import {Link} from "@inertiajs/vue3";
import MainLayout from "@/Layouts/MainLayout.vue";

export default {
    name: "Create",
    layout: MainLayout,
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
