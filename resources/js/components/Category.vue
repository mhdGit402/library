<template>
    <div class="card" v-for="item in data">
        <h4 style="margin-bottom:15px;">Books in <span style="font-weight: bold;">{{ item.title }}</span> Category:</h4>

        <ul v-for="book in item.libraries">
            <li>
                <img width="150" height="190" :src="`/image/books/${ book.img }`" alt="...">

            </li>

            <li>
                <div class="card-body">
                    <h5 class="card-title">
                        {{ book.title }}
                    </h5>

                    <p>
                        Author: {{ book.author }}
                    </p>

                    <p class="card-text">{{ book.description }}</p>
                    <a :href="`/book/${book.id}`" class="btn btn-outline-secondary">View</a>
                    <a href="#" class="btn btn-outline-success">Save</a>
                </div>
            </li>

        </ul>
    </div>
</template>

<script>
export default {
    name: 'Category',
    props: {
        data: Object
    },
}
</script>

<style scoped>
.card{
        margin-left: 300px;
        border:none;
        width:30rem;
    }
ul {
    display: flex;
    border: var(--bs-card-border-width) solid var(--bs-card-border-color);
    border-radius: var(--bs-card-border-radius);
}

li {
    list-style: none;
    margin-right: 20px;
}

a {
    margin-top:20px;
    margin-left: 5px;
    text-decoration: none;
    color:#000;
}
h5{
    margin-bottom: 15px;
}
p{
    margin-bottom: 5px;
}
</style>