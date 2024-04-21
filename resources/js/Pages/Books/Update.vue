<template>
    <form @submit.prevent="update" class="row col-sm-6 m-auto" method="post" action="#" enctype="multipart/form-data">
        <h1 class="text-center">Modification de livre</h1>
        <!-- Email input -->
        <div class="form">
            <input type="text" id="form2Example1" class="form-control" name="title" v-model="form.title" />
            <label class="form-label" for="form2Example1">Titre</label>
            <div v-if="form.errors.title" class="alert alert-danger">{{form.errors.title}}</div>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <textarea  id="form2Example2" class="form-control" name="description" v-model="form.description"></textarea>
            <label class="form-label" for="form2Example2">Description</label>
            <div v-if="form.errors.description" class="alert alert-danger">{{form.errors.description}}</div>
        </div>

        <div class="form-outline mb-4">
            <input type="file" id="form2Example1" class="form-control" name="file" @input="form.file = $event.target.files[0]" />
            <div v-if="form.errors.file" class="alert alert-danger">{{form.errors.file}}</div>
        </div>

        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="published" v-model="form.published">
            <label class="form-check-label" for="exampleCheck1">Publié</label>
        </div>

        <!-- 2 column grid layout for inline styling -->

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Mettre à jour</button>

    </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    book:Object
})

const form = useForm({
    title: props.book.title,
    description: props.book.description,
    file: null,
    published: props.book.published==1?'true':'false'
})

const update = () => {
    form.post(`/books/${props.book.id}/update/`);
}

</script>
