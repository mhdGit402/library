<template>
    <div class="card">
        <h4 style="margin-bottom:15px;">Add Category</h4>
        <form @submit.prevent="addCategory">
            <ul>
                <li>
                    <div class="input-group mb-3">
                        <input v-model="title" type="text" class="form-control" placeholder="Category Title"
                            aria-describedby="basic-addon1">
                    </div>
                </li>
                <li>
                    <p v-if="titleValidate" style="color:red">Category Title is required.</p>
                </li>
                 <li>
                    <div class="input-group mb-3">
                        <button type="submit" class="btn btn-outline-primary mt-3" style="width:150px;">Add Category</button>
                    </div>
                </li>
            </ul>
        </form>
    </div>
</template>

<script>
export default {
    name: 'CreateCategory',
    data() {
        return {
            data: {},
            title: null,
            titleValidate: false
        }
    },
    methods: {
        addCategory() {
            if (!this.title) {
                this.titleValidate = true;
            } else {
                this.data = {
                    title: this.title
                };

                axios.post('http://127.0.0.1:8000/dashboard/category/create', this.data)
                    .then(res => {
                        if (res.data) {
                            this.data = {};
                            this.title = null;
                            window.location.replace('/dashboard');
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
    margin-left: 300px;
    border: none;
    background-color: #ededed;
}

form {
    width: 50% !important;
}
li{
    list-style: none;
}
h4{
    color: #41B883;
}
input{
    height:50px;
}
</style>