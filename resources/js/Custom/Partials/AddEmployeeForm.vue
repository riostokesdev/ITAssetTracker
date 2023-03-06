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
                    <option value="Rebbecca Beard">Rebbecca Beard</option>
                    <option value="Nick Grey">Nick Grey</option>
                    <option value="Jordan Willis">Jordan Willis</option>
                    <option value="Jot Walford">Jot Walford</option>
                    <option value="Hassaan Kassim">Hassaan Kassim</option>
                    <option value="Kent Cheng">Kent Cheng</option>
                    <option value="Andy Kent">Andy Kent</option>
                    <option value="Simon Jarvis ">Simon Jarvis</option>
                    <option value="Jayne Fitch">Jayne Fitch</option>
                    <option value="Spencer Pickford">Spencer Pickford</option>
                    <option value="Nick Hall">Nick Hall</option>
                </select>
            </div>


            <div class="mt-4">
                <InputLabel for="office" value="Office"/>

                <select name="office" v-model="form.office">
                    <option value="">Select Your Option</option>
                    <option value="Accounts">Accounts</option>
                    <option value="Creative">Creative</option>
                    <option value="Mathmatical">Mathmatical</option>
                    <option value="Commercial">Commercial</option>
                    <option value="Customer Services">Customer Services</option>
                    <option value="CS Admin">CS Admin</option>
                    <option value="CS Training">CS Training</option>
                    <option value="Counter Fraud">Counter Fraud</option>
                    <option value="HR">HR</option>
                    <option value="IT">IT</option>
                    <option value="Developers">Developers</option>
                    <option value="MD & CEO">MD & CEO</option>
                    <option value="Marketing">Marketing / Analysts</option>
                    <option value="NPD">NPD</option>
                    <option value="Purchasing">Purchasing</option>
                    <option value="Quality">Quality</option>
                    <option value="Resource Planning">Resource Planning</option>
                    <option value="Social Media">Social Media</option>
                    <option value="Technical">Technical</option>
                    <option value="Department">Department</option>
                </select>
            </div>


            <div class="flex items-center gap-4">
                <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>
            </div>
        </form>
    </Modal>
</template>

