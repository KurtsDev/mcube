<template>
    <div>
        <h1>Отделы</h1>
        <router-link :to="{ path: '/departments/add/23' }">Добавить сотрудника</router-link>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Название отдела</th>
                <th>Количество сотрудников</th>
                <th>Максимальная заработная плата</th>
                <th>Отделы</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="department in departments" :key="department.id">
                <td>{{department.name}}</td>
                <td>3</td>
                <td>1200</td>
                <td>Прогеры</td>
                <router-link :to="{ path: `/departments/edit/${department.id}` }">Редактировать</router-link> |
                <a class="router-link" @click="delDepartment(department.id)">Удалить</a>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

export default {
    mounted() {
        this.$store.dispatch('initDepartmentsList');
    },
    computed: {
        departments() {
            return this.$store.getters.getDepartments;
        },
    },
    methods: {
        delDepartment(id) {
            this.$store.dispatch('delDepartment', id);
            this.$store.dispatch('initDepartmentsList');
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
