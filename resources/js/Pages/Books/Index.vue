<template>

        <!-- Page Heading -->

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Liste des livres</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <Link :href="route('books.create')" class="btn btn-primary mb-3">+ Nouveau livre</Link> &nbsp;
                    <a :href="route('books.trash')" class="btn btn-primary mb-3">Corbeille</a>

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Publication</th>
                            <th scope="col">Details</th>
                            <th scope="col">Modifier</th>
                            <th scope="col">Supprimer</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr v-for="book in books.data" :key="book.id">
                            <th scope="row">{{book.id}}</th>
                            <td>{{book.title}}</td>
                            <td>{{book.description}}</td>
                            <td>
                                <template v-if="book.published === 1">
                                    <span class="badge bg-primary">Publié</span>
                                </template>
                                <template v-else>
                                    <span class="badge bg-secondary">Non publié</span>
                                </template>
                            </td>
                            <td>
                                <Link :href="route('chapters.bookChapters',book.id)" class="btn btn-primary">Details</Link>
                            </td>
                            <td>
                                <Link :href="route('books.edit',book.id)" class="btn btn-warning">Modifier</Link>
                            </td>
                            <td>
                                <Link :href="route('books.delete',book.id)" class="btn btn-danger">Supprimer</Link>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <Pagination class="mt-4" :links="books.links"/>
                </div>
            </div>

        </div>

</template>

<script setup>
import {Link} from "@inertiajs/vue3";
import Pagination from "../../Components/Pagination.vue";
const p = defineProps({
    books:Array
})

</script>
