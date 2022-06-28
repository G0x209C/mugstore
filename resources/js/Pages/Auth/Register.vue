<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue';
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue';
import JetButton from '@/Jetstream/Button.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetCheckbox from '@/Jetstream/Checkbox.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue';

const form = useForm({
    name: '',
    surname: '',
    addressStreet: '',
    addressHousenumber: '',
    addressPostalcode: '',
    addressCity: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    // remove whitespaces from postalcode
    form.addressPostalcode = form.addressPostalcode.replaceAll(/\s/g,'');
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Register" />

    <JetAuthenticationCard>
        <template #logo>
            <JetAuthenticationCardLogo />
        </template>

        <JetValidationErrors class="mb-4" />

        <form @submit.prevent="submit">
            <div>
                <JetLabel for="name" value="Naam" />
                <JetInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="name"
                />
            </div>

            <div class="mt-4">
                <JetLabel for="surname" value="Achternaam" />
                <JetInput
                    id="surname"
                    v-model="form.surname"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autocomplete="family-name"
                />
            </div>
            <div class="mt-4">
                <JetLabel for="streetname" value="Straatnaam" />
                <JetInput
                    id="streetname"
                    v-model="form.addressStreet"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autocomplete="street-address"
                />
            </div>
            <div class="mt-4">
                <div class="flex">
                    <div class="w-1/5">
                        <JetLabel for="housenumber" value="Huisnummer"></JetLabel>
                        <JetInput
                            id="housenumber"
                            v-model="form.addressHousenumber"
                            type="text"
                            class="mt-1 block w-full"
                            required
                            autocomplete=""
                        />
                    </div>
                    <div class="mx-auto w-1/5">
                        <JetLabel for="toevoeging" value="Toevoeging"></JetLabel>
                        <JetInput
                            id="toevoeging"
                            v-model="form.addressHousenumber"
                            type="text"
                            class="mt-1 block w-full"
                            required
                            autocomplete=""
                        />
                    </div>
                    <div class="w-1/3">
                        <JetLabel for="postalcode" value="Postcode"></JetLabel>
                        <JetInput
                            id="postalcode"
                            v-model="form.addressPostalcode"
                            type="text"
                            class="mt-1 block w-full"
                            required
                            autocomplete="postal-code"
                        />
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <JetLabel for="city" value="Stad" />
                <JetInput
                    id="city"
                    v-model="form.addressCity"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autocomplete="street-address"
                />
            </div>

            <div class="mt-4">
                <JetLabel for="email" value="Email" />
                <JetInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                />
            </div>

            <div class="mt-4">
                <JetLabel for="password" value="Wachtwoord" />
                <JetInput
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password"
                />
            </div>

            <div class="mt-4">
                <JetLabel for="password_confirmation" value="Herhaal wachtwoord" />
                <JetInput
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password"
                />
            </div>

            <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="mt-4">
                <JetLabel for="terms">
                    <div class="flex items-center">
                        <JetCheckbox id="terms" v-model:checked="form.terms" name="terms" />

                        <div class="ml-2">
                            I agree to the <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Terms of Service</a> and <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Privacy Policy</a>
                        </div>
                    </div>
                </JetLabel>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Already registered?
                </Link>

                <JetButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </JetButton>
            </div>
        </form>
    </JetAuthenticationCard>
</template>
