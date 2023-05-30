<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Note Module
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">  
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px0">
                            <h3 class="text-lg text-gray-900">Edit Note</h3>
                            <p class="text-sm text-gray-600">If you edit you will not be able to return to the previous state</p>
                        </div>
                    </div>
                    <div class="md:col-span-2 mt-5 md:mt-0">
                        <div class="shadow bg-white md:rounded-md p-4">
                            <form @submit.prevent="submit">
                                <label class="block font-medium text-sm text-gray-700">
                                    Summary
                                </label>
                                <textarea 
                                    class="form-input w-full rounded-md shadow-sm"
                                    v-model="form.excerpt"
                                    :maxlength="100"
                                    placeholder="Enter up to 100 characters"
                                ></textarea>
                                <label class="block font-medium text-sm text-gray-700">
                                    Content
                                </label>
                                <textarea 
                                    class="form-input w-full rounded-md shadow-sm"
                                    v-model="form.content"
                                    rows="8"
                                    :maxlength="200"
                                    placeholder="Enter up to 200 characters"
                                ></textarea>
                                <!-- <button 
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md bg-gray-800"
                                >Edit</button> -->

                                <button
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md bg-gray-800"
                                    :disabled="isSubmitting || isDeleting"
                                >
                                    <template v-if="isSubmitting">
                                        Editing...
                                    </template>
                                    <template v-else-if="isDeleting">
                                        Deleting...
                                    </template>
                                    <template v-else>
                                        Edit
                                    </template>
                                </button>

                                <!-- <a class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150" href="#" @click.prevent="destroy">
                                    Delete Note
                                </a> -->
                                <button type="button" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150" @click.prevent="destroy" :disabled="isSubmitting || isDeleting">
                                    <template v-if="isSubmitting">
                                        Editing...
                                    </template>
                                    <template v-else-if="isDeleting">
                                        Deleting...
                                    </template>
                                    <template v-else>
                                        Delete Note
                                    </template>

                                </button>

                            </form>

                            <!-- <hr class="my-6">

                            <a class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150" href="#" @click.prevent="destroy">
                                Delete Note
                            </a> -->

                            <hr class="my-6">
                            <inertia-link :href="route('notes.index')">
                                Back
                            </inertia-link>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    export default {
        components: {
            AppLayout,
        },
        props: {
            note: Object,
        },
        data () {
            return {
                form: {
                    excerpt: this.note.excerpt,
                    content: this.note.content,
                },
                isSubmitting: false,
                isDeleting: false,
            }
        },
        methods: {
            // submit() {
            //     this.$inertia.put(this.route('notes.update', this.note.id), this.form)
            // },
            submit() {

                if (this.isSubmitting) {
                    return;
                }

                this.isSubmitting = true;
                this.$inertia.put(this.route('notes.update', this.note.id), this.form)
                .then(() => {
                // Handle success if needed
                })
                .catch(() => {
                // Handle error if needed
                })
                .finally(() => {
                    this.isSubmitting = false;
                });
            },

            destroy() {

                if (this.isDeleting) {
                    return;
                }

                this.isDeleting = true;
                if (confirm('¿Want to delete?')) {
                    this.$inertia.delete(this.route('notes.destroy', this.note.id))
                        .then(() => {
                        // Handle success if needed
                        })
                        .catch(() => {
                        // Handle error if needed
                        })
                        .finally(() => {
                            this.isDeleting = false;
                        });
                    }
            }
        }
    }
</script>