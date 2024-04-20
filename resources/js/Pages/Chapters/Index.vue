<template>

    <!-- Page Heading -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Liste des chapitres du livre {{book.title}} </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <Link :href="route('chapters.create',book.id)" class="btn btn-primary mb-3">+ Nouveau chapitre</Link> &nbsp;
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Description</th>
                        <th scope="col">Publication</th>
                        <th scope="col">Details</th>
                        <th scope="col">Modifier</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr v-for="chapter in chapters.data" :key="chapter.id">
                        <th scope="row">{{chapter.id}}</th>
                        <td>{{chapter.title}}</td>
                        <td>{{chapter.description}}</td>
                        <td>
                            <template v-if="chapter.published === 1">
                                <span class="badge bg-primary">Publié</span>
                            </template>
                            <template v-else>
                                <span class="badge bg-secondary">Non publié</span>
                            </template>
                        </td>
                        <td>
                            <Link :href="route('chapters.edit',chapter.id)" class="btn btn-primary">Details</Link>
                        </td>
                        <td>
                            <Link :href="route('chapters.edit',chapter.id)" class="btn btn-warning">Modifier</Link>
                        </td>
                        <td>
                            <Link :href="route('chapters.delete',chapter.id)" class="btn btn-danger">Supprimer</Link>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <Pagination class="mt-4" :links="chapters.links"/>
            </div>
        </div>

    </div>

</template>

<script setup>
import {Link} from "@inertiajs/vue3";
import Pagination from "../../Components/Pagination.vue";
const p = defineProps({
    chapters:Array,
    book:Object
})

</script>
