<script setup>
import Navbar from '@/components/aCommon/Navbar.vue'

defineProps({
    carts:Array
})

const cartItems = [
    {
        id: 1,
        name: 'Wireless Headphone',
        price: 3500,
        discount: 10,
        quantity: 2,
        description: 'High quality wireless headphone with noise cancellation.',
        thumb: 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e',
    },
    {
        id: 2,
        name: 'Smart Watch',
        price: 5000,
        discount: 5,
        quantity: 1,
        description: 'Stylish smart watch with health tracking features.',
        thumb: 'https://images.unsplash.com/photo-1523275335684-37898b6baf30',
    },
]

const discountedPrice = (item) => {
    return item.price - (item.price * item.discount) / 100
}


const subtotal = cartItems.reduce((total, item) => {
    return total + discountedPrice(item) * item.quantity
}, 0)
</script>


<template>
    <Navbar />

    <div class="max-w-7xl mx-auto p-6 grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- LEFT : Cart Items -->
        <div class="lg:col-span-2 space-y-4">
            <h2 class="text-2xl font-semibold">Shopping Cart</h2>

            <div v-for="item in cartItems" :key="item.id" class="flex gap-4 border rounded-lg p-4 bg-white">
                <!-- Image -->
                <img :src="item.thumb" class="w-24 h-24 object-cover rounded" />

                <!-- Details -->
                <div class="flex-1">
                    <h3 class="font-medium text-lg">{{ item.name }}</h3>

                    <p class="text-sm text-gray-500 line-clamp-2">
                        {{ item.description }}
                    </p>

                    <div class="mt-2 flex items-center gap-4">
                        <span class="font-semibold text-gray-900">
                            ৳ {{ discountedPrice(item) }}
                        </span>

                        <span class="text-sm text-gray-400 line-through">
                            ৳ {{ item.price }}
                        </span>

                        <!-- Quantity Controller -->
                        <div class="flex items-center gap-2">
                            <button class="w-8 h-8 border rounded hover:bg-gray-100">
                                −
                            </button>

                            <span class="w-6 text-center">
                                {{ item.quantity }}
                            </span>

                            <button class="w-8 h-8 border rounded hover:bg-gray-100">
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
                <span>৳ 100</span>
            </div>
    
            <hr class="my-3" />
    
            <div class="flex justify-between font-semibold text-lg">
                <span>Total</span>
                <span>৳ {{ subtotal + 100 }}</span>
            </div>
    
            <button class="mt-5 w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg">
                Proceed to Checkout
            </button>
        </div>
    </div>


</template>
