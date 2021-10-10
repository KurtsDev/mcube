export default {
    actions: {
        initDepartmentsList: (context) => {
            axios.get('api/initDepartmentsList')
                .then(response => {
                    context.commit('initDepartmentsList', response.data)
                })
        },
        editDepartment: (context, id) => {
            axios.post('/api/editDepartment', {id})
                .then(response => {
                    context.commit('editDepartment', response.data)
                })
        },
        storeDepartment: (context, payload) => {
            axios.post('/api/storeDepartment', {
                id: payload.id,
                name: payload.name,
            })
        },
        delDepartment: ({commit}, id) => {
            axios.post('api/delDepartment', {id});
        },

    },
    mutations: {
        initDepartmentsList(state, departments) {
            state.departments = departments;
        },
        editDepartment(state, department) {
            state.department = department;
        },

    },
    state: {
        departments: [],
        department: {},
    },
    getters: {
        getDepartments(state) {
            return state.departments;
        },
        getDepartment(state) {
            return state.department;
        },
    }
}
