<template>
    <div class="mb-2">
        <a href="#">Accueil</a> / <a href="javascript:history.back()">Livre</a> / <a>{{props.chapter.title}}</a>
    </div>
    <div class="row">
        <div class="">
            <!-- Post content-->
            <hr>
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->
                    <h2 class="fw-bolder mb-1">{{props.chapter.title}}</h2>
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-2">{{props.chapter.created_at}}</div>
                </header>
                <section class="mb-5">
                    <p class="fs-5 mb-4">
                        {{props.chapter.description}}
                    </p>

                </section>
            </article>
        </div>
        <!-- Side widgets-->
    </div>
</template>

<script setup>
import {Link} from "@inertiajs/vue3";
const props = defineProps({
    chapter:Object
})
</script>

<script>
import FrontLayout from '../../../Layouts/Front/FrontLayout.vue'
export default {
    layout:FrontLayout
}

import Book from '../../../Components/Book.vue'
</script>
