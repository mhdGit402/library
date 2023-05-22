<template>
  <div class="p-3 mb-3">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <!-- <li><a href="/" class="nav-link px-2">Home</a></li> -->
        </ul>

        <form id="searchForm" @submit.prevent="searchBook" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
          <input v-model="search" type="text" class="form-control" placeholder="Search for Books..." aria-label="Search">
        </form>

        <div class="dropdown text-end">


          <!-- Auth -->
          <ul style="border-radius: 15px;" v-if="auth" class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li style="margin-top:5px;">
              <h6>Welcome {{ username }}</h6>
            </li>
            <li>
              <a href="#" class="d-block text-decoration-none dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                <img src="/image/user.png" alt="mdo" width="32" height="32" class="rounded-circle">
              </a>
              <ul class="dropdown-menu text-small" style="">
                <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="/logout">Log out</a></li>
              </ul>
            </li>
          </ul>

          <!-- Guest -->
          <ul v-else class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="/register" class="nav-link px-2">Register</a></li>
            <li><a href="/login" class="nav-link px-2">Login</a></li>
          </ul>


        </div>
      </div>
    </div>
  </div>
</template>

<script>

  export default {
    name: 'Header',
    props: {
      auth: Boolean,
      username: String,
    },
    data(){
      return {
        search: null
      }
    },
    methods: {
      searchBook(){
        window.location.replace(`http://127.0.0.1:8000/s/${this.search}`);
    }
  }
  }
</script>

<style scoped>
*{
  background-color: #34495E;
  color:#fff;
}
a:hover{
  color:#41B883;
}
#searchForm input{
  background-color: #fff !important;
}
#searchForm input:focus{
  border-color:#41B883 !important;
}
.dropdown-menu{
  background-color: #41B883 !important;
}
.dropdown-menu li {
  background-color: #41B883 !important;
}
.dropdown-menu li a{
  background-color: #41B883;
}
.dropdown-menu li a:hover{
  color:#34495E !important;
}
.dropdown li {
  margin-left: 10px;
}
</style>