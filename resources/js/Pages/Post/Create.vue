<template>
<div class="w-96 mx-auto pt-6">
    <h1 class="text-lg mb-8">Новое сообщение</h1>
    <form @submit.prevent="store">
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
</div>
</template>

<script>
import {Link} from "@inertiajs/vue3";

export default {
    name: "Create",
    components:{
        Link
    },
    data() {
        return {
            title: '',
            content:'',

        }
    },
    methods:{
        store() {
            this.$inertia.post('/posts', {title:this.title, content : this.content})
        },
    }

}
</script>

<style scoped>

</style>
