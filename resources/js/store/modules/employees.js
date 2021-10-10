export default {
    actions: {
        initEmployeesList: (context) => {
            axios.get('api/initEmployeesList')
                .then(response => {
                    context.commit('initEmployeesList', response.data)
                })
        },
        storeEmployee: (context, payload) => {
            axios.post('/api/storeEmployee', {
                id: payload.id,
                name: payload.name,
                surname: payload.surname,
                middle_name: payload.middle_name,
                gender: payload.gender,
                departments: payload.departments,
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
