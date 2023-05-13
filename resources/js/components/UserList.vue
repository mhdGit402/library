<template>
    <h4 style="margin-left:300px;margin-bottom:15px;">Users List</h4>
    <div class="card">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody v-for="item in data">
                <tr>
                    <td scope="row"><a :href="`/dashboard/user/${item.id}`">{{ item.name }}</a></td>
                    <td>{{item.email}}</td>
                    <td>{{item.role_id}}</td>
                    <td><button @click="deleteUser(item.id)">Delete</button><a :href="`/dashboard/user/${item.id}/update`">Update</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'UserList',
    props: {
        data: Object
    },
    methods: {
        deleteUser(id){
            axios.delete(`http://127.0.0.1:8000/user/${id}/delete`, {
                method: 'delete'
            })
            .then(res => {
                if(res.data){
                    window.location.reload();
                }
            })
            .catch(err => console.log(err));
        }
    }
}
</script>

<style scoped>
.card {
    margin-left: 300px;
    border: none;
}
.thead-light{
    background-color: #ededed;
}
a{
    text-decoration: none;
    margin-right:10px;
}
button {
    border:none;
    color: #0d6efd;
    background-color: transparent;
}
</style>