<script setup>


import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

import AddEmployeeForm from "@/Custom/Partials/AddEmployeeForm.vue";



</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Employees</h2>
                <add-employee-form/>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="w-full border-collapse bg-white text-center text-sm text-gray-500">
                        <thead class="bg-gray-50">
                        <tr class="hover:bg-gray-50">
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">ID</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Name</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Job Title</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Manager</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Office</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Created At</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Modified At</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>



    </AuthenticatedLayout>
</template>
