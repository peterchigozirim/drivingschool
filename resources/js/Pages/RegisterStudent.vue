<template>
    <app-layout title="Dashboard">
        <div class="grid grid-cols-3  py-16">
            <div class="col-span-2">
                <div class="w-11/12 mx-auto p-8  rounded bg-white space-y-6">
                    <div class="capitalize text-2xl font-bold">
                        <p>
                            register student
                        </p>
                    </div>

                    <div class="py-4">
                        <form @submit.prevent="studentForm()">
                            <div class="capitalize">
                                <div class="flex w-full gap-8">
                                    <div>
                                        <label for="fname"> First name</label>
                                        <input type="text" v-model="firstname" required placeholder="First name" class="rounded block border-opacity-25">
                                    </div>

                                    <div class="">
                                        <label for="fname"> Last name</label>
                                        <input type="text" v-model="lastname" required placeholder="Last name" class="rounded block border-opacity-25">
                                    </div>
                                </div>

                                <div class="flex gap-8 my-5">
                                    <div class="">
                                        <label for="fname"> Email address</label>
                                        <input type="email" v-model="email" required placeholder="Emaill Address" class=" rounded block border-opacity-25">
                                    </div>

                                    <div class="">
                                        <label for="fname"> Phone Number</label>
                                        <input type="tel" v-model="phone" required placeholder="Phone Number" class="rounded block border-opacity-25">
                                    </div>
                                </div>

                                <div class="my-5">
                                    <label for="fname"> Address</label>
                                    <input type="text" v-model="address" required placeholder="Address" class="w-8/12 rounded block border-opacity-25">
                                </div>

                               <div class="flex gap-8 my-5">
                                    <div class="">
                                        <label for="fname"> City</label>
                                        <input type="text" v-model="city" required placeholder="City" class="rounded block border-opacity-25">
                                    </div>

                                    <div class="">
                                        <label for="fname"> State</label>
                                        <input type="text" v-model="state" required placeholder="State" class="rounded block border-opacity-25">
                                    </div>
                               </div>
                                <div class="my-5">
                                    <label for="fname"> country</label>
                                    <input type="text" v-model="country" required placeholder="country" class="rounded block border-opacity-25">
                                </div>

                                <div class="flex gap-2 my-5">
                                    <div class="">
                                        <label for="fname"> picture</label>
                                        <input type="file" @input="picture = $event.target.files[0]" required placeholder="" class="rounded block border-opacity-25">
                                    </div>
                                    <div class="">
                                        <label for="fname"> date of birth</label>
                                        <input type="date" v-model="dateBirth" required placeholder="" class="rounded block border-opacity-25">
                                    </div>
                                </div>

                                <div class="flex gap-8 my-5">
                                    <div class="">
                                        <label for="fname"> amount</label>
                                        <input type="text" v-model="amount" required placeholder="" class="rounded block border-opacity-25">
                                    </div>
                                    <div class="">
                                        <label for="fname">traning Duration</label>
                                        <select v-model="days" id="" class="rounded block border-opacity-25 w-full">
                                            <option selected value="10 Days">10 Days</option>
                                            <option value="15 Days">15 Days</option>
                                            <option value="20 Days">20 Days</option>
                                            <option value="5 weekends">5 weekends</option>
                                            <option value="8 weekends">8 weekends</option>
                                            <option value="10 weekends">10 weekends</option>
                                            <option value="20 weekends">20 weekends</option>
                                        </select>
                                    </div>
                                </div>

                               <div>
                                   <button type="submit" class="w-40 h-10 rounded shadow hover:shadow-2xl bg-yellow-500 font-bold capitalize">
                                       submit
                                   </button>
                               </div>
                            </div>
                        </form>
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
import { useToast } from 'vue-toastification'
import AuthLayout from '../Layouts/AuthLayout.vue'
import axios from 'axios'

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

        data(){
            return{
                firstname: '',
                lastname: '',
                email: '',
                phone: '',
                address: '',
                city: '',
                state: '',
                country: '',
                picture: '',
                dateBirth: '',
                amount: '',
                days: '',
            }
        },

        methods:{
            studentForm(){
                 const config = { headers: { 'content-type': 'multipart/form-data' }}
                let data = new FormData();
                data.append('fname', this.firstname);
                data.append('lname', this.lastname);
                data.append('email', this.email);
                data.append('phone', this.phone);
                data.append('address', this.address);
                data.append('city', this.city);
                data.append('state', this.state);
                data.append('country', this.country);
                data.append('dbirth', this.dateBirth);
                data.append('picture', this.picture);
                data.append('amount', this.amounr);
                data.append('days', this.days);

                axios.post(route('reg.student'),data, config)
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
        }
    })
</script>
