<script setup>
import { Link, router } from '@inertiajs/vue3';

defineProps({
  product: Object
})

const addToCart = (product) => {
  router.post('/cart', {
    product_id: product.id,
    quantity: 1,
  }
  )
}


</script>

<template>
  <div class="w-full bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition">
    <!-- Product Image -->
    <div class="w-full bg-gray-100 flex items-center justify-center">
      <img :src="product.thumb" :alt="product.name"
        class="h-56 object-cover" />
    </div>

    <!-- Product Info -->
    <div class="p-4">
      <h3 class="text-lg font-semibold text-gray-800">
        {{ product.name }}  id: {{ product.id }}
      </h3>

      <p class="text-sm text-gray-500 mt-1 line-clamp-2">
        {{ product.description }}
      </p>

      <!-- Price -->
      <div class="mt-3 flex items-center gap-2">
        <span class="text-xl font-bold text-gray-900">
          $ {{ product.price - (product.price * product.discount) / 100 }}
        </span>

        <span v-if="product.discount" class="text-sm line-through text-gray-400">
          $ {{ product.price }}
        </span>
      </div>

      <!-- Stock -->
      <p class="text-xs mt-1 text-green-600" v-if="product.quantity > 0">
        In Stock
      </p>
      <p class="text-xs mt-1 text-red-500" v-else>
        Out of Stock
      </p>

      <!-- brand -->
      <div class="flex justify-between">
        <span class="text-sm text-gray-800 mt-1 line-clamp-2">
          Brand: {{ product.brand.name }}
        </span>
        <span class="text-sm text-gray-800 mt-1 line-clamp-2">
          {{ product.categorie.name }}
        </span>
      </div>

      <!-- Actions -->
      <div class="mt-4 flex gap-2">
        <button @click="addToCart(product)" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg text-sm">
          Add to Cart
        </button>

        <button class="px-3 border rounded-lg hover:bg-gray-100">
          ❤️
        </button>
      </div>
    </div>
  </div>
</template>
