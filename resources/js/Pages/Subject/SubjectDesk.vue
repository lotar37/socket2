<template>
<div>

    <a v-for="cl in subjects" href="#"  @click.prevent=" $emit('change', cl);press(cl);" class="mr-1"> {{ cl.name }}</a>
    <a href="#" v-if="!add" @click="add=true">+</a>
    <input type="text" v-model="name" v-if="add" class="w-20">
    <a href="#"  v-if="add" @click="store"  class="ml-1 hover:bg-white hover:text-sky-500 border border-sky-500 bg-sky-500 rounded-xl text-center text-white p-2 w-32">yes</a>

</div>
</template>

<script>
export default {
    name: "SubjectDesk",
    data(){
        return {
            name: '',
            add: false,
            subjects:'',
        }
    },
    props:[
        // "classes",
    ],

    mounted() {
        this.getSubjects()

    },

    methods:{
        press(cl){

        },
        getSubjects(){

            axios.get('/subject/get')
                .then(res => (this.subjects = res.data))

        },
        store() {
            this.$inertia.post('/subject', {name:this.name})
            this.add = false
            this.name = ""
            this.getSubjects()
        },
    },

}


</script>

<style scoped>

</style>
