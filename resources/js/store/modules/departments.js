export default {
    actions: {
        initDepartmentsList: (context) => {
            axios.get('/api/initDepartmentsList')
                .then(response => {
                    context.commit('initDepartmentsList', response.data)
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

    },
    state: {
        departments: [],
    },
    getters: {
        getDepartments(state) {
            return state.departments;
        },
    }
}
