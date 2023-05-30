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
                            <h3 class="text-lg text-gray-900">Create Note</h3>
                            <p class="text-sm text-gray-600">After creating it you can edit it</p>
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
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150"
                                >Create</button> -->
                                <button
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150"
                                    :disabled="isSubmitting"
                                >
                                    <template v-if="isSubmitting">
                                        Creating...
                                    </template>
                                    <template v-else>
                                        Create
                                    </template>
                                </button>
                            </form>
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
        data () {
            return {
                form: {
                    excerpt: '',
                    content: '',
                },
                isSubmitting: false,
            }
        },
        methods: {
            // submit() {
            //     this.$inertia.post(this.route('notes.store'), this.form)
            // }
            submit() {

                if (this.isSubmitting) {
                    return;
                }

                this.isSubmitting = true;
                this.$inertia.post(this.route('notes.store'), this.form)
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
        }
    }
</script>