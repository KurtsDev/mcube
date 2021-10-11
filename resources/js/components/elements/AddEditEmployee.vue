<template>
    <div>
        <h1>Редактирование-добавление</h1>
        <input v-model="name" type="text" placeholder="Имя">
        <input v-model="surname" type="text" placeholder="Фамилия ">
        <input v-model="middle_name" type="text" placeholder="Отчество">
        <input v-model="gender" type="text" placeholder="Пол">
        <input v-model="salary" type="text" placeholder="Зарплата">

        <div v-for="department in departments">

                <label>
                    <input type="checkbox" :checked="verifyCheck(department.id)" @click="addDepartment(department.id)">
                    {{department.name}}
                </label>

        </div>


       {{this.departmentsCheck}}

        <button @click="saveEmployee">Сохранить</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            name: '',
            surname: '',
            middle_name: '',
            gender: '',
            salary: '',
            departmentsCheck: [],
        }
    },
    mounted() {
        this.editEmployee();
        this.$store.dispatch('initDepartmentsList');
    },
    computed: {
        departments() {
            return this.$store.getters.getDepartments;
        },
    },
    methods: {
        verifyCheck(id) {
            return this.departmentsCheck.includes(id);
        },
        addDepartment(id) {
            let department = this.departmentsCheck.indexOf(id);
            if (department === -1) {
                this.departmentsCheck.push(id)
            } else {
                this.departmentsCheck.splice(department, 1);
            }
        },
        editEmployee() {
            axios.post('/api/editEmployee', {
                id: this.$route.params.id,
            }).then((response) => {
                console.log(response)
                this.name = response.data.name
                this.surname = response.data.surname
                this.middle_name = response.data.middle_name
                this.gender = response.data.gender
                this.salary = response.data.salary
                this.departmentsCheck = response.data.dep.map((item) => {
                    return item.id;
                })
            });
        },
        saveEmployee() {
            this.$store.dispatch('storeEmployee', {
                id: this.$route.params.id,
                name: this.name,
                surname: this.surname,
                middle_name: this.middle_name,
                gender: this.gender,
                salary: this.salary,
                departments: this.departmentsCheck,
            });
            this.$router.back();
        }
    },

}

</script>

<style scoped>

</style>
