<template>
    <div class="card">
        <h4 style="margin-bottom:15px;">Add Book</h4>
        <form @submit.prevent="addBook" enctype="multipart/form-data">

            <ul>
                <li>
                    <div class="input-group mb-3">
                        <input v-model="title" type="text" class="form-control" placeholder="Book Title"
                            aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </li>
                <li v-if="title_validate">
                    <p class="validate">Book's Title is Required.</p>
                </li>
                <li>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Book Category</label>
                        <select v-model="category_id" class="form-select" id="inputGroupSelect01">
                            <option value=0 selected>Choose...</option>
                            <option v-for="item in data" :value="item.id">{{ item.title }}</option>
                        </select>
                    </div>
                </li>
                <li v-if="category_id_validate">
                    <p class="validate">Book's Category is Required.</p>
                </li>
                <li>
                    <div class="input-group mb-3">
                        <input v-model="author" type="text" class="form-control" placeholder="Book Author"
                            aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </li>
                <li v-if="author_validate">
                    <p class="validate">Book's Author is Required.</p>
                </li>
                <li>
                    <div class="input-group mb-3">
                        <input v-model="publisher" type="text" class="form-control" placeholder="Book Publisher"
                            aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </li>
                <li v-if="publisher_validate">
                    <p class="validate">Book's Publisher is Required.</p>
                </li>
                <li>
                    <div class="input-group mb-3">
                        <textarea v-model="description" rows="6" class="form-control" aria-label="With textarea"
                            placeholder="Book Description"></textarea>
                    </div>
                </li>
                <li v-if="description_validate">
                    <p class="validate">Book's Description is Required.</p>
                </li>
                <li>
                    <div class="input-group mb-3">
                        <input style="height:38px !important" @change="imageFile" class="form-control" type="file">
                    </div>
                </li>
                <li v-if="imageFile_validate">
                    <p class="validate">Upload Image for Book's Cover.</p>
                </li>
                <li>
                    <div class="input-group mb-3">
                        <button type="submit" class="btn btn-outline-primary mt-3" style="width: 150px;">Add Book</button>
                    </div>
                </li>
                <li v-if="error.length != 0">
                    <p class="validate">The Following Fields are required:</p>
                    <p class="validate" v-for="err in error">{{ err }}</p>
                </li>
            </ul>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'CreateBook',
    props: {
        data: Object
    },
    data() {
        return {
            book: {},
            category_id: 0,
            title: null,
            author: null,
            publisher: null,
            description: null,
            img: null,
            // category_id_validate: false,
            // title_validate: false,
            // author_validate: false,
            // publisher_validate: false,
            // description_validate: false,
            imageFile_validate: false,
            imageLength: undefined,
            error: []

        }
    },
    methods: {
        imageFile(e) {
            this.img = e.target.files[0];
            this.imageLength = e.target.files.length;
        },
        addBook() {

            this.error = [];

            if(!this.title){
                this.error.push('Title');
            }
            if(this.category_id == 0){
                this.error.push('category');
            }
            if(!this.author){
                this.error.push('author');
            }
            if(!this.publisher){
                this.error.push('publisher');
            }
            if(!this.description){
                this.error.push('description');
            }
            if(this.imageLength == undefined){
                this.error.push('image');
            }

            if(this.title && this.category_id != 0 && this.author && this.publisher && this.description && this.imageLength != undefined){


            const config = {
                headers: { 'content-type': 'multipart/form-data' }
            }

            this.book = {
                category_id: this.category_id,
                title: this.title,
                author: this.author,
                publisher: this.publisher,
                description: this.description,
                img: this.img
            }

            axios.post('http://127.0.0.1:8000/dashboard/book/create', this.book, config)
                .then(res => {
                    if (res.data != false) {
                        this.book = {};
                        this.title = null;
                        this.category_id = 0
                        this.author = null;
                        this.publisher = null;
                        this.description = null;
                        window.location.replace(`/book/${res.data}`);
                    }
                })
                .catch(err => console.log(err));

            }
        }
    }
}
</script>

<style scoped>
.card {
    background-color: #ededed;
    margin-left: 300px;
    border: none;
}

form {
    width: 50% !important;
}

li {
    list-style-type: none;
}

.validate {
    color: red;
}
input{
    height:50px;
}
h4{
    color: #41B883;
}
</style>