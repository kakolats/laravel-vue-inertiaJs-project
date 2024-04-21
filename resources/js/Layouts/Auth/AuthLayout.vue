<template>
    <body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <slot></slot>

    </div>
    </body>
</template>

<script setup>
import { onMounted } from 'vue';
onMounted(() => {
    // Execute your JavaScript code when the component is mounted
    import('../Admin/vendor/jquery/jquery.min.js').then(() => {
        // jQuery is loaded
    });

    import('../Admin/vendor/bootstrap/js/bootstrap.bundle.min.js').then(() => {
        // Bootstrap JS is loaded
    });

    import('../Admin/vendor/jquery-easing/jquery.easing.min.js').then(() => {
        // jQuery easing is loaded
    });

    import('../Admin/js/sb-admin-2.min.js').then(() => {
        // Your custom JS file is loaded
    });
});
</script>
