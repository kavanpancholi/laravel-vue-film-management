<template>
    <div>
        <b-nav>
            <b-nav-item :to="{ name: 'home' }">Home</b-nav-item>
            <b-nav-item :to="{ name: 'films' }">Films</b-nav-item>
            <b-nav-item v-if="!this.$store.getters.isLoggedIn" :to="{ name: 'register' }">Register</b-nav-item>
            <b-nav-item v-if="!this.$store.getters.isLoggedIn" :to="{ name: 'login' }">Login</b-nav-item>
            <b-nav-item v-if="this.$store.getters.isLoggedIn" @click.prevent="logout">Logout</b-nav-item>
        </b-nav>

        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>
<script>
    export default {
        methods: {
            logout: function () {
                this.$store.dispatch('logout')
                    .then(() => {
                        this.$router.push('/login')
                    })
            }
        }
    }
</script>