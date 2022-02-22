<template>
    <div class="w-11/12 mx-auto">
        <div class="mt-5 capitalize">
            <div class="mb-5">
               <!-- Navigation Links -->
                <div class="hidden space-x-8   h-12 sm:ml-10 sm:flex">
                    <jet-nav-link class="text-xl font-bold" :href="route('dashboard')" :active="route().current('dashboard')">
                        AA driving school
                    </jet-nav-link>
                </div>
            </div>
            <div class="mb-5 mt-20">
                <Link :href="route('dashboard')" class="bg-yellow-500 bg-opacity-25 h-10 flex items-center gap-4 px-6">
                    <font-awesome :icon="['fas', 'house']"></font-awesome>
                    Dashboard
                </Link>
            </div>
            <div class="mb-5">
                <Link :href="route('add.admin')" class="bg-yellow-500 bg-opacity-25 h-10 flex items-center gap-4  px-6">
                    <font-awesome :icon="['fas', 'user-plus']"></font-awesome>
                    add admin
                </Link>
            </div>
            <div class="mb-5">
                <Link :href="route('view.admin')" class="bg-yellow-500 bg-opacity-25 h-10 flex items-center gap-4  px-6">
                    <font-awesome :icon="['fas', 'user-gear']"></font-awesome>
                    view admin
                </Link>
            </div>
            <div class="mb-5">
                <Link :href="route('add.student')" class="bg-yellow-500 bg-opacity-25 h-10 flex items-center gap-4  px-6">
                    <font-awesome :icon="['fas', 'user-plus']"></font-awesome>
                     register student
                </Link>
            </div>
            <div class="mb-5">
                <Link :href="route('view.student')" class="bg-yellow-500 bg-opacity-25 h-10 flex items-center gap-4  px-6">
                    <font-awesome :icon="['fas', 'user-gear']"></font-awesome>
                     view student
                </Link>
            </div>
            <div class="mb-5">
                <Link :href="route('contact')" class="bg-yellow-500 bg-opacity-25 h-10 flex items-center gap-4  px-6">
                <font-awesome :icon="['fas', 'gear']"></font-awesome>
                    contact request
                </Link>
            </div>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetNavLink from '@/Jetstream/NavLink.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';
    export default defineComponent({
        components:{
            Link,
            JetNavLink,
        }
    })
</script>

<style>

</style>