<template>
    <h4 style="margin-left:300px;margin-bottom:15px;">User Details:</h4>
    <div class="card" v-for="item in data">

        <div>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ item.name }}</td>
                        <td>{{ item.email }}</td>
                        <td>{{ item.role_id }}</td>
                        <td><button @click="deleteUser(item.id)">Delete</button>
                            <a :href="`/dashboard/user/${item.id}/update`">Update</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-5">
            <h4>User's Books:</h4>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Publisher</th>
                        <th scope="col">Category</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="book in item.get_libraries">
                        <td>{{ book.title }}</td>
                        <td>{{ book.author }}</td>
                        <td>{{ book.publisher }}</td>
                        <td>{{ book.category.title }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-5">
            <h4>User's Saved Books:</h4>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Publisher</th>
                        <th scope="col">Category</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="book in item.libraries">
                        <td>{{ book.title }}</td>
                        <td>{{ book.author }}</td>
                        <td>{{ book.publisher }}</td>
                        <td>{{ book.category.title }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'User',
    props: {
        data: Object
    },
    methods: {
        deleteUser(id) {
            axios.delete(`http://127.0.0.1:8000/user/${id}/delete`, {
                method: 'delete'
            })
                .then(res => {
                    if (res.data) {
                        window.location.replace('http://127.0.0.1:8000/dashboard/users/list');
                    }
                })
                .catch(err => console.log(err))
        }
    }
}
</script>

<style scoped>
.card {
    margin-left: 300px;
    border: none;
}

.thead-light {
    background-color: #ededed;
}

a {
    text-decoration: none;
    margin-right: 10px;
}

button {
    border: none;
    background-color: transparent;
    color: #0d6efd;
}
</style>