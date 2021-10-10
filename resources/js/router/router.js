import Vue from 'vue'
import VueRouter from 'vue-router';

import Grid from "../components/Grid";
import Employees from "../components/Employees";
import Departments from "../components/Departments";
import NotFound from "../components/NotFound";
import AddEditDepartments from "../components/elements/AddEditDepartment";
import AddEditEmployee from "../components/elements/AddEditEmployee";

Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'grid',
            component: Grid,
        },
        {
            path: '/departments',
            name: 'departments',
            component: Departments,

        },
        {
            path: '/departments/add',
            name: 'departments-add',
            component: AddEditDepartments,
        },
        {
            path: '/departments/edit/:id',
            name: 'departments-edit',
            component: AddEditDepartments,
        },
        {
            path: '/employees',
            name: 'employees',
            component: Employees,
        },
        {
            path: '/employees/add',
            name: 'employees-add',
            component: AddEditEmployee,
        },
        {
            path: '/employees/edit/:id',
            name: 'employees-edit',
            component: AddEditEmployee,
        },
        {
            path: '*',
            name: '404',
            component: NotFound,
        }
    ],
});
