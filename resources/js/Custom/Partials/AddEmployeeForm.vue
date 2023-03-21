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

const props = defineProps({
    employees: Object,
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
                    class="mt-1 block w-full"
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

                <select name="manager" v-model="form.manager">
                    <option value="">Select Your Option</option>
                    <option value="Mackenzie Jefferson">Mackenzie Jefferson</option>
                    <option value="Finnian Robertson">Finnian Robertson</option>
                    <option value="Kevin Stafford">Kevin Stafford</option>
                    <option value="Sion Hudson">Sion Hudson</option>
                    <option value="Harris Simon">Harris Simon</option>
                    <option value="Christine Sawyer">Christine Sawyer</option>
                    <option value="Abdullah Mccormick">Abdullah Mccormick</option>
                    <option value="Nettie Edwards">Nettie Edwards</option>
                    <option value="Ty Cohen">Ty Cohen</option>
                    <option value="Lenny Roth">Spencer Pickford</option>
                </select>
            </div>


            <div class="mt-4">
                <InputLabel for="office" value="Office"/>

                <select name="office" v-model="form.office">
                    <option value="">Select Your Option</option>
                    <option value="Human Resources">Human Resources</option>
                    <option value="IT">IT</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Sales">Sales</option>
                    <option value="Accounts">Accounts</option>
                </select>
            </div>


            <div class="flex items-center gap-4">
                <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>
            </div>
        </form>
    </Modal>
</template>

