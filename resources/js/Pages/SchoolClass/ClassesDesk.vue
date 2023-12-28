<template>
<div>

    <a v-for="cl in classes" href="#"  @click.prevent="$emit('change', cl)" class="mr-1" @contextmenu.prevent="del(cl)" > {{ cl.name }}</a>
    <a href="#" v-if="!add" @click="add=true">+</a>
    <input type="text" v-model="name" v-if="add" class="w-20">
    <a href="#"  v-if="add" @click="store"  class="ml-1 hover:bg-white hover:text-sky-500 border border-sky-500 bg-sky-500 rounded-xl text-center text-white p-2 w-32">yes</a>

</div>
</template>

<script>
export default {
    name: "ClassesDesk",
    data(){
        return {
            name: '',
            add: false,
            classes:'',
        }
    },
    props:[
        // "classes",
    ],

    mounted() {
        this.getClasses()

    },
    methods:{
        getClasses(){

            axios.get('/school_classes/get')
                .then(res => (this.classes = res.data))

        },
        store() {
            this.$inertia.post('/school_classes', {name:this.name})
            this.add = false
            this.name = ""
            this.getClasses()
        },
        del(cl) {

            if (confirm("удалить "+ cl.name + " класс?")){
                console.log('yes')
                this.$inertia.delete(`/school_classes/${cl.id}`)
                this.getClasses()
            }else{
                console.log('no')

            }
        },

    },

}


</script>

<style scoped>

</style>
