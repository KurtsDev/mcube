export default {
    actions: {
        initEmployeesList: (context) => {
            axios.get('api/initEmployeesList')
                .then(response => {
                    context.commit('initEmployeesList', response.data)
                })
        },
        delEmployee: ({commit}, id) => {
            axios.post('api/delEmployee', {id});
        },

    },
    mutations: {
        initEmployeesList(state, employees) {
            state.employees = employees;
        },

    },
    state: {
        employees: [],
    },
    getters: {
        getEmployees(state) {
            return state.employees;
        },

    }
}
