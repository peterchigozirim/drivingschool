<template>
    <div class="max-w-full">
        <div class="w-52 fixed top-[4.5rem] left-0 bg-white min-h-[91vh]">
            <side-navbar></side-navbar>
        </div>
        <div class=" max-w-6xl ml-auto py-12">
            <slot></slot>
        </div>
    </div>
</template>

<script>
import SideNavbar from '../Components/SideNavbar.vue'
export default {
    components:{
        SideNavbar,
        
    }

}
</script>

<style>

</style>