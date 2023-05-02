<template>
    <Head title="Registration Page" />
    <div class="sm:px-8 sm:py-8 w-full h-full text-standardPurple h-screen">

        <div class="md:flex bg-authentication-image  bg-no-repeat bg-cover px-2 py-2 md:bg-none">
            <div
                class="content w-full pt-3 bg-softWhite rounded-lg md:rounded-0 md:w-3/5 md:flex items-center justify-center">
                <div class="md:flex md:flex-col">
                    <div
                        class="avartar mx-auto flex bg-standardPurple w-20 h-20 rounded-full items-center justify-center uppercase mb-2">
                        <p class="text-white">logo</p>
                    </div>

                    <h2 class="font-bold text-center mt-3">Create Account</h2>
                    <p class="italic text-center">
                        Enter the fields below to get started
                    </p>
                    <form class="w-4/5 md:w-formWidth block m-auto" @submit.prevent="form.post(route('register'))">
                        <label class="font-medium mt-6 mb-2 text-sm block">Full Name</label>

                        <input type="text" v-model="form.name"
                            class="border-2 border-standardPurple border-b-4 outline-0 rounded-md py-1 px-3 w-full" />
                        <span v-if="$page.props.errors.name" class="text-red-600">
                            {{ $page.props.errors.name }}
                        </span>
                        <br />
                        <label class="font-medium mt-6 mb-2 text-sm block">Email</label>

                        <input type="email" v-model="form.email"
                            class="border-2 border-standardPurple border-b-4 outline-0 rounded-md py-1 px-3 w-full" />
                        <span v-if="$page.props.errors.email" class="text-red-600">
                            {{ $page.props.errors.email }}
                        </span>
                        <br />

                        <label class="font-medium mt-6 mb-2 text-sm block">Password</label>

                        <input type="password" v-model="form.password"
                            class="border-2 border-standardPurple border-b-4 outline-0 rounded-md py-1 px-3 w-full" />
                        <span v-if="$page.props.errors.password" class="text-red-600">
                            {{ $page.props.errors.password }}
                        </span>
                        <br />
                        <label class="font-medium mt-6 mb-2 text-sm block">Confirm Password</label>

                        <input type="password" v-model="form.confirm_password"
                            class="border-2 border-standardPurple border-b-4 outline-0 rounded-md py-1 px-3 w-full" />
                        <span v-if="$page.props.errors.confirm_password" class="text-red-600">
                            {{ $page.props.errors.confirm_password }}
                        </span>
                        <br />
                        <button type="submit" :disabled="form.processing"
                            class="mt-8 mb-8 bg-standardPurple text-white py-4 uppercase text-sm font-bold w-full rounded-md tracking-space">
                            sign up
                        </button>
                    </form>
                    <p class="text-center">Already have an account?
                        <Link :href="route('show.login.page')" class="underline text-links ">Login</Link> Here
                    </p>
                </div>
            </div>
            <div class="flex items-stretch logo hidden md:flex">
                <img src="../../images/authentication.svg" alt="" class="w-3/5 h-full rounded-lg" />
            </div>
        </div>
    </div>
</template>

<script>
import { computed } from 'vue'
import { Head, useForm, Link, usePage } from '@inertiajs/vue3';

export default {
    components: {
        Head, useForm, Link, usePage
    },
    setup() {
        const form = useForm({
            name: "",
            email: "",
            password: "",
            confirm_password: ""
        })
        const data = computed(() => usePage().props.flash.data)

        return { form, data }
    }
}

</script>