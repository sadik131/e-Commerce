<script setup>
import AdminLayout from '@/components/aCommon/AdminLayout.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';

const breadcrumbs = [
    {
        title: 'Categorie',
        href: "/categorie",
    },
];

defineProps({
    categories: Object
})

const handledelete = (id) => {
    router.delete(`/categorie/${id}`)
}

</script>

<template>

    <Head title="Categorie" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <AdminLayout>
            <template #heading>
                Categories List
            </template>

            <Link href="/categorie/create"
                class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                + Add Categorie
            </Link>
            <div class="bg-white rounded-lg shadow overflow-hidden mt-5">
                <h1 v-if="categories.data.length === 0" class="text-center py-4 w-full">No Data Found</h1>

                <table v-else class="w-full text-left border-collapse">
                    <thead class="bg-gray-50 border-b">
                        <tr class="text-sm text-gray-600">
                            <th class="px-6 py-3">#</th>
                            <th class="px-6 py-3">Name</th>
                            <th class="px-6 py-3">Slug</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y" v-for="categorie in categories.data" :key="categorie.id">

                        <tr class="text-sm text-gray-700">
                            <td class="px-6 py-4">{{ categorie.id }}</td>

                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <p class="font-medium">{{ categorie.name }}</p>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <p class="font-medium">{{ categorie.slug }}</p>
                                </div>
                            </td>


                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-2 py-1 text-xs font-medium bg-green-100 text-green-700 rounded">
                                    {{ categorie.status ? 'active' : "inActive" }}
                                </span>
                            </td>

                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <button
                                        class="px-3 py-1 text-xs rounded bg-blue-100 text-blue-700 hover:bg-blue-200">
                                        View
                                    </button>
                                    <Link :href="`/categorie/${categorie.id}/edit`"
                                        class="px-3 py-1 text-xs rounded bg-yellow-100 text-yellow-700 hover:bg-yellow-200">
                                        Edit
                                    </Link>
                                    <button @click="handledelete(categorie.id)"
                                        class="px-3 py-1 text-xs rounded bg-red-100 text-red-700 hover:bg-red-200">
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </AdminLayout>
    </AppLayout>
</template>
