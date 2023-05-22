<template>
    <div v-for="item in data" class="card" style="width: 30rem;">
        <ul>
            <li style="margin-top:15px;">
                <img width="150" height="190" :src="`/image/books/${item.img}`" alt="...">
            </li>
            <li>
                <div class="card-body">
                    <h5 class="card-title">{{ item.title }}</h5>
                    <p>Author: {{ item.author }}</p>
                    <p><span>Category: <a id="categoryLink" :href="`/category/${item.category.id}`">{{ item.category.title }}</a></span></p>
                    <p class="card-text">Publisher: {{ item.publisher }}</p>
                    <p class="card-text">{{ item.description }}</p>

                    <div v-if="!guest">
                        <button v-if="!libraries_id.includes(item.id) && !savedBook" @click="saveBook(item.id)"
                            class="btn btn-outline-success">Save</button>
                        <button v-if="libraries_id.includes(item.id) || savedBook"
                            class="savedBook btn btn-success">Saved</button>

                        <a v-if="!get_books_id.includes(item.id)" :href="`/get/${item.id}`" class="btn btn-outline-primary">Get</a>
                        <button v-if="get_books_id.includes(item.id)" class="btn btn-primary">Got</button>
                    </div>
                    
                    <div v-else>
                        <button @click="needLog"
                            class="btn btn-outline-success">Save</button>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'Book',
    props: {
        data: Array,
        save: [Array, Boolean],
        get: [Array, Boolean]
    },
    data() {
        return {
            libraries_id: [],
            get_books_id: [],
            savedBook: false,
            guest: false
        }
    },
    mounted() {
        if (this.save != false) {
            this.save.forEach(el => {
                this.libraries_id.push(el.id);
            });
        } else if (this.save === false) {
            this.guest = true;
        }
        
        if(this.get != false){
            this.get.forEach(el => {
                this.get_books_id.push(el.id);
            });
        }
    },
    methods: {
        saveBook(id) {
            axios.post(`http://127.0.0.1:8000/save/${id}`)
                .then(() => {
                    this.savedBook = true;
                })
                .catch(err => console.log(err));
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
    margin-top: 20px;
    margin-left: 5px;
    text-decoration: none;
}
#categoryLink{
    color:#000;
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
    padding-right: inherit;
}
</style>