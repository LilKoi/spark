import axios from 'axios'

export default {
    namespaced: true,
    state: {
        users: []
    },
    getters: {
        state: state =>{ return state.users},
        user: (state,id)=>{
            
            console.log(id)
            let user = state.users.find(user => user.id == id);
            return user;
        }
    },
    mutations: {
        STORE_USERS(state, data) {
            state.users = data.items 
        }
    },
    actions: {
        getUsers(context,data) {
            let request = axios.get('https://api.github.com/search/users?q='+data.search+"&page="+data.page)
            request.then(Response => {
                // console.log(Response.data.items)
                context.commit('STORE_USERS',Response.data)
            })
        }
      },
}