<template>
    <div v-for="item in data" class="card" style="width: 30rem;">
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
                    <form @submit.prevent="getBook">
                            <h6><label for="startTime">Start Time:</label></h6>
                            <input class="form-control" disabled id="startTime" type="text" :value="startTime">
                            <h6><label class="mt-4" for="dueTime">Due Time:</label></h6>
                            <input class="form-control" disabled id="dueTime" type="text" :value="dueTime">
                            <button  type="submit" class="btn btn-outline-success mt-4" style="width:150px;">Get Book</button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: 'GetBook',
    props: {
        data: Array,
        user_id: Number,
        library_id: Number,
    },
    data() {
        return {
            get: {},
            startTime: new Date().toLocaleDateString(),
            dueTime: undefined
        }
    },
    mounted() {
        this.dueTime = new Date();
        this.dueTime.setDate(this.dueTime.getDate() + 5);
        this.dueTime = this.dueTime.toLocaleDateString();
    },
    methods: {
        getBook() {
            this.get = {
                user_id : this.user_id,
                library_id : this.library_id,
                startTime : this.startTime,
                dueTime : this.dueTime
            };

            axios.post(`http://127.0.0.1:8000/get/${this.library_id}`, this.get)
            .then(res => {
                if(res.data){
                    window.location.replace('/');
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
.card-body{
    margin-top:30px;
    padding-right: inherit;
} 
</style>