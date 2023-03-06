<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import DangerButton from '@/Components/DangerButton.vue'
import AddAssetForm from '@/Custom/Partials/AddAssetForm.vue'
import StoreAsset from '@/Custom/Buttons/StoreAsset.vue';




const props = defineProps({
    employees: Object,
    assets: Object

})

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Currently Viewing Employee:   {{employees.name}}</h2>
                <AddAssetForm v-bind="employees"></AddAssetForm>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                   <div class="grid lg:grid-cols-2 md:grid-cols-1 sm:px-8 sm:grid-cols-1">

                       <div class="grid-cols-1 grid gap-8 py-5 px-5">
                           <h1 class="font-bold text-xl text-center">Profile View</h1>
                           <div class="flex justify-between ">
                               <h1>Employee Name</h1>
                               <h1>{{employees.name}}</h1>
                           </div>
                           <div class="flex justify-between  ">
                               <h1>Employee Job Title</h1>
                               <h1>{{employees.job_title}}</h1>
                           </div>
                           <div class="flex justify-between  ">
                               <h1>Employee Manager</h1>
                               <h1>{{employees.manager}}</h1>
                           </div>
                           <div class="flex justify-between  ">
                               <h1>Employee Office</h1>
                               <h1>{{employees.office}}</h1>
                           </div>
                           <div class="flex justify-between  ">
                               <h1>Employee Created On</h1>
                               <h1>{{ new Date(employees.created_at).toLocaleString() }}</h1>
                           </div>
                           <div class="flex justify-between ">
                               <h1>Employee Modified On</h1>
                               <h1>{{ new Date(employees.updated_at).toLocaleString() }}</h1>
                           </div>
                       </div>



                       <div class="grid-cols-1 grid gap-8 py-5 px-5">
                           <h1 class="font-bold text-xl text-center">Recent Changes</h1>
                           <div class="flex justify-between ">
                               <h1></h1>
                               <h1></h1>
                           </div>
                           <div class="flex justify-between ">
                               <h1></h1>
                               <h1></h1>
                           </div>
                           <div class="flex justify-between ">
                               <h1></h1>
                               <h1></h1>
                           </div>
                           <div class="flex justify-between ">
                               <h1></h1>
                               <h1></h1>
                           </div>
                           <div class="flex justify-between ">
                               <h1></h1>
                               <h1></h1>
                           </div>
                           <div class="flex justify-between ">
                               <h1></h1>
                               <h1></h1>
                           </div>
                       </div>

                   </div>
                </div>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="w-full border-collapse bg-white text-center text-sm text-gray-500">
                        <thead class="bg-gray-50">
                        <tr class="hover:bg-gray-50">
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">ID</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Asset Name</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Serial Number</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">FA Code</th>
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
                            <td class="px-6 py-4 font-medium text-gray-900">{{asset.created_at}}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{asset.updated_at}}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 inline-flex gap-4">
                                <a >
                                    <StoreAsset>Store Asset</StoreAsset>
                                </a>
                                <a :href="'/delete/asset/' + asset.id">
                                    <DangerButton>Delete</DangerButton>
                                </a>

                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



    </AuthenticatedLayout>
</template>
