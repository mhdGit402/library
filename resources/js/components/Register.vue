<template>
    <div class="card">
        <h4 style="margin-bottom:15px;">Register</h4>
        <form @submit.prevent="addUser">

            <div class="input-group mb-3">
                <input v-model="name" type="text" class="form-control" placeholder="Name" aria-describedby="basic-addon1">
            </div>


            <div class="input-group mb-3">
                <input v-model="email" type="email" class="form-control" placeholder="Email Address"
                    aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
                <input v-model="password" type="password" class="form-control" placeholder="Password"
                    aria-describedby="basic-addon1">
            </div>


            <div class="input-group mb-3">
                <button type="submit" class="btn btn-outline-primary mt-3" style="width:150px;">Sign in</button>
            </div>

            <div v-show="errors.length !=0">
                <p class="red">Fill the Following Fields:</p>
                <p class="red" v-for="error in errors">{{ error }}</p>
            </div>

        </form>
    </div>
</template>

<script>
export default {
    name: 'Register',
    data() {
        return {
            data: {},
            name: null,
            email: null,
            password: null,
            errors: []
        }
    },
    methods: {

        addUser() {

            if (this.name && this.email && this.password) {

                this.data = {
                    role_id: 3,
                    name: this.name,
                    email: this.email,
                    password: this.password
                }

                axios.post('http://127.0.0.1:8000/register', this.data)
                    .then(res => {
                        if (res.data) {
                            this.data = {};
                            this.name = null
                            this.email = null;
                            this.password = null;
                            window.location.replace('/');
                        }
                    })
                    .catch(err => console.log(err));
            }

            this.errors = [];

            if(!this.name){
                this.errors.push('Name');
            }else if(!this.nameValidateLength(this.name)){
                this.errors.push('Name must be at least 4 Characters.');
            }
            if(!this.email){
                this.errors.push('Email');
            }
            if(!this.password){
                this.errors.push('Password');
            }else if(!this.passwordValidateLength(this.password)){
                this.errors.push('Password must be at least 4 Characters.');
            }


        },

        nameValidateLength(el) {
            if(el.length >= 4){
                return true
            }
            return false
        },

        passwordValidateLength(el) {
            if(el.length >= 4){
                return true;
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
h4{
    color: #41B883;
}
input{
    height:50px;
}
form {
    width: 50% !important;
}
.red {
    color:red;
}
</style>