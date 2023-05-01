<template>
    <Head title="Login Page" />
    <main>
        <div
            className="absolute w-full h-full object-fill object-center bg-no-repeat bg-cover left-0 top-0 bg-login-standard">

            <div class="flex items-center justify-center h-screen">
                <!-- Form and image wrapper -->
                <div class="flex">
                    <div class="w-loginFormWidth">
                        <div
                            class="relative overflow-hidden w-609 h-20vh lg:w-70vw md:w-70vw sm:w-90vwr ounded-tl-10 rounded-tr-10 shadow-md">
                            <img src="../../images/rectangle_2.svg" alt="" className="w-full h-full object-cover " />
                        </div>
                        <form class="bg-white px-formX py-formY" @submit.prevent="form.post(route('login'))">
                            <h2 class="mt-4 text-standardPurple font-extrabold text-lg uppercase text-center">
                                Login
                            </h2>
                            <label class="font-medium mt-6 mb-2 text-sm block">Email</label>

                            <input type="email" v-model="form.email"
                                class="border-2 border-standardPurple border-b-4 outline-0 rounded-md py-1 w-full" />
                            <div v-if="$page.props.errors.email" class="text-red-600">
                                {{ $page.props.errors.email }}
                            </div>
                            <br />
                            <label class="font-medium mt-6 mb-2 text-sm block">Password</label>

                            <input type="password" v-model="form.password"
                                class="border-2 border-standardPurple border-b-4 outline-0 rounded-md py-1 w-full" />
                            <div v-if="$page.props.errors.password" class="text-red-600">
                                {{ $page.props.errors.password }}
                            </div>

                            <div v-if="data" class="text-red-600">
                                {{ data.original.message }}
                            </div>
                            <br />
                            <button type="submit"
                                class="mt-8 mb-8 bg-standardPurple text-white py-4 uppercase text-sm font-bold w-full rounded-md tracking-space"
                                :disabled="form.processing">
                                login
                            </button>
                        </form>
                        <p>Don't have an account?
                            <Link :href="route('show.register.page')" class="text-red">Register Here</Link>
                        </p>
                    </div>
                </div>
            </div>
            <!-- <div v-if="{ status }" class="text-red-700"> -->


            <!-- </div> -->
        </div>

    </main>
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