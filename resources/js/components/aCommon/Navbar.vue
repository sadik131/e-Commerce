<script setup>
import { usePage } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3';
import { computed, ref } from 'vue'

const page = usePage()

const cartCount = computed(() => {
  return page.props.cart.count
})

const isOpen = ref(false)


</script>

<template>
  <nav class="bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-4">
      <div class="flex h-16 items-center justify-between gap-4">

        <!-- Logo -->
        <div class="text-xl font-bold">
          Shop<span class="text-blue-500">Mart</span>
        </div>

        <!-- Desktop Menu -->
        <div class="hidden md:flex items-center space-x-6">
          <a href="/" class="hover:text-blue-400">Home</a>
          <a href="/products" class="hover:text-blue-400">Shop</a>

          <!-- Cart -->
          <a href="/cart" class="relative">
            🛒
            <span
              class="absolute -top-2 -right-2 bg-red-500 text-xs px-1.5 rounded-full"
            >
              {{ cartCount }}
            </span>
          </a>
          <Link href="/dashboard" class="block px-2 py-2">
        Dashboard
      </Link>

          <!-- Auth -->
          <a href="/login" class="hover:text-blue-400">Login</a>
        </div>

        <!-- Mobile Button -->
        <button
          @click="isOpen = !isOpen"
          class="md:hidden text-2xl focus:outline-none"
        >
          ☰
        </button>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div v-if="isOpen" class="md:hidden bg-gray-800 px-4 pb-4 space-y-2">

      <!-- Search (Mobile) -->
      <div class="flex mt-2">
        <input
          type="text"
          placeholder="Search products..."
          class="w-full px-3 py-2 rounded-l-md text-black focus:outline-none"
        />
        <button class="bg-blue-600 px-3 rounded-r-md">
          🔍
        </button>
      </div>

      <a href="/" class="block px-2 py-2 hover:bg-gray-700 rounded">Home</a>
      <a href="/products" class="block px-2 py-2 hover:bg-gray-700 rounded">Shop</a>
      <Link href="/cart" class="block px-2 py-2 hover:bg-gray-700 rounded">
        Cart ({{ cartCount }})
      </Link>
      <Link href="/dashbord" class="block px-2 py-2 hover:bg-gray-700 rounded">
        Dashbord
      </Link>
      <a href="/login" class="block px-2 py-2 hover:bg-gray-700 rounded">
        Login
      </a>
    </div>
  </nav>
</template>
