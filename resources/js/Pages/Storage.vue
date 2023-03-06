<script setup>


import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DangerButton from '@/Components/DangerButton.vue'
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    assets: Object,


})


</script>

<template>
    <Head title="Assets" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Store Rooom</h2>
            </div>
        </template>


        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="w-full border-collapse bg-white text-center text-sm text-gray-500">
                        <thead class="bg-gray-50">
                        <tr class="hover:bg-gray-50">
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">ID</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Asset Name</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Serial Number</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">fa_code</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Created At</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Modified At</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="asset in assets" class="border">
                            <td class="px-6 py-4 font-medium text-gray-900">{{asset.id}}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{asset.asset_name}}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{asset.serial_number}}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{asset.fa_code}}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ new Date(asset.created_at).toLocaleString() }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ new Date(asset.updated_at).toLocaleString() }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 inline-flex gap-4">
                                <DangerButton>Delete</DangerButton>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



    </AuthenticatedLayout>
</template>
