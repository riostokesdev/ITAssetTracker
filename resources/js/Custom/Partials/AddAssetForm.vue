<script setup>
/* Imports */
import InputLabel from '@/Components/InputLabel.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import {ref} from 'vue'
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Modal from '@/Components/Modal.vue';

/* Form Const*/

const props = defineProps({
    employees: Object,
    id: '',
    name: '',
    job_title: '',
    manager: '',
    office: '',
    created_at: '',
    updated_at: '',
})
const form = useForm({
    asset_name: '',
    serial_number: '',
    fa_code: '',
    employee_id: props.id,
})



/* Start of Modal */

const AddAssetConfirmation = ref( false);

const AddAsset = () => {
    AddAssetConfirmation.value = true;
};

const closeModal = () => {
    AddAssetConfirmation.value = false;

    form.reset();
};

const submit = () => {
    form.post(route('createAsset'), {
        onSuccess: () => closeModal(),
    });
};

</script>

<template>
    <PrimaryButton @click="AddAsset">Add Asset</PrimaryButton>



    <Modal :show="AddAssetConfirmation" @close="closeModal">
        <form @submit.prevent="submit" class="p-4 space-y-6">


            <div class="mt-4">
                <InputLabel for="asset_name" value="Asset Name"/>

                <TextInput
                    id:="asset_name"
                    typeof="text"
                    class="mt-1 block w-full"
                    v-model="form.asset_name"
                    required
                    autofocus
                    autocomplete="off"
                />
            </div>


            <div class="mt-4">
                <InputLabel for="serial_number" value="Serial Number"/>

                <TextInput
                    id="serial_number"
                    typeof="text"
                    class="mt-1 block w-full"
                    v-model="form.serial_number"
                    required
                    autofocus
                    autocomplete="off"
                />
            </div>

            <div class="mt-4">
                <InputLabel for="fa_code" value="FA Code"/>

                <TextInput
                    id="fa_code"
                    typeof="text"
                    class="mt-1 block w-full"
                    v-model="form.fa_code"
                    required
                    autofocus
                    autocomplete="off"
                />

            </div>


            <div class="flex items-center gap-4">
                <SecondaryButton @click="closeModal">Cancel</SecondaryButton>
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>
            </div>







        </form>

    </Modal>
</template>
