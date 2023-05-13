<template>
    <bookCard v-for="item in data" :key="item.id" :id="item.id" :title="item.title" :author="item.author"
        :description="item.description" :publisher="item.publisher" :img="item.img" :relation="item.category"
        :saved_books_id="this.saved_books_id" :guest="guest" 
        :get_books_id="this.get_books_id">
    </bookCard>
</template>

<script>

import bookCard from './bookCard.vue'

export default {
    name: 'Home',
    props: {
        data: Object,
        save: [Array, Boolean],
        get: [Array, Boolean]
    },
    data() {
        return {
            saved_books_id: [],
            guest: false,

            get_books_id: [],
        }
    },
    mounted() {

        if(this.save != false){
            this.save.forEach(el => {
            this.saved_books_id.push(el.id);
        });
        }else if(this.save === false){
            this.guest = true;
        }

        if(this.get != false){
            this.get.forEach(el => {
                this.get_books_id.push(el.id);
            });
        }

    },
    components: {
        bookCard,
    },
}
</script>
