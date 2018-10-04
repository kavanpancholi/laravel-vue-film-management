<template>
    <div>
        <p class="login-box-msg">
            <b>Register</b>
        </p>
        <div class="alert alert-danger" v-if="error && !success">
            <p>There was an error, unable to complete registration.</p>
        </div>
        <div class="alert alert-success" v-if="success">
            <p>Registration completed. You can now <router-link :to="{name:'login'}">sign in.</router-link></p>
        </div>
        <form autocomplete="off" @submit.prevent="register" v-if="!success" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" v-model="name" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control" v-model="password" required>
            </div>
            <div class="alert alert-danger" v-if="errors">
                <ul v-for="error in errors">
                    <li>{{error}}</li>
                </ul>
            </div>
            <button type="submit" @click.prevent="register" class="btn btn-default">Submit</button>
        </form>
    </div>
</template>


<script type="text/javascript">
    export default {
        data(){
            return {
                name: '',
                email: '',
                password: '',
                error: false,
                errors: null,
                success: false
            };
        },
        methods: {
            register: function () {
                let that = this;
                let data = {
                    name: this.name,
                    email: this.email,
                    password: this.password
                };
                this.$store.dispatch('register', data)
                    .then(() => this.$router.push('/login'))
                    .catch(err => {
                        if (typeof err.response.data.errors === 'object') {
                            that.errors = _.flatten(_.toArray(err.response.data.errors));
                        } else {
                            that.errors = ['Something went wrong. Please try again.'];
                        }
                    })
            }
        }
    }
</script>