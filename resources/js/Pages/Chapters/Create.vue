<template>
    <form @submit.prevent="save" class="row col-sm-6 m-auto" method="post">
        <h1 class="text-center">Ajout de chapitre au livre</h1>
        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="text" id="form2Example1" class="form-control" name="title" v-model="form.title" />
            <label class="form-label" for="form2Example1">Titre</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <textarea  id="form2Example2" class="form-control" name="description" v-model="form.description"></textarea>
            <label class="form-label" for="form2Example2">Description</label>
        </div>

        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" v-model="form.published" name="published">
            <label class="form-check-label" for="exampleCheck1">Publié</label>
        </div>

        <!-- 2 column grid layout for inline styling -->

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Ajouter</button>

    </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    book:Object
})

const form = useForm({
    title: null,
    description: null,
    published: null
})

const save = () => {
    form.post(`/chapters/create/${props.book.id}`);
}

</script>
