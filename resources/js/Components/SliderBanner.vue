<template>
    <div>
        <Splide :options="options">
            <SplideSlide class="" >
                <div class="min-h-[95vh] bg-cover bg-center flex justify-center items-center text-center text-2xl w-full rounded overflow-hidden" style="background-image: url('/images/slider-1.jpg')">
                    <div class="space-y-8 capitalize font-bold text-white">
                        <div>
                            <p class="text-yellow-500">Welcome to</p>

                        </div>
                        <div>
                            <p>AA DRIVING SCHOOL</p>
                        </div>
                        <div>
                            <p>
                                We offer 2 weeks, 3 weeks and 1 Month <br>regular training programs as well as weekends trainings
                            </p>
                        </div>
                    </div>
                </div>
            </SplideSlide>
            <SplideSlide class="" >
                <div class="min-h-[95vh] bg-cover bg-center flex justify-center items-center text-center text-2xl w-full rounded overflow-hidden" style="background-image: url('/images/slider-2.jpg')">
                     <div class="space-y-8 capitalize font-bold text-white">
                        <div>
                            <p class="text-yellow-500">AA Driving School</p>
                        </div>
                        <div>
                            <p>DRIVING MADE EASY</p>
                        </div>
                        <div>
                            <p>
                                With the right facilities, people and mindset in the right place, learning to drive can be fun
                            </p>
                        </div>
                    </div>
                </div>
            </SplideSlide>
        </Splide>
    </div>
</template>

<script>
import { defineComponent } from 'vue'
import { Splide, SplideSlide } from '@splidejs/vue-splide';
import '@splidejs/splide/dist/css/themes/splide-default.min.css';
export default defineComponent({
    components: {
        Splide, 
        SplideSlide,
    },
    data(){
        return{
            options:{
                type    : 'loop',
                autoplay: true,
            }
        }
    }

})
</script>

<style>

</style>