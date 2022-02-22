<template>
    <div class="relative">
        <nav-bar></nav-bar>
        <slot></slot>
    </div>
</template>

<script>
import { defineComponent } from 'vue'
import { Head, Link } from '@inertiajs/inertia-vue3';
import NavBar from '@/Components/NavBar.vue';
export default defineComponent({
    components: {
        Head,
        Link,
        NavBar,
    },

})
</script>

<style>

</style>