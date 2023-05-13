<template>
    <div class="card">
        <h4 style="margin-bottom:15px;">Update {{ data.name }}:</h4>
        <form @submit.prevent="updateUser">

            <div class="input-group mb-3">
                <input v-model="name" type="text" class="form-control" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
                <input disabled type="email" class="form-control" :value="data.email"
                    aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
                <button type="submit" class="btn btn-outline-primary">Update</button>
            </div>

            <div v-if="errors.length != 0">
                <p class="red">Fill the Following Fields:</p>
                <p class="red" v-for="error in errors">{{ error }}</p>
            </div>

        </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'UserUpdate',
    props: {
        data: Array
    },
    data(){
        return {
            name: this.data.name,
            errors: []
        }
    },
    methods:{
        updateUser(){
            if(this.name && this.nameValidateLength(this.name)){
                axios.patch(`http://127.0.0.1:8000/dashboard/user/${this.data.id}/update`, {name: this.name})
                .then(res => {
                    if(res.data){
                        window.location.replace(`http://127.0.0.1:8000/dashboard/user/${this.data.id}`);
                    }
                })
                .catch(err => console.log(err));
            }

            this.errors= [];

            if(!this.name){
                this.errors.push('Name');
            }else if(!this.nameValidateLength(this.name)){
                this.errors.push('Name must be at least 4 Characters.');
            }

        },

        nameValidateLength(el){
            if(el.length <= 4){
                return false;
            }
            return true;
        }
    }
}
</script>


<style scoped>
.card {
    margin-left: 300px;
    border: none;
}

form {
    width: 50% !important;
}
.red {
    color:red;
}
</style>