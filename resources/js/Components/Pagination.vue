<template>
    <div class="flex gap-1 mb-2">
        <Link
            v-for="(l,i) in links"
            class="py-2 px-4 border border-red-600 rounded-md"
            :class="{ 'bg-primary text-white' : l.active }"
            :key="i"
            :href="l.url"
            v-html="l.label"
        ></Link>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    links:Array
})
</script>
