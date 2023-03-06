<script setup>

import PrimaryButton from '@/Components/PrimaryButton.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import TextInput from '@/Components/TextInput.vue'
import AddEmployeeForm from "@/Custom/Partials/AddEmployeeForm.vue";
import ViewEmployeeButton from '@/Custom/Buttons/ViewEmployee.vue'
import DangerButton from '@/Components/DangerButton.vue'

const props = defineProps({
    employees: Object,

})

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
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="employee in employees" class="border">
                            <td class="px-6 py-4 font-medium text-gray-900">{{employee.id}}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{employee.name}}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{employee.job_title}}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{employee.manager}}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{employee.office}}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ new Date(employee.created_at).toLocaleString() }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ new Date(employee.updated_at).toLocaleString() }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 inline-flex gap-4">
                                <a :href="'/employee/' + employee.id">
                                    <ViewEmployeeButton>View</ViewEmployeeButton>
                                </a>
                                <a :href="'/employee/delete/' + employee.id">
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
