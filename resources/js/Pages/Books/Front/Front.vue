<template>

    <div class="row gap-0 mt-5">
        <div v-for="b in books.data" :key="b.id" class="col">
            <Book :book="b"></Book>
        </div>
        <Pagination class="mt-0 mb-5" :links="books.links"/>
    </div>

</template>

<script setup>
import {Link} from "@inertiajs/vue3";
import Book from "../../../Components/Book.vue";
const p = defineProps({
    books:Array,
})

</script>

<script>
import FrontLayout from '../../../Layouts/Front/FrontLayout.vue'
export default {
    layout:FrontLayout
}
import Pagination from '../../../Components/Pagination.vue'
import Book from '../../../Components/Book.vue'
</script>
