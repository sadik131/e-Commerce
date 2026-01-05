<script setup>
    const model = defineModel()
    
defineProps({
    lable:String,
    type:String,
    holder:String,
})
</script>

<template>
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700  mb-1">
            {{ lable }}
        </label>
        <input v-model="model" :type="type" :placeholder="holder"
            class="w-full rounded-md border px-4 py-2 border-gray-300 focus:border-purple-500 focus:ring-purple-500" />
    </div>
</template>