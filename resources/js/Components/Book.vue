<template>
    <div class="card" style="width: 18rem; height: 29rem;">
        <img :src="'http://127.0.0.1:8000/storage/'+props.book.imageLink" class="card-img-top" alt="..." height="250px" width="250px">
        <div class="card-body">
            <h5 class="card-title">{{ props.book.title }}</h5>
            <p class="card-text">{{props.book.description}}</p>
            <Link :href="route('books.show',props.book.id)" class="btn btn-primary">Détails</Link>
        </div>
    </div>
</template>



<script setup>
import {Link} from "@inertiajs/vue3";
const props = defineProps({
    book:Object
})

</script>
