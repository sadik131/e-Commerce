<script setup lang="ts">
import Hero from '@/components/aCommon/Hero.vue';
import Navbar from '@/components/aCommon/Navbar.vue';
import ProductSection from '@/components/aCommon/ProductSection.vue';

defineProps({
    products:Object
})

</script>

<template>
    <Navbar />
    <Hero />
    <ProductSection :products="products"/>
</template>