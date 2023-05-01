<template>
    <Head title="Login Page" />

    <div className="w-full py-4 px-4 md:py-0 md:px-0  bg-login-standard bg-no-repeat bg-cover">
        <div class="flex items-center justify-center h-screen">
            <!-- Form and image wrapper -->
            <div class="flex justify-center w-4/5 shadow-lg rounded-lg">
                <div class="md:w-loginFormWidth">
                    <div class="">
                        <img src="../../images/rectangle_2.svg" alt="" class="w-full" />
                    </div>
                    <form class="bg-white px-formX py-formY rounded-lg md:rounded-0"
                        @submit.prevent="form.post(route('login'))">
                        <h2 class="mt-4 text-standardPurple font-extrabold text-lg uppercase text-center">
                            Login
                        </h2>
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

                        <span v-if="data" class="text-red-600">
                            {{ data.original.message }}
                        </span>
                        <br />
                        <button type="submit" :disabled="form.processing"
                            class="mt-8 mb-8 bg-standardPurple text-white py-4 uppercase text-sm font-bold w-full rounded-md tracking-space">
                            login
                        </button>
                    </form>
                    <p class="text-center">Don't have an account?
                        <Link :href="route('show.register.page')" class="underline text-white ">Register
                        </Link> Here
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script >
import { computed } from 'vue'
import { Head, useForm, Link, usePage } from '@inertiajs/vue3';

export default {
    components: {
        Head, useForm, Link, usePage
    },
    setup() {
        const form = useForm({
            email: "",
            password: ""
        })
        const data = computed(() => usePage().props.flash.data)

        return { form, data }
    }
}

</script>