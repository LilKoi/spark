<template>
    <div>
    12313
        {{user}}
    </div>
</template>
<script>
export default {
    computed:{
        user() {
            // console.log(123)
            // console.log()
            return this.$store.getters['User/user', this.$route.params.id]
        }
    }
}
</script>