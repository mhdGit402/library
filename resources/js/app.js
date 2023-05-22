import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

import './bootstrap';
import { createApp } from 'vue';

import Header from './components/Header.vue'
import Sidebar from './components/Sidebar.vue'
import Footer from './components/Footer.vue'
import Home from './components/Home.vue'
import Book from './components/Book.vue'
import CreateBook from './components/CreateBook.vue'
import Category from './components/Category.vue'
import CreateCategory from './components/CreateCategory.vue'
import Register from './components/Register.vue'
import Login from './components/Login.vue'
import GetBook from './components/GetBook.vue'
import MyBook from './components/MyBook.vue'
import SavedBook from './components/SavedBook.vue'
import Dashboard from './components/Dashboard.vue'
import UserList from './components/UserList.vue'
import BookList from './components/BookList.vue'
import User from './components/User.vue'
import UserUpdate from './components/UserUpdate.vue'
import Search from './components/Search.vue'

createApp({})
    .component('header-component', Header)
    .mount('#header')

createApp({})
    .component('sidebar-component', Sidebar)
    .mount('#sidebar')

createApp({})
    .component('footer-component', Footer)
    .mount('#footer')

createApp({})
    .component('home-component', Home)
    .mount('#app')

createApp({})
    .component('book-component', Book)
    .mount('#book')

createApp({})
    .component('createbook-component', CreateBook)
    .mount('#createBook')

createApp({})
    .component('category-component', Category)
    .mount('#category')

createApp({})
    .component('add_category-component', CreateCategory)
    .mount('#add_category')

createApp({})
    .component('register-component', Register)
    .mount('#register')

createApp({})
    .component('login-component', Login)
    .mount('#login')

createApp({})
    .component('getbook-component', GetBook)
    .mount('#getBook')

createApp({})
    .component('mybook-component', MyBook)
    .mount('#myBook')

createApp({})
    .component('savedbook-component', SavedBook)
    .mount('#savedBooks')

createApp({})
    .component('dashboard-component', Dashboard)
    .mount('#dashboard')

createApp({})
    .component('userlist-component', UserList)
    .mount('#userList')

createApp({})
    .component('booklist-component', BookList)
    .mount('#bookList')

createApp({})
    .component('user-component', User)
    .mount('#user')

createApp({})
    .component('userupdate-component', UserUpdate)
    .mount('#userUpdate')

createApp({})
    .component('search-component', Search)
    .mount('#search')