<script setup>
/* Import Section*/
import InputLabel from '@/Components/InputLabel.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import {ref} from 'vue'
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Modal from '@/Components/Modal.vue';



const form = useForm({
    name: '',
    job_title: '',
    manager: '',
    office: ''

})


/*  Start Of Models */
const AddEmployeeConfirmation = ref(false);

const AddEmployee = () => {
    AddEmployeeConfirmation.value = true;

};
const closeModal = () => {
    AddEmployeeConfirmation.value = false;

    form.reset();
};

const submit = () => {
    form.post(route('createEmployee'), {
        onSuccess: () => closeModal(),

    });
};

/*  End Of Modal */



</script>

<template>

    <PrimaryButton @click="AddEmployee">Add Employee</PrimaryButton>

    <Modal :show="AddEmployeeConfirmation" @close="closeModal">
        <form @submit.prevent="submit" class="p-4 space-y-6">

            <div class="mt-4">
                <InputLabel for="name" value="Name"/>

                <TextInput
                    id="name"
                    typeof="text"
                    class="mt-1 block w-3/4"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="off"
                />
            </div>


            <div class="mt-4">
                <InputLabel for="job_title" value="Job Title"/>

                <TextInput
                    id="job_title"
                    typeof="text"
                    class="mt-1 block w-full"
                    v-model="form.job_title"
                    required
                    autofocus
                    autocomplete="off"
                />
            </div>

            <div class="mt-4">
                <InputLabel for="manager" value="Manager"/>

                <TextInput
                    id="manager"
                    typeof="text"
                    class="mt-1 block w-full"
                    v-model="form.manager"
                    required
                    autofocus
                    autocomplete="off"
                />
            </div>


            <div class="mt-4">
                <InputLabel for="office" value="Office"/>

                <TextInput
                    id="office"
                    typeof="text"
                    class="mt-1 block w-full"
                    v-model="form.office"
                    required
                    autofocus
                    autocomplete="off"
                />
            </div>


            <div class="flex items-center gap-4">
                <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>
            </div>
        </form>
    </Modal>
</template>

