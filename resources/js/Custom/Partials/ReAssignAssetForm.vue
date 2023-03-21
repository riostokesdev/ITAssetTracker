<script setup>
/* Imports */

import InputLabel from '@/Components/InputLabel.vue';
import DangerButton from '@/Components/DangerButton.vue';
import ViewEmployeeButton from '@/Custom/Buttons/ViewEmployee.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue'
import TextInput from '@/Components/TextInput.vue'
import { useForm } from '@inertiajs/vue3'
import { ref } from 'vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import Modal from '@/Components/Modal.vue'

/* Form Const */

const form = useForm({
    employee_name: '',
})

const props = defineProps({
    employees: Object,
})




/* Modal */

const ReAssignAssetConfirmation = ref(false)

const ReAssignAsset = () => {
    ReAssignAssetConfirmation.value = true;

}

const closeModal = () => {
    ReAssignAssetConfirmation.value = false
    form.reset();
}

const submit = () => {
    form.post(route('reassignAsset'), {
        onSuccess: () => closeModal(),
    })
}


</script>

<template>
    <PrimaryButton @click="ReAssignAsset">ReAssign Asset</PrimaryButton>

    <Modal :show="ReAssignAssetConfirmation" @close="closeModal">
        <form @submit.prevent="submit" class="p-4 space-y-6">
            <div class="mt-4">
                <InputLabel for="employee" value="Name Of Employee" />
                <TextInput
                    id="employee_name"
                    typeof="text"
                    class="mt-1 block w-full"
                    v-model="form.employee_name"
                    required
                    autofocus
                    autocomplete = "off"
                />
            </div>
        </form>

        <div v-for="employee in props.employees">
            <h1>Test</h1>
        </div>

    </Modal>

</template>
