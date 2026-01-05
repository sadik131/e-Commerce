<script setup>
import AdminLayout from '@/components/aCommon/AdminLayout.vue';
import TextInput from '@/components/aCommon/TextInput.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    product: {
        type: Object,
        default: null
    },
    categorys: Array,
    brands: Array,
})

const form = useForm({
    name: props.product ? props.product.name : '',
    price: props.product ? props.product.price : 0,
    discount: props.product ? props.product.discount : 0,
    quantity: props.product ? props.product.quantity : 0,
    description: props.product ? props.product.description : "",
    brand_id: props.product ? props.product?.brand_id : "",
    categorie_id: props.product ? props.product?.categorie_id : "",
    status: props.product ? props.product.status : "0",
    thumb: props.product ? props.product.thumb : "",
})


const breadcrumbs = [
    {
        title: 'Product',
        href: "/product",
    },
    {
        title: props.product ? "Edit" : 'Create',
        href: props.product ? "/product/edit" : "/product/create",
    },

];

const handleSubmit = () => {
    form.post('/product')
}
</script>

<template>
    
    <Head title="Product" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <AdminLayout>
            <template #heading>
                {{ props.product ? "Update Product" : "Create New Product" }}
            </template>

            <!-- Form Card -->
            <form @submit.prevent="handleSubmit" class="max-w-2xl bg-white rounded-lg shadow p-6">

                <!-- Product Name -->
                <TextInput v-model="form.name" type="text" lable="Product Name" holder="Enter product name" />

                <!-- Price & Discount -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <TextInput v-model="form.price" lable="Price" type="number" holder="Enter price" />

                    <TextInput v-model="form.discount" lable="Discount Price" type="number"
                        holder="Enter discount price" />
                </div>

                <!-- Quantity -->
                <TextInput v-model="form.quantity" lable="Quantity" type="number" holder="Enter stock quantity" />

                <!-- Thumbnail -->
                <TextInput v-model="form.thumb" type="text" lable="Thumbnail" holder="image-name.jpg" />

                <!-- Description -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Description
                    </label>
                    <textarea v-model="form.description" rows="4" placeholder="Enter product description"
                        class="w-full rounded-md border px-4 py-2 border-gray-300 focus:border-purple-500 focus:ring-purple-500"></textarea>
                </div>

                <!-- Brand -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Brand
                    </label>
                    <select v-model="form.brand_id"
                        class="w-full rounded-md border px-4 py-2 border-gray-300 focus:border-purple-500 focus:ring-purple-500">
                        <option value="">Select Brand</option>
                        <option v-for="brand in brands" :value="brand.id" :key="brand.id">{{brand.name}}</option>
                        
                    </select>
                </div>
                <!-- Categorys -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Categorys
                    </label>
                    <select v-model="form.categorie_id"
                        class="w-full rounded-md border px-4 py-2 border-gray-300 focus:border-purple-500 focus:ring-purple-500">
                        <option value="">Select Category</option>
                        <option v-for="category in categorys" :value="category.id" :key="category.id">{{category.name}}</option>
                    </select>
                </div>
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
                    <button type="submit"
                        class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                        {{ props.product ? "Update" : 'Save' }}
                    </button>

                    <Link href="/categorie"
                        class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md text-sm font-medium">
                        Cancel
                    </Link>
                </div>

            </form>

        </AdminLayout>
    </AppLayout>
</template>
