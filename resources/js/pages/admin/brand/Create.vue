<script setup>
import AdminLayout from '@/components/aCommon/AdminLayout.vue';
import TextInput from '@/components/aCommon/TextInput.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    brand: {
        type: Object,
        default: null
    }
})

const form = useForm({
    name: props.brand ? props.brand.name : '',
    slug: props.brand ? props.brand.slug : '',
    status: props.brand ? props.brand.status : "0"
})


const breadcrumbs = [
    { title: 'Brands', href: '/brand' },
    { title: props.brand ? "Edit" : 'Create', href: props.brand ? "/brand/edit" : '/brand/create' },
]

const handleSubmit = () => {
    if (props.brand) {
        form.put(`/brand/${props.brand.id}`)
    } else {
        form.post('/brand')
    }
}

</script>

<template>

    <Head title="Create Brands" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <AdminLayout>
            <template #heading>
                {{ props.brand ? "Edit Brand" : "Create New Brand" }}
            </template>

            <!-- Form Card -->
            <form @submit.prevent="handleSubmit" class="max-w-2xl bg-white rounded-lg shadow p-6">

                <!-- name -->
                <TextInput v-model="form.name" lable="Brand Name" type="text" holder="Enter Brand Name" />

                <!-- Slug -->
                <TextInput v-model="form.slug" lable="Slug" type="text" holder="brand-slug" />

                <!-- Status -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Status
                    </label>
                    <select v-model="form.status"
                        class="w-full rounded-md border px-4 py-2 border-gray-300 focus:border-purple-500 focus:ring-purple-500">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <!-- Actions -->
                <div class="flex gap-3">
                    <button
                        class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                        {{ props.brand ? "Update" : "Save" }}
                    </button>

                    <Link href="/brand"
                        class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md text-sm font-medium">
                        Cancel
                    </Link>
                </div>

            </form>

        </AdminLayout>
    </AppLayout>
</template>
