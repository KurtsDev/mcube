<template>
    <div>
        <h1>Сотрудники</h1>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Отчество</th>
                <th>Пол</th>
                <th>Заработная плата</th>
                <th>Отделы</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="employee in employees" :key="employee.id">
                <td>{{employee.name}}</td>
                <td>{{employee.surname}}</td>
                <td>{{employee.middlename}}</td>
                <td>{{employee.gender}}</td>

                <router-link>Редактировать</router-link> |
                <a @click="delEmployee(employee.id)">Удалить</a>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.$store.dispatch('initEmployeesList');
        },
        computed: {
            employees() {
                return this.$store.getters.getEmployees;
            },
        },
        methods: {
            delEmployee(id) {
                this.$store.dispatch('delEmployee', id);
                this.$store.dispatch('initEmployeesList');
            }
        }
    }

</script>

<style scoped>
.router-link {
    color: #3490dc;
    text-decoration: none;
    background-color: transparent;
    cursor: pointer;
}

.router-link:hover {
    color: #1d68a7;
    text-decoration: underline;
}

</style>
