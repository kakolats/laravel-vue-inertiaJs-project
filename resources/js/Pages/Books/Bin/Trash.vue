<template>

    <!-- Page Heading -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Corbeille</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <Link :href="route('books.force-delete-all')" class="btn btn-primary mb-3">Vider la corbeille</Link> &nbsp;

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Restaurer</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr v-for="book in books.data" :key="book.id">
                        <th scope="row">{{book.id}}</th>
                        <td>{{book.title}}</td>
                        <td>
                            <Link :href="route('books.restore',book.id)" class="btn btn-warning">Restaurer</Link>
                        </td>
                        <td>
                            <Link :href="route('books.force-delete',book.id)" class="btn btn-danger">Supprimer</Link>
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
import Pagination from "../../../Components/Pagination.vue";
const p = defineProps({
    books:Array
})

</script>
