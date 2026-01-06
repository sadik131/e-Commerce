<script setup>

</script>

<template>
    <div class="flex w-full">
        <!-- filter option -->
        <div class="bg-amber-200 h-screen w-1/4">
            <div class="bg-white h-screen p-4 border-r space-y-6">
                <!-- Category -->
                <div>
                    <h3 class="font-semibold mb-2">Category</h3>
                    <div class="space-y-1 text-sm">
                        <label class="flex items-center gap-2">
                            <input type="checkbox" /> Electronics
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" /> Fashion
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" /> Laptop
                        </label>
                    </div>
                </div>

                <!-- Brand -->
                <div>
                    <h3 class="font-semibold mb-2">Brand</h3>
                    <div class="space-y-1 text-sm">
                        <label class="flex items-center gap-2">
                            <input type="checkbox" /> Apple
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" /> Samsung
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" /> Dell
                        </label>
                    </div>
                </div>

                <!-- Price -->
                <div>
                    <h3 class="font-semibold mb-2">Price Range</h3>
                    <input type="range" min="500" max="50000" class="w-full" />
                    <div class="flex justify-between text-xs text-gray-500">
                        <span>৳500</span>
                        <span>৳50k</span>
                    </div>
                </div>

                <!-- Stock -->
                <div>
                    <h3 class="font-semibold mb-2">Availability</h3>
                    <label class="flex items-center gap-2 text-sm">
                        <input type="checkbox" /> In Stock
                    </label>
                </div>

                <!-- Apply Button -->
                <button class="w-full bg-blue-600 text-white py-2 rounded-lg">
                    Apply Filter
                </button>

            </div>

        </div>
        <div class="w-3/4">
            <slot />
        </div>
    </div>
</template>