import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

import './bootstrap';
import { createApp } from 'vue';


const header = createApp({});
const sidebar = createApp({});
const footer = createApp({});
const app = createApp({});

const book = createApp({});
const createBook = createApp({});

const category = createApp({});
const create_category = createApp({});

const register = createApp({});
const login = createApp({});
const getBook = createApp({});
const mybook = createApp({});
const savedbook = createApp({});
const dashboard = createApp({});
const userlist = createApp({});
const booklist = createApp({});
const user = createApp({});
const userupdate = createApp({});
const search = createApp({});


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

header.component('header-component', Header);
sidebar.component('sidebar-component', Sidebar);
footer.component('footer-component', Footer);
app.component('home-component', Home);
book.component('book-component', Book);
createBook.component('createbook-component', CreateBook);
category.component('category-component', Category);
create_category.component('add_category-component', CreateCategory);
register.component('register-component', Register);
login.component('login-component', Login);
getBook.component('getbook-component', GetBook);
mybook.component('mybook-component', MyBook);
savedbook.component('savedbook-component', SavedBook);
dashboard.component('dashboard-component', Dashboard);
userlist.component('userlist-component', UserList);
booklist.component('booklist-component', BookList);
user.component('user-component', User);
userupdate.component('userupdate-component', UserUpdate);
search.component('search-component', Search);

header.mount('#header');
sidebar.mount('#sidebar');
footer.mount('#footer');
app.mount('#app');
book.mount('#book');
createBook.mount('#createBook');
category.mount('#category');
create_category.mount('#add_category');
register.mount('#register');
login.mount('#login');
getBook.mount('#getBook');
mybook.mount('#myBook');
savedbook.mount('#savedBooks');
dashboard.mount('#dashboard');
userlist.mount('#userList');
booklist.mount('#bookList');
user.mount('#user');
userupdate.mount('#userUpdate');
search.mount('#search');