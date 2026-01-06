<script setup>
import HomeLayout from './HomeLayout.vue';
import ProductCard from './ProductCard.vue';

defineProps({
    products:Object
})

</script>

<template>
      <HomeLayout>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 justify-center p-10">
          <ProductCard v-for="product in products.data" :key="product.id" :product="product"/>
        </div>
      </HomeLayout>
</template>