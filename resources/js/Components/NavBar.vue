<template>
    <div class=" w-full bg-yellow-500 sticky top-0 z-30">
        <div class="h-16 flex items-center mx-auto max-w-7xl  font-bold">
            <div class="flex-grow">
                <a :href="route('/')">AA DRIVING SCHOOL</a>
            </div>
            <div class="flex h-full items-center">
                <ul class="flex h-full gap-4 items-center capitalize">
                    <li>
                        <a :href="route('/')">Home</a>
                    </li>
                    <li>
                        <a :href="route('/')">about Us</a>
                    </li>
                    <li>
                        <a :href="route('/')">contact us</a>
                    </li>
                    <li>
                        <a :href="route('/')">gallery</a>
                    </li>
                    <li>
                        <Link :href="route('login')">
                            Log in
                        </Link>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
import { defineComponent } from 'vue'
import { Head, Link } from '@inertiajs/inertia-vue3';
export default defineComponent({
    components: {
        Head,
        Link,
    },

})
</script>

<style>

</style>