<script setup>
import { computed, ref, watch } from 'vue'
import Navbar from '@/components/aCommon/Navbar.vue'
import { router } from '@inertiajs/vue3'
import { Trash } from 'lucide-vue-next'

const props = defineProps({
  carts: Array
})

const localCarts = ref([])

watch(
  () => props.carts,
  (newVal) => {
    localCarts.value = newVal.map(item => ({ ...item }))
  },
  { immediate: true }
)

const discountedPrice = (product) => {
  return product.price - (product.price * product.discount) / 100
}

const totalQuantity = computed(() => {
  return localCarts.value.reduce((total, item) => {
    return total + item.quantity
  }, 0)
})


const subtotal = computed(() => {
  const total = localCarts.value.reduce((total, item) => {
    return total + discountedPrice(item.product) * item.quantity
  }, 0)

  return Number(total.toFixed(2))
})


const increaseQty = (item) => {
  item.quantity++

  router.put(`/cart/${item.id}`, {
    quantity: item.quantity,
  }, {
    preserveScroll: true,
  })
}

const decreaseQty = (item) => {
  if (item.quantity > 1) {
    item.quantity--

    router.put(`/cart/${item.id}`, {
      quantity: item.quantity,
    }, {
      preserveScroll: true,
    })
  }
}

const removeItem = (item) => {
  localCarts.value = localCarts.value.filter(
    cart => cart.id !== item.id
  )

  router.delete(`/cart/${item.id}`, {
    preserveScroll: true,
  })
}


</script>



<template>
    <Navbar />
    <div class="max-w-7xl mx-auto p-6 grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- LEFT : Cart Items -->
        <div class="lg:col-span-2 space-y-4">
            <h2 class="text-2xl font-semibold">Shopping Cart</h2>

            <div v-for="item in localCarts" :key="item.id" class="flex gap-4 border relative rounded-lg p-4 bg-white">
                <!-- Image -->
                 <button @click="removeItem(item)">
                    <span class="bg-red-300 hover:bg-red-500 hover:text-white absolute right-5 top-4 cursor-pointer text-xs px-2 py-2 rounded-full"><Trash class="h-5 w-5"/></span>
                 </button>
                <img :src="item.product.thumb" class="w-24 h-24 object-cover rounded" />
                <!-- Details -->
                <div class="flex-1">
                    <h3 class="font-medium text-lg">{{ item.product.name }}</h3>

                    <p class="text-sm text-gray-500 line-clamp-2">
                        {{ item.product.description }}
                    </p>

                    <div class="mt-2 flex items-center gap-4">
                        <span class="font-semibold text-gray-900">
                            ৳ {{ discountedPrice(item.product) }}
                        </span>

                        <span class="text-sm text-gray-400 line-through">
                            ৳ {{ item.product.price }}
                        </span>

                        <!-- Quantity Controller -->
                        <div class="flex items-center gap-2">
                            <button @click="decreaseQty(item)" class="w-8 h-8 border rounded hover:bg-gray-100">
                                −
                            </button>

                            <span class="w-6 text-center">
                                {{ item.quantity }}
                            </span>

                            <button @click="increaseQty(item)" class="w-8 h-8 border rounded hover:bg-gray-100">
                                +
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- RIGHT : Order Summary -->
        <div class="border rounded-lg p-6 bg-white h-fit">
            <h2 class="text-xl font-semibold mb-4">Order Summary</h2>
    
            <div class="flex justify-between text-sm mb-2">
                <span>Subtotal</span>
                <span>৳ {{ subtotal }}</span>
            </div>
    
            <div class="flex justify-between text-sm mb-2">
                <span>Delivery</span>
                <span>৳ 10</span>
            </div>
            <div class="flex justify-between text-sm mb-2">
                <span>Quantity</span>
                <span>{{ totalQuantity }}</span>
            </div>
    
            <hr class="my-3" />
    
            <div class="flex justify-between font-semibold text-lg">
                <span>Total</span>
                <span>৳ {{ subtotal + 10 }}</span>
            </div>
    
            <button class="mt-5 w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg">
                Proceed to Checkout
            </button>
        </div>
    </div>


</template>
