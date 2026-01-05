<script setup lang="ts">
import HomeLayout from './HomeLayout.vue';
import ProductCard from './ProductCard.vue';

</script>

<template>
      <HomeLayout>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 justify-center p-10">
          <ProductCard />
          <ProductCard />
          <ProductCard />
        </div>
      </HomeLayout>
</template>