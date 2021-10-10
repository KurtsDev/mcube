<template>
    <div>
        <input v-model="employees.name" type="text" placeholder="Имя">
        <input v-model="employees.surname" type="text" placeholder="Фамилия ">
        <input v-model="employees.middleName" type="text" placeholder="Отчество">
        <input v-model="employees.gender" type="text" placeholder="Пол">
        <input v-model="employees.salary" type="text" placeholder="Зарплата">
    </div>
</template>

<script>
    export default {

    }

</script>

<style scoped>

</style>
