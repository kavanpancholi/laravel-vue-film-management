<template>
    <div class="login-box">
        <div class="login-box-body">
            <p class="login-box-msg">
                <b>Login</b>
            </p>
            <div class="alert alert-danger" v-if="error">
                {{error}}
            </div>
            <fieldset>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" name="username" placeholder="Username" class="form-control" autofocus="true" required="true" v-model="username">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
                        </div>
                        <input type="password" name="password" placeholder="password" class="form-control" required="true" v-model="password">
                    </div>
                </div>
                <div class="d-flex flex-row">
                    <div class="p-2">
                        <button type="button" class="btn btn-primary btn-block btn-flat" @click.prevent="login" ><i class="fa fa-sign-in"></i> Login</button>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                username: '',
                password: '',
                error: null
            }
        },
        methods: {
            login(){
                let username = this.username;
                let password = this.password;
                this.$store.dispatch('login', { username, password })
                    .then(() => this.$router.push('/'))
                    .catch(err => {
                        this.error = "Invalid Credentials";
                    });
            },
        }
    }
</script>