import axios from 'axios'

export default {
    namespaced: true,
    state: {
        users:[]
    },
    getters: {
        users: state =>{ return state.users},
        user: (state) => (id) => {
            console.log(id)
            return state.users.find(user => user.id == id)
        }
    },
    mutations: {
        STORE_USERS(state, data) {
            state.users = data.items 
        },
        UPDATE_USERS(state,data) {
            state.users.push(...data) 
        }
    },
    actions: {
        getUsers(context,data) {
            let request = axios.get('https://api.github.com/search/users?q='+data.search+"&page="+data.page)
            request.then(Response => {
                // console.log(Response.data.items)
                context.commit('STORE_USERS',Response.data)
            })
        },
        nextPage(context,data){
            let request = axios.get('https://api.github.com/search/users?q='+data.search+"&page="+data.page)
            request.then(Response => {
                // console.log(Response.data.items)
                context.commit('UPDATE_USERS',Response.data)
            })
          }
      },
}