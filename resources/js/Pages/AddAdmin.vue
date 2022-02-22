<template>
    <app-layout title="Add Admin">
        <div class="">
            <div>

            </div>
            <div class="grid grid-cols-3 py-16">
                <div class="col-span-2">
                    <div class="w-11/12 mx-auto bg-white px-16 py-8">

                        <div>
                            <p class="capitalize text-2xl font-bold mb-6">
                                add admin
                            </p>
                        </div>
                        <jet-validation-errors class="mb-4" />

                        <form @submit.prevent="submit" >
                            <div>
                                <jet-label for="name" value="Name" />
                                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />
                            </div>

                            <div class="mt-4">
                                <jet-label for="email" value="Email" />
                                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required />
                            </div>

                            <div class="mt-4">
                                <jet-label for="phone" value="Phone Number" />
                                <jet-input id="phone" type="tel" class="mt-1 block w-full" v-model="form.phone" required autofocus autocomplete="phone" />
                            </div>

                            <div class="mt-4">
                                <jet-label for="address" value="Home Address" />
                                <jet-input id="address" type="text" class="mt-1 block w-full" v-model="form.address" required autofocus autocomplete="address" />
                            </div>

                            <div class="mt-4">
                                <jet-label for="password" value="Password" />
                                <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" />
                            </div>

                            <div class="mt-4">
                                <jet-label for="password_confirmation" value="Confirm Password" />
                                <jet-input id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />
                            </div>

                            <div class="mt-4" v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature">
                                <jet-label for="terms">
                                    <div class="flex items-center">
                                        <jet-checkbox name="terms" id="terms" v-model:checked="form.terms" />

                                        <div class="ml-2">
                                            I agree to the <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Terms of Service</a> and <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Privacy Policy</a>
                                        </div>
                                    </div>
                                </jet-label>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                                    Already registered?
                                </Link>

                                <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Register
                                </jet-button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div>

        </div>
        
    </app-layout>
</template>


<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetCheckbox from '@/Jetstream/Checkbox.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Head,
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors,
            Link,
            AppLayout,
        },

        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    email: '',
                    phone: '',
                    address: '',
                    password: '',
                    password_confirmation: '',
                    terms: false,
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('register'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
            }
        }
    })
</script>
