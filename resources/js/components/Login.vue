<template>
    <div class="card">
        <h4 style="margin-bottom:15px;">Login</h4>
        <form @submit.prevent="loginUser">

            <div class="input-group mb-3">
                <input v-model="email" type="email" class="form-control" placeholder="Email Address"
                    aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
                <input v-model="password" type="password" class="form-control" placeholder="Password"
                    aria-describedby="basic-addon1">
            </div>


            <div class="input-group mb-3">
                <button type="submit" class="btn btn-outline-primary mt-3" style="width:150px;">Log in</button>
            </div>

            <div v-show="errors.length != 0">
                <p class="red">Fill The following Fields:</p>
                <p class="red" v-for="error in errors">{{ error }}</p>
            </div>

            <div v-show="credentialValidate">
                <p class="red">Wrong Credentials.</p>
            </div>

        </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'Login',
    data() {
        return {
            data: {},
            email: null,
            password: null,
            errors: [],
            credentialValidate: false
        }
    },
    methods: {

        loginUser() {

            this.credentialValidate = false;

            if (this.email && this.password && this.passwordValidateLength(this.password)) {
                this.data = {
                    email: this.email,
                    password: this.password
                }

                axios.post('http://127.0.0.1:8000/login', this.data)
                    .then(res => {
                        if (res.data) {
                            this.data = {};
                            this.email = null;
                            this.password = null;
                            window.location.replace('/');
                        } else if (!res.data) {
                            this.credentialValidate = true;
                        }
                    })
                    .catch(err => console.log(err));
            }

            this.errors = [];

            if(!this.email){
                this.errors.push('Email');
            }

            if(!this.password){
                this.errors.push('password');
            }else if(!this.passwordValidateLength(this.password)){
                this.errors.push('Password must be at least 4 Characters.');
            }


        },
        passwordValidateLength(el) {
            if(el.length >= 4){
                return true
            }
            return false;
        }
    }
}
</script>

<style scoped>
.card {
    margin-left: 300px;
    border: none;
    background-color: #ededed;
}
input {
    height:50px;
}
h4{
    color: #41B883;
}
form {
    width: 50% !important;
}

.red {
    color: red;
}
</style>