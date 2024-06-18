<template>
    <div class="card col-6 offset-3">
        <div class="card-header">
        Edit Customer
        </div>
        <div class="card-body">
            <form @submit.prevent="handleUpdate(customer.id)">
                <div class="mb-3">
                    <label for="exampleInputName1" class="form-label">Name</label>
                    <input type="text" v-model="form.name" class="form-control" id="exampleInputName1">
                    <div class="text-danger text-xs" v-if="errors.name">
                        {{ errors.name }}
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" v-model="form.email" class="form-control" id="exampleInputEmail1">
                    <div class="text-danger text-xs" v-if="errors.email">
                        {{ errors.email }}
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPhone1" class="form-label">Phone Number</label>
                    <input type="number" v-model="form.phone" class="form-control" id="exampleInputPhone1">
                    <div class="text-danger text-xs" v-if="errors.phone">
                        {{ errors.phone }}
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</template>

<script setup>

import { useForm, router } from "@inertiajs/vue3"

const props = defineProps({
    errors: Object,
    customer: Object
})

const form = useForm({
    name: props.customer.name,
    email: props.customer.email,
    phone: props.customer.phone
})

const handleUpdate = (id) => {
    router.put('/customers/' + id, form)
}

</script>
