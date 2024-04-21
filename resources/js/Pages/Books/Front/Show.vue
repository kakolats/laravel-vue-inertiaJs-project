<template>
    <div class="mb-5">
        <a href="#">Accueil</a>><a>{{ p.book.title }}</a>
    </div>

    <div class="d-flex justify-content-center gap-0">
        <div class="col-sm-4">
            <div class="card" >
                <img height="400px" :src="'http://127.0.0.1:8000/storage/'+p.book.imageLink" class="card-img-top" alt="...">

            </div>
        </div>
        <div class="col-sm-8">
            <div class="card" style="width: 45rem; height: 25rem;">
                <div class="card-body">
                    <h5 class="card-title fw-bold text-dark">{{ p.book.title }}</h5>
                    <p class="card-text">{{p.book.description}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Liste des chapitres</h5>
                    <hr>
                    <div v-for="chapter in p.chapters" style="display: flex; flex-direction: row; justify-content: space-between; align-items: center">
                        <p class="card-text">{{chapter.title}}</p>
                        <Link :href="route('chapters.show',chapter.id)" class="btn btn-primary">Lire</Link>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>


</template>

<script setup>
import {Link} from "@inertiajs/vue3";
import Pagination from "../../../Components/Pagination.vue";
const p = defineProps({
    book:Object,
    chapters:Array
})

</script>

<script>
import FrontLayout from '../../../Layouts/Front/FrontLayout.vue'
export default {
    layout:FrontLayout
}

import Book from '../../../Components/Book.vue'
</script>
