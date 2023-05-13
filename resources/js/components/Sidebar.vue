<template>
    <nav id="sidebar">
        <div style="display:flex" class="sidebar-header">
            <h3>Library</h3>
            <img style="margin-left:10px;margin-top:5px" width="32" height="32" src="/image/book.png">
        </div>

        <h4 style="margin-left:20px;margin-top:20px;" v-if="url == 'dashboard'">Dashboard</h4>

        <ul class="list-unstyled components">
            <!-- <li>
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="#">Home 1</a>
                    </li>
                    <li>
                        <a href="#">Home 2</a>
                    </li>
                    <li>
                        <a href="#">Home 3</a>
                    </li>
                </ul>
            </li> -->

            <li v-if="url != 'dashboard'" class="mb-3">
                
                <a href="#"
                    data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false"><span>Categories</span></a>
                <!-- <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                    data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                    Categories
                </button> -->
                <div class="collapse" id="home-collapse" style="">
                    <ul id="categoryTitle" v-for="category in data" class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a :href="`/category/${category.id}`" class="link-body-emphasis d-inline-flex text-decoration-none">{{ category.title }}</a>
                        </li>
                    </ul>
                </div>
            </li>


            <li v-if="role == 'notUser' && url =='dashboard'">
                <a href="/dashboard/book/create"><span>Add Book</span></a>
            </li>
            <li v-if="role == 'notUser' && url =='dashboard'" class="mb-2">
                <a href="/dashboard/category/create"><span>Add Category</span></a>
            </li>
            <li v-if="role == 'notUser' && url =='dashboard'">
                <a href="/dashboard/users/list"><span>Users List</span></a>
            </li>
            <li v-if="role == 'notUser' && url =='dashboard'" class="mb-3">
                <a href="/dashboard/books/list"><span>Delivered Books</span></a>
            </li>


            <li v-if="role == 'user' && url =='dashboard'">
                <a href="/book/my"><span>My Books</span></a>
            </li>
            <li v-if="role == 'user' && url =='dashboard'">
                <a href="/book/saved"><span>Saved Books</span></a>
            </li>
        </ul>
        <!-- 
        <ul class="list-unstyled CTAs">
            <li>
                <a href="#" class="download">Download source</a>
            </li>
            <li>
                <a href="#" class="article">Back to article</a>
            </li>
        </ul> -->
    </nav>
</template>

<script>
import axios from 'axios';


export default {
    name: 'Sidebar',
    props:{
        role: String
    },
    data(){
        return {
            data: {},
            url: location.pathname.split('/')[1]
        }
    },
    mounted(){
        axios.get('http://127.0.0.1:8000/category')
        .then(res => {
            this.data = res.data;
        })
        .catch(err => console.log(err));
    }
}
</script>

<style scoped>
#sidebar {
    height: 100%;
    width: 160px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    overflow-x: hidden;
    padding-top: 20px;
}

#sidebar li a span {
    margin-left: 20px;
}

button {
    padding: 10px;
    font-size: 1.1em;
}

button:hover {
    color: inherit;
    text-decoration: none;
    transition: all 0.3s;
    background: #fff;
}

#categoryTitle li a{
    font-size: 1em !important;
}

@import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";

body {
    font-family: 'Poppins', sans-serif;
    background: #fafafa;
}

p {
    font-family: 'Poppins', sans-serif;
    font-size: 1.1em;
    font-weight: 300;
    line-height: 1.7em;
    color: #999;
}

a,
a:hover,
a:focus {
    color: inherit;
    text-decoration: none;
    transition: all 0.3s;
}

.navbar {
    padding: 15px 10px;
    background: #fff;
    border: none;
    border-radius: 0;
    margin-bottom: 40px;
    box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
}

.navbar-btn {
    box-shadow: none;
    outline: none !important;
    border: none;
}

.line {
    width: 100%;
    height: 1px;
    border-bottom: 1px dashed #ddd;
    margin: 40px 0;
}

/* ---------------------------------------------------
    SIDEBAR STYLE
----------------------------------------------------- */

.wrapper {
    display: flex;
    width: 100%;
    align-items: stretch;
}

#sidebar {
    min-width: 250px;
    max-width: 250px;
    background: #ededed;
    color: #000;
    transition: all 0.3s;
}

#sidebar.active {
    margin-left: -250px;
}

#sidebar .sidebar-header {
    padding: 20px;
    background: #ededed;
}

/* #sidebar ul.components {
    padding: 20px 0;
} */

#sidebar ul p {
    color: #fff;
    padding: 10px;
}

#sidebar ul li a {
    padding: 10px;
    font-size: 1.1em;
    display: block;
}

#sidebar ul li a:hover {
    background: #fff;
}

#sidebar ul li.active>a,
a[aria-expanded="true"] {
    color: #000;
    background: #fff;
}

a[data-toggle="collapse"] {
    position: relative;
}

.dropdown-toggle::after {
    display: block;
    position: absolute;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
}

ul ul a {
    font-size: 0.9em !important;
    padding-left: 30px !important;
}

ul.CTAs {
    padding: 20px;
}

ul.CTAs a {
    text-align: center;
    font-size: 0.9em !important;
    display: block;
    border-radius: 5px;
    margin-bottom: 5px;
}

a.download {
    background: #fff;
    color: #7386D5;
}

a.article,
a.article:hover {
    background: #6d7fcc !important;
    color: #fff !important;
}

/* ---------------------------------------------------
    CONTENT STYLE
----------------------------------------------------- */

#content {
    width: 100%;
    padding: 20px;
    min-height: 100vh;
    transition: all 0.3s;
}

/* ---------------------------------------------------
    MEDIAQUERIES
----------------------------------------------------- */

@media (max-width: 768px) {
    #sidebar {
        margin-left: -250px;
    }

    #sidebar.active {
        margin-left: 0;
    }

    #sidebarCollapse span {
        display: none;
    }
}
</style>