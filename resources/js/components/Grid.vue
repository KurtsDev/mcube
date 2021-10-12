<template>
    <div>
        <h1>Сетка</h1>
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th v-for="dep in departments">{{dep.name}}</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in prepareEmployees">
                <td>{{`${item.name} ${item.surname}`}}</td>
                <td v-for="dep in departments">
                    {{item.departments.includes(dep.id) ? '✔' : ''}}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                employees: [],
                departments: [],
            }
        },
        beforeMount() {
           this.initEmployeesGrid();
           this.initDepartmentsGrid();
        },
        methods: {
           initEmployeesGrid() {
               axios.get('/api/initGridEmployees')
                   .then(response => {
                       this.employees = response.data;
                   })
           },
            initDepartmentsGrid() {
                axios.get('/api/initGridDepartments')
                    .then(response => {
                        this.departments = response.data;
                    })
            },
        },
        computed: {
            prepareEmployees() {
               return  this.employees.map((item) => {
                    const dep = item.departments = item.departments.map((item2) => {
                        return item2.id;
                    })
                   item.departments = dep;
                    return item;
                })
            }
        }
    }

</script>

<style scoped>
table {
    border-spacing: 20px;
}
</style>
