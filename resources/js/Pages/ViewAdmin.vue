<template>
    <app-layout title="View Admin">
        <div class="py-8">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div>
                        <div class=" space-y-10">
                                <div class="flex">
                                    <div class="rounded-2xl shadow-lg w-60 overflow-hidden bg-white text-lg flex gap-2 h-10 items-center pl-2">
                                        <font-awesome :icon="['fas', 'search']" class=""></font-awesome>
                                        <input type="text" class="w-52 h-full border-0 outline-none bg-transparent placeholder:text-pink-300 placeholder:font-bold placeholder:text-lg" placeholder="Search">
                                    </div>
                                </div>
                            <div class="">
                                <div class="grid md:grid-cols-5 grid-cols-4 gap-2 w-full justify-items-center capitalize items-center rounded-t-xl bg-white shadow-sm h-14">
                                    <div>
                                        <p>Admin name</p>
                                    </div>
                                    <div class="">
                                        <p>email</p>
                                    </div>
                                    <div>
                                        <p>phone no</p>
                                        <p class="md:hidden">date</p>
                                    </div>
                                    <div class="hidden md:block">
                                        <p>address</p>
                                    </div>
                                    <div>
                                        <p>action</p>
                                    </div>
                                </div>

                                <div v-if="admin.length >0">
                                    <div v-for="(view, i ) in admin" :key="i" class="grid md:grid-cols-5 grid-cols-3 gap-2 mb-2 w-full justify-items-center items-center shadow-sm bg-white h-16">
                                        <div class="flex gap-2 h-full items-center">
                                            <div class="rounded overflow-hidden">
                                                <img src="/imgs/fb.png" class="h-8 md:h-12 " alt="">
                                            </div>
                                            <div>
                                                <div>
                                                    <p class="font-bold text-sm capitalize">
                                                        {{ view.name }}
                                                    </p>
                                                </div>
                                                
                                            </div>
                                        </div>

                                        <div class="md:flex -space-x-2 hidden">
                                            <p>
                                                {{ view.email }}
                                            </p>
                                        </div>
                                        <!-- stages -->
                                        <div>
                                            <div class="text-gray-700 text-xs md:text-base  hover:text-gray-900/50">
                                                <p class="block" href="">{{view.phone}}</p>
                                                <p class="md:hidden block" href="">creative_movers.com</p>
                                            </div>
                                        </div>
                                        <!-- category -->
                                        <div class="hidden md:block">
                                            <div class="text-gray-700 text-xs md:text-base hover:text-gray-900/50">
                                                <p href="">{{view.address}}</p>
                                            </div>
                                        </div>
                                        <!-- actions -->
                                        <div class="flex gap-4 capitalize">
                                            <!-- <div>
                                                <div class="bg-cyan-50 rounded-full md:rounded-2xl shadow shadow-pink-400 cursor-pointer text-center px-2 py-1">
                                                    <font-awesome :icon="['far', 'eye']" class="md:hidden text-red-400"></font-awesome>
                                                    <p class="hidden md:block">view</p>
                                                </div>
                                            </div> -->
                                            <div>
                                                <div @click="delAdmin(view.id)" class="md:bg-red-400 shadow shadow-pink-400 cursor-pointer rounded-full md:rounded-2xl text-center px-2 py-1">
                                                    <font-awesome :icon="['far', 'trash-alt']" class="md:hidden text-red-400"></font-awesome>
                                                    <p class="hidden md:block">delete</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                

                                <div v-else>
                                    <div class="grid md:grid-cols-5 grid-cols-3 gap-2 mb-2 w-full justify-items-center items-center shadow-sm bg-white h-16">
                                        <div class="flex gap-2 h-full items-center">
                                            <div class="rounded overflow-hidden">
                                                <img src="/imgs/fb.png" class="h-8 md:h-12 " alt="">
                                            </div>
                                            <div>
                                                <div>
                                                    <p class="font-bold text-sm capitalize">
                                                        no record
                                                    </p>
                                                </div>
                                                
                                            </div>
                                        </div>

                                        <div class="md:flex -space-x-2 hidden">
                                            
                                        </div>
                                        <!-- stages -->
                                        <div>
                                            <div class="text-gray-700 text-xs md:text-base  hover:text-gray-900/50">
                                                <a class="block" href="">creative_movers.com</a>
                                                <a class="md:hidden block" href="">creative_movers.com</a>
                                            </div>
                                        </div>
                                        <!-- category -->
                                        <div class="hidden md:block">
                                            <div class="text-gray-700 text-xs md:text-base hover:text-gray-900/50">
                                                <a href="">creative_movers.com</a>
                                            </div>
                                        </div>
                                        <!-- actions -->
                                        <div class="flex gap-4 capitalize">
                                            <div>
                                                <div class="bg-cyan-50 rounded-full md:rounded-2xl shadow shadow-pink-400 cursor-pointer text-center px-2 py-1">
                                                    <font-awesome :icon="['far', 'eye']" class="md:hidden text-red-400"></font-awesome>
                                                    <p class="hidden md:block">view</p>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="md:bg-red-400 shadow shadow-pink-400 cursor-pointer rounded-full md:rounded-2xl text-center px-2 py-1">
                                                    <font-awesome :icon="['far', 'trash-alt']" class="md:hidden text-red-400"></font-awesome>
                                                    <p class="hidden md:block">delete</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
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
import { Method } from '@inertiajs/inertia'
import axios from 'axios'

import { useToast } from 'vue-toastification'

    export default defineComponent({
        components: {
            AppLayout,
            Welcome,
                AuthLayout,
        },
        props:{
            admin: Array,
        },
        
         setup() {
            // Get toast interface
            const toast = useToast();
            return { toast }
        },
        methods:{
            delAdmin(id){
                if (confirm('are you sure?')) {
                    axios.post(route('del.admin'), {id:id})
                    .then((res)=>{
                        if (res.data.code == 200) {
                            this.toast.success(res.data.message)
                            window.location.reload();
                        }
                        if (res.data.code == 500) {
                            this.toast.error(res.data.message)
                        }
                    })
                }
            }
        }
    })
</script>
