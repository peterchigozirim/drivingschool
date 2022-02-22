<template>
    <Head title="Home" />

    <page-layout>
        <slider-banner></slider-banner>
        <traning-programs></traning-programs>
        <about-us></about-us>
        <offer></offer>
        <features></features>
        <signs></signs>
        <book-now></book-now>
    </page-layout>

</template>

<script>
import { defineComponent } from 'vue'
import { Head, Link } from '@inertiajs/inertia-vue3';
import PageLayout from '@/Layouts/PageLayout.vue';
import { Splide, SplideSlide } from '@splidejs/vue-splide';
import '@splidejs/splide/dist/css/themes/splide-default.min.css';
import SliderBanner from '../Components/SliderBanner.vue';
import TraningPrograms from '../Components/TraningPrograms.vue';
import AboutUs from '../Components/AboutUs.vue';
import Offer from '../Components/Offer.vue';
import Features from '../Components/Features.vue';
import Signs from '../Components/Signs.vue';
import BookNow from '../Components/BookNow.vue';
export default defineComponent({
    components: {
        Head,
        Link,
        PageLayout,
        Splide, 
        SplideSlide,
        SliderBanner,
        TraningPrograms,
        AboutUs,
        Offer,
        Features,
        Signs,
        BookNow,
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
            }
        }
    }

})
</script>

<style>

</style>