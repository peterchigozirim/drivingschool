<template>
    <div>
        <section class="bg-white relative">
            <div class="max-w-7xl mx-auto space-y-4 pb-20">
                <div class="flex flex-col justify-center space-y-4 items-center h-44">
                    <div class="font-bold text-xl">
                        <p>
                            ABOUT US
                        </p>
                    </div>
                    <hr class="border-2 border-yellow-500 w-16">
                    <div>
                        <p>
                            We are the leading driving training school with modern training facilities and highly dedicated staff. 
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-8">
                        <div>
                            <p class="text-3xl">WHO WE ARE</p>
                            <hr class="border-2 border-yellow-500 w-16">
                        </div>
                        <div class="space-y-20">
                            <div>
                                <p class="text-justify">
                                    AA Driving School is a government approved driving school in Nigeria. We make driving easy through the use of modern training facilities and experienced staff and our curriculum is based on international standards
                                </p>
                            </div>
                            <div>
                                <p>
                                    At AA driving school, we strive for optimal service delivery, matching performance with customer satisfaction. Our training programs are well structured to meet your needs. With modern driving simulation gadgets and vehicles, we make your training worthwhile. 
                                </p>
                            </div>
                        </div>
                        <div>
                            <Link href="" class="uppercase font-bold text-xl bg-yellow-500 p-4 rounded shadow hover:shadow-2xl">
                                contact us
                            </Link>
                        </div>
                    </div>

                    <div>
                        <img src="/images/about_client.jpg" class="w-full h-96" alt="hi">
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
export default {
    components:{
        Link,
    }
}
</script>

<style>

</style>