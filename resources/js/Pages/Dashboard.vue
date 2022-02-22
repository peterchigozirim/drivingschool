<template>
    <app-layout title="Dashboard">
            <div class=" capitalize p-12 space-y-14">
                <div class="grid grid-cols-3 gap-6">
                    <div class="col-span-1 rounded-lg shadow-lg bg-white border-l-4 border-yellow-500">
                        <div class="flex gap-4 w-11/12 mx-auto h-28  justify-between items-center">
                            <div class="space-y-2">
                                <div class="text-xl font-bold text-yellow-500/60">
                                    <p>total student</p>
                                </div>
                                <div class="text-lg font-semibold">
                                    <p>{{ student }}</p>
                                </div>
                                <div>
                                    <Link :href="route('view.student')">
                                        view all student
                                    </Link>
                                </div>
                            </div>
                            <div class="flex-grow-0 self-center bg-zinc-900 shadow-inner rounded-full p-4 text-yellow-500 text-4xl">
                                <div>
                                    <font-awesome :icon="['fas', 'users']"></font-awesome>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1 rounded-lg shadow-lg bg-white border-l-4 border-green-500">
                        <div class="flex gap-4 w-11/12 mx-auto h-28  justify-between items-center">
                            <div class="space-y-2">
                                <div class="text-xl font-bold text-yellow-500/60">
                                    <p>total admin</p>
                                </div>
                                <div class="text-lg font-semibold">
                                    <p>{{ admin }}</p>
                                </div>
                                <div>
                                    <Link :href="route('view.admin')">
                                        view all admin
                                    </Link>
                                </div>
                            </div>
                            <div class="flex-grow-0 self-center bg-green-900 shadow-inner rounded-full p-4 text-yellow-500 text-4xl">
                                <div>
                                    <font-awesome :icon="['fas', 'user-gear']"></font-awesome>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1 rounded-lg shadow-lg bg-white border-l-4 border-pink-500">
                        <div class="flex gap-4 w-11/12 mx-auto h-28  justify-between items-center">
                            <div class="space-y-2">
                                <div class="text-xl font-bold text-yellow-500/60">
                                    <p>contact request</p>
                                </div>
                                <div class="text-lg font-semibold">
                                    <p>{{ contactCount }}</p>
                                </div>
                                <div>
                                    <p>
                                        view all contact
                                    </p>
                                </div>
                            </div>
                            <div class="flex-grow-0 self-center bg-pink-500/70 shadow-inner rounded-full p-4 text-yellow-100 text-4xl">
                                <div>
                                    <font-awesome :icon="['fas', 'list-check']"></font-awesome>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg py-8">
                    <div class="w-11/12 mx-auto">
                        <div class="mb-6">
                            <p>
                                Recent request
                            </p>
                        </div>
                        <div class="grid grid-cols-5 gap-4 justify-items-center items-center mb-0.5 h-14 bg-yellow-200 border-b-2 border-gray-700 bg-opacity-25">
                            <div>
                                <p>
                                    customer name
                                </p>
                            </div>
                            <div>
                                <p>
                                    customer email
                                </p>
                            </div>
                            <div>
                                <p>
                                    customer phone number
                                </p>
                            </div>
                            <div>
                                <p>
                                    customer message
                                </p>
                            </div>
                            <div>
                                <p>
                                    date
                                </p>
                            </div>
                        </div>

                        <div v-for="(view, i ) in contact" :key="i" class="grid grid-cols-5 gap-4 justify-items-center items-center border-b h-16 ">
                            <div>
                                <p>
                                    {{view.name}}
                                </p>
                            </div>
                            <div>
                                <p>
                                    {{view.email}}
                                </p>
                            </div>
                            <div>
                                <p>
                                    {{view.phone}}
                                </p>
                            </div>
                            <div>
                                <p>
                                    {{view.address}}
                                </p>
                            </div>
                            <div>
                                <p>
                                    {{formatDate(view.created_at)}}
                                </p>
                            </div>
                        </div>

                       
                    </div>
                </div>
            </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Welcome from '@/Jetstream/Welcome.vue'
import AuthLayout from '../Layouts/AuthLayout.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            AppLayout,
            Welcome,
            AuthLayout,
            Head,
            Link,
        },

        props:{
            admin: Number,
            contact: Array,
            contactCount: Number,
            student: Number,
        },

        methods:{
            formatDate(date){
                return moment(date).format('MMM Do YY')
            }
        }
    })
</script>
