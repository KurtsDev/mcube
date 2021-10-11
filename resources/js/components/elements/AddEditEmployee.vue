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


       {{this.departmentsCheckEdit}}

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
            //все существующие департаменты
            departmentsCheck: [],
            //выбранные департаменты
            departmentsCheckEdit: [],
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
            return this.departmentsCheckEdit.includes(id);
        },
        addDepartment(id) {
            //проверяем, есть ли выбранный департамент в массиве выбранных
            let department = this.departmentsCheckEdit.indexOf(id);
            // this.departmentsCheckEdit.concat(this.departmentsCheck);
            console.log('id', id)
            console.log('department', department);
            //если нет - пушим
            if (department === -1) {
                this.departmentsCheck.push(id)
            } else {
                this.departmentsCheck[department] = null;
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
                this.departmentsCheckEdit = response.data.dep.map((item) => {
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
        }
    },

}

</script>

<style scoped>

</style>
