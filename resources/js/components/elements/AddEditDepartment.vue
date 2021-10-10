<template>
    <div>
        <h1>Редактирование-добавление</h1>
        <input v-model="name" type="text" placeholder="Имя">
        <button @click="saveDepartment">Сохранить</button>

        {{department}}

    </div>
</template>

<script>
    export default {
        data() {
            return {
                name: this.department.name,
            }
        },
        mounted() {
            this.$store.dispatch('editDepartment', this.$route.params.id);
        },
        methods: {
            saveDepartment() {
                this.$store.dispatch('storeDepartment', {
                    id: this.$route.params.id,
                    name: this.name,
                });
            }
        },
        computed: {
            department() {
                return this.$store.getters.getDepartment;
            },
        },


    }

</script>

<style scoped>

</style>
