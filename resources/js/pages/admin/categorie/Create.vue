<script setup>
import AdminLayout from '@/components/aCommon/AdminLayout.vue'
import TextInput from '@/components/aCommon/TextInput.vue';
import AppLayout from '@/layouts/AppLayout.vue'
import { Head, Link, useForm } from '@inertiajs/vue3'


const props = defineProps({
    category: {
        type: Object,
        default: null
    }
})


const breadcrumbs = [
    { title: 'Categorie', href: '/categorie' },
    { title: props.category ? 'Edit' : 'Create', href: props.category ? '/categorie/edit' : '/categorie/create' },
]

const form = useForm({
    name:props.category ? props.category.name : '',
    slug:props.category ? props.category.slug : '',
    status:props.category ? props.category.status : '0'
})

const handleForm = () => {
    if(props.category){
        form.put(`/categorie/${props.category.id}`)
    }
    else{
        form.post('/categorie')
    }
}

</script>

<template>

    <Head :title="props.category ? 'Update categorie' : 'Create categorie'" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <AdminLayout>
            <template #heading>
                {{ props.category ? 'Update categorie' : 'Create new categorie' }}

            </template>

            <!-- Form Card -->
            <form @submit.prevent="handleForm()" class="max-w-2xl bg-white rounded-lg shadow p-6">

                <!-- name -->
                <TextInput v-model="form.name" lable="Category Name" type="text" holder="Enter category name" />

                <!-- Slug -->
                <TextInput v-model="form.slug" lable="Slug" type="text" holder="Enter category name" />

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
                        {{ props.category ? 'Update' : 'Save' }}

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
