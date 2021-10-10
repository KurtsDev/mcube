<template>
    <div>
        <h1>Редактирование-добавление</h1>
        <input v-model="name" type="text" placeholder="Имя">
        <button @click="saveDepartment">Сохранить</button>
        {{name}}
    </div>
</template>

<script>
    export default {
        data() {
            return {
                name: '',
            }
        },
        mounted() {
           this.editDepartment();
        },
        methods: {
            editDepartment() {
                axios.post('/api/editDepartment', {
                    id: this.$route.params.id,
                }).then((response) => {
                        this.name = response.data.name
                    });
            },
            saveDepartment() {
                this.$store.dispatch('storeDepartment', {
                    id: this.$route.params.id,
                    name: this.name,
                });
            }
        },

    }

</script>

<style scoped>

</style>
