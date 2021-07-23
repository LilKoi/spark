<template>
    <div>
        <input class="center" v-model='search' @input="findUsers()">
        <template v-if='users'>
            <section class="container">
                <div class="row" v-infinite-scroll="getUsers" infinite-scroll-disabled="busy" infinite-scroll-distance="1">
                        <b-card
                        v-for="user in users"
                        :title="user.login"
                        :key=user.id
                        :img-src="user.avatar_url"
                        img-alt="Image"
                        img-top
                        tag="article"
                        style="max-width: 20rem;"
                        class="m-10 col-xxl"
                        >
                        <p>{{user.id}}</p>
                        <router-link :to="{ 
                                name: 'user.show', 
                                params: { id: user.id }
                            }"
                        >
                            нажми на меня
                        </router-link>
                        </b-card>
                </div>
            </section>
        </template>
        <h1 v-else>Напишите что-то в поиске</h1>
    </div>
</template>

<script>
import _ from "lodash"
    export default {
        data: function () {
            return {
                search: '',
                page: 1,
                busy:false
            }
        },
        methods: {
            findUsers:
                _.debounce(
                function() {
                    this.page = 1
                    const data = {
                        search: this.search,
                        page: this.page 
                    }
                    const request = this.$store.dispatch('User/getUsers',data)
                }
                ,1000),
            getUsers(){
                this.page = this.page + 1
                const data = {
                    search: this.search,
                    page: this.page 
                }
                const request = this.$store.dispatch('User/getUsers',data)
            }
        },
        computed: {
            users() {
                return this.$store.getters['User/state']
            },
        },
        beforeMount() {
        this.findUsers();
        }
    }
</script>
<style>
.center{
    display: flex;
    margin: auto;
}
</style>