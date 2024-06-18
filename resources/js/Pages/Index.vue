<template>
    <br> <br>
    <div class="card col-5 offset-3">
        <div v-if="$page.props.flash.message" class="alert alert-success">
            {{ $page.props.flash.message }}
        </div>
        <table class="table table-bordered table-hover table-sm">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="customer in customers" :key="customer.id">
                <th>{{ customer.id }}</th>
                <td>{{ customer.name }}</td>
                <td>
                    <a href="" class="btn btn-secondary">Show</a>
                    <a class="btn btn-primary" @click="edit(customer.id)">Edit</a>
                    <a class="btn btn-danger" @click="destroy(customer.id)">Delete</a>
                </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import { router } from '@inertiajs/vue3'

defineProps({customers: Object})

const destroy = (id) => {
    router.delete('/customers/'+id)
    // router.delete(`/customers/${id}`)
}

const edit = (id) => {
    router.get('/customers/'+id+'/edit')
}

</script>
