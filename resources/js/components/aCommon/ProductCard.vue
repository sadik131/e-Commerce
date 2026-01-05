<script setup>
// Dummy product data (later DB theke asbe)
const product = {
  name: 'Wireless Headphone',
  price: 3500,
  discount: 10,
  quantity: 20,
  description: 'High quality wireless headphone with noise cancellation.',
  status: true,
  thumb: 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e'
}
</script>

<template>
  <div
    class="w-full bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition"
  >
    <!-- Product Image -->
    <div class="w-full bg-gray-100 flex items-center justify-center">
      <img
        :src="product.thumb"
        :alt="product.name"
        class="h-full object-cover"
      />
    </div>

    <!-- Product Info -->
    <div class="p-4">
      <h3 class="text-lg font-semibold text-gray-800">
        {{ product.name }}
      </h3>

      <p class="text-sm text-gray-500 mt-1 line-clamp-2">
        {{ product.description }}
      </p>

      <!-- Price -->
      <div class="mt-3 flex items-center gap-2">
        <span class="text-xl font-bold text-gray-900">
          ৳ {{ product.price - (product.price * product.discount) / 100 }}
        </span>

        <span
          v-if="product.discount"
          class="text-sm line-through text-gray-400"
        >
          ৳ {{ product.price }}
        </span>
      </div>

      <!-- Stock -->
      <p class="text-xs mt-1 text-green-600" v-if="product.quantity > 0">
        In Stock
      </p>
      <p class="text-xs mt-1 text-red-500" v-else>
        Out of Stock
      </p>

      <!-- Actions -->
      <div class="mt-4 flex gap-2">
        <button
          class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg text-sm"
        >
          Add to Cart
        </button>

        <button
          class="px-3 border rounded-lg hover:bg-gray-100"
        >
          ❤️
        </button>
      </div>
    </div>
  </div>
</template>
