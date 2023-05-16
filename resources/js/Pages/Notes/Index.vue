<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Notes Module
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px0">
                            <h3 class="text-lg text-gray-900">List Of Notes</h3>
                            <p class="text-sm text-gray-600">Grab the correct record and run any function (view, edit or delete)</p>
                        </div>
                    </div>
                    <div class="md:col-span-2 mt-5 md:mt-0">
                        <div class="shadow bg-white md:rounded-md p-4">
                            <div class="flex justify-between">
                                <input type="text" class="form-input rounded-md shadow-sm" placeholder="Search..." v-model="q">

                                <inertia-link :href="route('notes.create')" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150">
                                    Create
                                </inertia-link>
                            </div>
                            <hr class="my-6">
                            <table>
                                <tr v-for="note in notes" :key="note.id">
                                    <td class="border px-4 py-2">
                                        {{ note.excerpt }}
                                    </td>
                                    <td class="px-4 py-2">
                                        <inertia-link :href="route('notes.show', note.id)">
                                            View
                                        </inertia-link>
                                    </td>
                                    <td class="px-4 py-2">
                                        <inertia-link :href="route('notes.edit', note.id)">
                                            Edit
                                        </inertia-link>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'

    export default {
        components: {
            AppLayout,
            Welcome,
        },
        props: {
            notes: Array,
        },
        data() {
            return {
                q: ''
            }
        },
        watch: {
            q: function (value) {
                this.$inertia.replace(this.route('notes.index', {q: value}))
            }
        }
    }
</script>
