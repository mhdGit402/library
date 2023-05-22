<template>
    <div class="card" v-for="item in data">
        <h4 style="margin-bottom:15px;">Books in {{ item.title }} Category:</h4>

            <ul class="ulClass" v-for="book in item.libraries">
                <li>
                    <img width="150" height="190" :src="`/image/books/${book.img}`" alt="...">

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
.ulClass{
    background-color: #fff;
    padding:25px;
}
.card {
    margin-left: 300px;
    border: none;
    width: 30rem;
    background-color: #ededed;
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
    margin-top: 20px;
    margin-left: 5px;
    text-decoration: none;
}

h4 {
    color: #41B883;
}

h5 {
    margin-bottom: 15px;
}

p {
    margin-bottom: 5px;
}</style>