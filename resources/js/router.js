import User from "./components/User.vue"
import Main from "./components/ExampleComponent.vue"
export default [
    {
        name: 'main',
        path: "/",
        component: Main
    },
    {
        name: 'user.show',
        path: "/user/:id",
        component: User
    }
]