<template>
    <app-layout title="View student">
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
                                        <p>student name</p>
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

                                <div v-if="contact.length >0">
                                    <div v-for="(view, i ) in contact" :key="i" class="grid md:grid-cols-5 grid-cols-3 gap-2 mb-2 w-full justify-items-center items-center shadow-sm bg-white h-16">
                                        <div class="flex gap-2 h-full items-center">
                                            <div class="rounded overflow-hidden">
                                                <img src="/imgs/fb.png" class="h-8 md:h-12 " alt="">
                                            </div>
                                            <div>
                                                <div>
                                                    <p class="font-bold text-sm capitalize">
                                                        {{ view.name}}
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
                                            <div>
                                                <div @click="viewStudent(view)" class="bg-cyan-50 rounded-full md:rounded-2xl shadow shadow-pink-400 cursor-pointer text-center px-2 py-1">
                                                    <font-awesome :icon="['far', 'eye']" class="md:hidden text-red-400"></font-awesome>
                                                    <p class="hidden md:block">view</p>
                                                </div>
                                            </div>
                                            <div>
                                                <div @click="delstudent(view.id)" class="md:bg-red-400 shadow shadow-pink-400 cursor-pointer rounded-full md:rounded-2xl text-center px-2 py-1">
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
                                                <a class="block" href=""></a>
                                                <a class="md:hidden block" href=""></a>
                                            </div>
                                        </div>
                                        <!-- category -->
                                        <div class="hidden md:block">
                                            <div class="text-gray-700 text-xs md:text-base hover:text-gray-900/50">
                                                <a href=""></a>
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

             <div v-show="closeModal" class="w-full min-h-screen bg-black bg-opacity-20 rounded-xl flex flex-col justify-center items-center fixed z-10 top-0 left-0">
            <div class="bg-white shadow-xl rounded-lg w-96 ">
                <div class="w-11/12 py-4 mx-auto space-y-4">
                    <div class="flex flex-col gap-2">
                        <div class="rounded-lg overflow-hidden text-xl font-bold">
                            <p>contact Us</p>
                        </div>
                         <div>
                             <p class=" capitalize">full name</p>
                        <p class="font-bold capitalize ">{{ viewData.name}}</p>
                         </div>
                    </div>

                    <div>
                        <p class="capitalize">
                            email
                        </p>
                        <p>
                            {{ viewData.email}}
                        </p>
                    </div>
                    <div class="space-y-4 ">
                        <div>
                            <p class="capitalize font-semibold">
                                contact info
                                <hr>
                            </p>
                        </div>
                        <div class="flex gap-3">
                            <p class="capitalize"> phone:</p>
                            <p>{{ viewData.phone }}</p>
                        </div>

                        <div class="flex gap-3">
                            <p class="capitalize"> address:</p>
                            <p>{{ viewData.address }}</p>
                        </div>
                    </div>
                    <div class="space-y-4 ">
                        <div>
                            <p class="capitalize font-semibold">
                                contact info
                                <hr>
                            </p>
                        </div>

                        <div class="flex gap-3">
                            <p class="capitalize"> message:</p>
                            <p>{{ viewData.message }}</p>
                        </div>

                    </div>

                    <div class="flex w-full justify-end items-center">
                        <div @click="closeModal = !closeModal" class="border-2 border-red-500 text-red-500 hover:bg-red-500 hover:text-white font-bold rounded py-1 px-2 capitalize cursor-pointer">
                            <p>
                                close 
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
import { Method } from '@inertiajs/inertia'
import { useToast } from 'vue-toastification'

    export default defineComponent({
        components: {
            AppLayout,
            Welcome,
                AuthLayout,
        },
         setup() {
            // Get toast interface
            const toast = useToast();
            return { toast }
        },
        props:{
            contact: Array,
        },
        data(){
            return{
                closeModal:false,
                viewData: {},
            }
        },
        methods:{
            delstudent(id){
               if (confirm('are sure you want to delete request details!')) {
                    axios.post(route('del.student'), {id:id})
                    .then((res)=>{
                        if (res.data.code == 200) {
                            this.toast.success(res.data.message)
                        }
                        if (res.data.code == 500) {
                            this.toast.error(res.data.message)
                        }
                    })
                    .catch(error => {
                        console.log(error)
                    });
               }
            },
            viewStudent(view){
                if (this.closeModal == false) {
                    this.closeModal = true;
                    this.viewData = view
                }
            }

        }
    })
</script>
