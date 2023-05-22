<template>
 <h4 style="margin-left:300px;margin-bottom:15px;">Users List</h4>
    <div class="card">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">User Name</th>
                    <th scope="col">Book Name</th>
                    <th scope="col">Start Time</th>
                    <th scope="col">Due Time</th>
                </tr>
            </thead>
            <tbody v-for="item in data">
                <tr>
                    <td scope="row"><a :href="`/dashboard/user/${item.user.id}`">{{ item.user.name }}</a></td>
                    <td><a :href="`/book/${item.library.id}`">{{item.library.title}}</a></td>
                    <td>{{item.startTime}}</td>
                    <td>{{ item.dueTime }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: 'BookList',
        props:{
            data: Array
        }
    }
</script>

<style scoped>
.card {
    margin-left: 300px;
    border: none;
    background-color: #ededed;
}
.thead-light{
    background-color: #c5c5c5;
}
tbody tr{
    background-color: #fff;
}
a{
    text-decoration: none;
}
h4{
    color: #41B883;
}
</style>