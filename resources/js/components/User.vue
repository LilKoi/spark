<template>
    <div>
        {{user}}
    </div>
</template>
<script>
export default {
    computed:{
        user() {
            return this.$store.getters['User/user', this.$route.params.id]
        }
    }
}
</script>