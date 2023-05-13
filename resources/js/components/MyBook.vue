<template>
        <h4 style="margin-left:300px;margin-bottom:15px;">My Books:</h4>
    <div v-for="item in data.get_libraries" class="card" style="width: 30rem;">
        <ul>
            <li style="margin-top:15px;">
                <img width="150" height="190" :src="`/image/books/${item.img}`" alt="...">

            </li>

            <li>
                <div class="card-body">
                    <h5 class="card-title">
                        {{ item.title }}
                    </h5>

                    <p>
                        Author: {{ item.author }}
                    </p>

                    <p>
                        <span>Category: <a :href="`/category/${item.category.id}`">{{ item.category.title }}</a></span>
                    </p>

                    <p class="card-text">{{ item.description }}</p>



                    <!-- <div v-if="!guest">
                        <a :href="`/book/${id}`" class="btn btn-outline-secondary">View</a>
                        <button v-if="!this.saved_books_id.includes(this.id) && !saveStatus" @click="save" class="btn btn-outline-success">Save</button>
                        <button v-if="this.saved_books_id.includes(this.id) || saveStatus" class="savedBook btn btn-success">Saved</button>
                        <a :href="`/get/${id}`" class="btn btn-outline-primary">Get</a>
                    </div>
                    <div v-else>
                        <a :href="`/book/${id}`" class="btn btn-outline-primary">View</a>
                        <button @click="needLog" class="btn btn-outline-success">Save</button>
                    </div> -->



                </div>
            </li>

        </ul>
        <ul>
            <li>
                <div class="mt-3">
                    <h6><label for="startTime">Start Time:</label></h6>
                    <input class="form-control" disabled id="startTime" type="text" :value="item.pivot.startTime">
                    <h6><label class="mt-4" for="dueTime">Due Time:</label></h6>
                    <input class="form-control" disabled id="dueTime" type="text" :value="item.pivot.dueTime">
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: 'MyBook',
    props: {
        data: Array
    },
}
</script>

<style scoped>
.card {
    margin-left: 300px;
    margin-bottom: 20px;
}

ul {
    display: flex;
}

li {
    list-style: none;
    margin-right: 20px;
}

a {
    margin-top: 20px;
    margin-left: 5px;
    text-decoration: none;
    color: #000;
}

h5 {
    margin-bottom: 15px;
}

p {
    margin-bottom: 5px;
}

button {
    margin-top: 20px;
    margin-left: 5px;
}

.savedBook {
    cursor: default;
}
</style>