<template>
           <div>
            <section class="bg-gray-100 relative">
                <div class="max-w-7xl mx-auto space-y-4 pb-20">
                    <div class="flex flex-col justify-center space-y-4 items-center h-44">
                        <div class="font-bold text-2xl">
                            <p class="uppercase">
                                How many road signs can you interpret?
                            </p>
                        </div>
                        <hr class="border-2 border-yellow-500 w-16">
                        <div>
                            <p>
                                Knowing the various road signs is vital to effective and accident free driving.
                            </p>
                        </div>
                    </div>

                    <div class="">
                        <div class=" mx-auto">
                            <Splide :options="options1">
                                <SplideSlide class="" >
                                    <img src="/images/client_logo-1.png" alt="">
                                </SplideSlide>
                                <SplideSlide class="" >
                                    <img src="/images/client_logo-2.png" alt="">
                                </SplideSlide>
                                <SplideSlide class="" >
                                    <img src="/images/client_logo-3.png" alt="">
                                </SplideSlide>
                                <SplideSlide class="" >
                                    <img src="/images/client_logo-4.png" alt="">
                                </SplideSlide>
                            </Splide>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4 mt-20">
                            <div>
                                <p class="capitalize font-bold text-xl">
                                    We Are Available on all social medial plattform
                                </p>
                            </div>
                            <div>
                                <div>
                                    <p class="font-bold text-xl">
                                        Leave a message
                                    </p>
                                    <p>
                                        For enquiry, suggestion or complain, send us a message
                                    </p>
                                </div>
                                <div>
                                    <form @submit.prevent="contactUs()">
                                        <div class="flex gap-4 my-5">
                                            <div class="">
                                                <label for="email">Full Name</label>
                                                <input type="text" v-model="name" required placeholder="Full Name" class="block placeholder:capitalize placeholder:text-gray-700/70 border-2 border-opacity-10 rounded">
                                            </div>

                                            <div class="">
                                                <label for="email">Email Address</label>
                                                <input type="email" v-model="email" required placeholder="email address" class="block placeholder:capitalize placeholder:text-gray-700/70 border-2 border-opacity-10 rounded">
                                            </div>
                                        </div>
                                        <div class="flex gap-4">
                                            <div class="my-5">
                                                <label for="email">Phone Number</label>
                                                <input type="text" v-model="phone" required placeholder="phone number" class="block placeholder:capitalize placeholder:text-gray-700/70 border-2 border-opacity-10 rounded">
                                            </div>
                                            <div class="my-5">
                                                <label for="address">Address</label>
                                                <input type="text" v-model="address" required placeholder="address" class="block placeholder:capitalize placeholder:text-gray-700/70 border-2 border-opacity-10 rounded">
                                            </div>
                                        </div>
                                        <div class="my-5">
                                            <label for="email">Message</label>
                                            <textarea name="" v-model="message" required id="" cols="20" rows="10" placeholder="message" class="w-9/12 block placeholder:capitalize placeholder:text-gray-700/70 border-2 border-opacity-10 rounded"></textarea>
                                        </div>

                                        <div class="my-5">
                                            <button type="submit" class="bg-yellow-500 rounded hover:shadow-2xl hover:shadow-orange-700 p-2 h-10 font-bold">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
         
</template>

<script>
import { Splide, SplideSlide } from '@splidejs/vue-splide';
import { useToast } from 'vue-toastification'
import axios from 'axios';
export default {
    components:{
        Splide, 
        SplideSlide,
    },
     setup() {
            // Get toast interface
            const toast = useToast();
            return { toast }
        },

    data(){
        return{
            options1:{
                type    : 'loop',
                autoplay: true,
                perPage: 4,
                perMove: 1,
                focus  : 'center',
                rewind : true,
                pagination: false,
                arrows:false,
                padding: '20px',
            },
            name: '',
            email: '',
            phone: '',
            address: '',
            message: '',
        }
    },
    methods:{
        contactUs(){
            let data = new FormData();
            data.append('name', this.name);
            data.append('email', this.email);
            data.append('phone', this.phone);
            data.append('address', this.address);
            data.append('message', this.message);
            axios.post( route('contact.us'), data)
            .then( (res)=> {
                if (res.data.code == 200) {
                    this.toast.success(res.data.message)
                    this.name = ''
                    this.email = ''
                    this.address = ''
                    this.phone = ''
                    this.message = ''
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
}
</script>

<style>

</style>