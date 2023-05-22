<template>
    <div class="card">
        <ul>
            <li style="margin-top:15px;">
                <img width="150" height="190" :src="`/image/books/${img}`" alt="...">

            </li>

            <li>
                <div class="card-body">
                    <h5 class="card-title">
                        {{ title }}
                    </h5>

                    <p>
                        Author: {{ author }}
                    </p>

                    <p>
                        <span>Category: <a id="categoryLink" :href="`/category/${relation.id}`">{{ relation.title }}</a></span>
                    </p>

                    <p class="card-text">{{ description }}</p>

                    <div v-if="!guest">
                        <a :href="`/book/${id}`" class="btn btn-outline-secondary">View</a>
                        <button v-if="!this.saved_books_id.includes(this.id) && !saveStatus" @click="save" class="btn btn-outline-success">Save</button>
                        <button v-if="this.saved_books_id.includes(this.id) || saveStatus" class="savedBook btn btn-success">Saved</button>
                        <a v-if="!this.get_books_id.includes(this.id)" :href="`/get/${id}`" class="btn btn-outline-primary">Get</a>
                        <button v-if="this.get_books_id.includes(this.id)" class="btn btn-primary">Got</button>
                    </div>
                    <div v-else>
                        <a :href="`/book/${id}`" class="btn btn-outline-primary">View</a>
                        <button @click="needLog" class="btn btn-outline-success">Save</button>
                    </div>
                    


                </div>
            </li>
        </ul>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'bookCard',
    props: {
        id: Number,
        title: String,
        author: String,
        description: String,
        relation: Object,
        publisher: String,
        img: String,

        guest: Boolean,

        saved_books_id: Array,

        get_books_id: Array
    },
    data() {
        return {
            saveStatus: false,
        }
    },
    methods:{
        save(){
            axios.post(`http://127.0.0.1:8000/save/${this.id}`)
            .then(res=> {
                if(res.data){
                    this.saveStatus = true;
                }
            })
            .catch(err=>console.log(err));
        },
        needLog(){
            window.location.replace('/login');
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
    margin-top:20px;
    margin-left: 5px;
    text-decoration: none;
}
h5{
    margin-bottom: 15px;
}
p{
    margin-bottom: 5px;
}
button{
    margin-top:20px;
    margin-left: 5px;
}
.savedBook{
    cursor: default;
}
#categoryLink{
    color:#000;
    margin-left:0px !important;
}
</style>