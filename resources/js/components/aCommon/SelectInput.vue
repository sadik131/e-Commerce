<script setup>
defineProps({
    label: String,
    options: {
        type: Array,
        required: true
    }
})
</script>

<template>
    <div class="mb-6">
        <label class="block text-sm font-medium text-gray-700 mb-1">
            {{ label }}
        </label>

        <select
            class="w-full rounded-md border px-4 py-2 border-gray-300 focus:border-purple-500 focus:ring-purple-500"
        >
            <option
                v-for="option in options"
                :key="option.value"
                :value="option.value"
            >
                {{ option.label }}
            </option>
        </select>
    </div>
</template>
