<template>
    <form @submit.prevent="save" class="row col-sm-6 m-auto">
        <h1 class="text-center">Modification de chapitre</h1>
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
        <button type="submit" class="btn btn-primary btn-block mb-4">Mettre à jour</button>

    </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    chapter:Object
})

const form = useForm({
    title: props.chapter.title,
    description: props.chapter.description,
    published: props.chapter.published==1?'true':'false'
})

const save = () => {
    form.post(`/chapters/${props.chapter.id}/update`);
}

</script>
