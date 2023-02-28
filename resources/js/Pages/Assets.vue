<script setup>


import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

import AddEmployeeForm from "@/Custom/Partials/AddEmployeeForm.vue";



</script>

<template>
    <Head title="Assets" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Assets</h2>
            </div>
        </template>
        



    </AuthenticatedLayout>
</template>
