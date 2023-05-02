<template>
    <div class="bg-blue-500 py-4 px-4 flex items-center justify-between md:hidden">
        <!-- navbar starts here -->
        <div class="hamburger bg-standardPurple rounded-full py-1 px-1 cursor-pointer" ref="hamburger" @click="openMenu">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#FFF" class="bi bi-list"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
            </svg>
        </div>
        <div class="logout" @click="logout()">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#190B6F"
                class="bi bi-arrow-bar-left cursor-pointer" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5ZM10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5Z" />
            </svg>
        </div>
    </div>
    <div class="flex min-h-screen">
        <!-- side bar -->
        <div class="w-0 md:w-1/5 bg-blue-300 md:block md:static h-screen sidebar fixed top-0 left-0 z-10 h-full overflow-x-hidden transition ease-in-out delay-150"
            ref="sidebar">
            <div class="closebutton absolute right-3 top-2 cursor-pointer md:hidden" ref="closebutton" @click="closeMenu">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#190B6F" class="bi bi-x-lg"
                    viewBox="0 0 16 16">
                    <path
                        d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                </svg>
            </div>
            <!-- avartar -->
            <div class="flex items-center flex-col md:flex md:flex-row px-4 mt-8">
                <div class="avartar flex bg-standardPurple w-20 h-20 rounded-full items-center justify-center uppercase">
                    <p class="text-white">logo</p>
                </div>
                <h4 class="text-standardPurple font-bold ml-6">Biometric Page</h4>
            </div>

            <!-- dashboard -->
            <div class="w-full bg-standardPurple">
                <span class="font-bold text-white ml-6 block py-3 mt-top80">Dashboard</span>
            </div>
            <!-- dashboard -->
            <div class="w-full bg-standardPurple">
                <Link :href="route('show.update.password')">

                <span class="font-bold text-white ml-6 block py-3 mt-top20">Update Password</span>
                </Link>
            </div>
        </div>
        <div class="w-full flex justify-center">
            <div class="w-3/5 mt-12">
                <h2 class="text-standardPurple font-bold text-xl mb-6 hidden md:block">
                    Profile
                </h2>
                <p class="text-standardPurple text-sm text-center italic md:hidden">
                    Welcome
                </p>
                <h2 class="text-standardPurple font-bold text-xl mb-6 text-center md:hidden">
                    {{ form.name }}
                </h2>
                <p class="italic text-standardPurple mt-6 text-center md:hidden">
                    Edit your details here
                </p>
                <div
                    class="font-bold flex items-center justify-between text-white block py-3 px-6 bg-standardPurple hidden md:flex">
                    welcome, {{ form.name }}
                    <button type="button" @click="logout"
                        class="bg-blue-300 font-bold text-standardPurple py-1 px-3 rounded-sm">
                        Logout
                    </button>
                </div>

                <span v-if="message" class="text-red-600">
                    {{ message }}
                </span>

                <p class="italic text-standardPurple mt-4 mb-6 hidden md:block">
                    Enter the fields below to get started
                </p>

                <form class="" @submit.prevent="form.put(route('update'))">
                    <label class="font-medium mt-6 mb-2 text-sm block">Full Name</label>

                    <input type="text" name="name" v-model="form.name"
                        class="border-2 border-standardPurple border-b-4 outline-0 rounded-md py-1 px-3 w-full" />
                    <span v-if="$page.props.errors.name" class="text-red-600">
                        {{ $page.props.errors.name }}
                    </span>
                    <br />
                    <label class="font-medium mt-6 mb-2 text-sm block">Email</label>

                    <input type="email" readonly v-model="form.email"
                        class="border-2 border-standardPurple border-b-4 outline-0 rounded-md py-1 px-3 w-full" />
                    <span v-if="$page.props.errors.email" class="text-red-600">
                        {{ $page.props.errors.email }}
                    </span>
                    <br />
                    <label class="font-medium mt-6 mb-2 text-sm block">Password</label>

                    <input type="password" placeholder="**********" v-model="form.password"
                        class="border-2 border-standardPurple border-b-4 outline-0 rounded-md py-1 px-3 w-full" />
                    <span v-if="$page.props.errors.password" class="text-red-600">
                        {{ $page.props.errors.password }}
                    </span>
                    <br />
                    <button type="submit"
                        class="mt-8 mb-8 bg-standardPurple text-white py-4 px-3 uppercase text-sm font-bold rounded-md w-full md:w-2/5">
                        update details
                    </button>

                </form>

                <button type="button" @click="destroy(data.original.data.user_details.id)"
                    class="block mb-8 bg-white text-red-300 border-red-300 border-2 py-4 px-3 uppercase text-sm font-bold rounded-md w-full md:w-2/5">
                    delete my account
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import { computed, ref } from 'vue'
import { Inertia } from "@inertiajs/inertia";
import { Head, useForm, Link, usePage } from '@inertiajs/vue3';


export default {
    components: {
        Head, useForm, Link, usePage
    }, props: ['data'],
    setup(props) {


        const message = props.data.original.message;

        const form = useForm({
            name: props.data.original.data.user_details.name || "",
            email: props.data.original.data.user_details.email || "",
            password: "",

        })

        const destroy = (id) => {
            if (confirm('Are you sure?')) {
                Inertia.delete(route("delete", id));
            }
        }

        const logout = () => {
            if (confirm('Are you sure?')) {
                Inertia.post(route("logout"));
                // Inertia.get(route('show.login.page'));
            }
        }

        // some data refs
        const hamburger = ref(null);
        const sidebar = ref(null);
        const closebutton = ref(null);

        // sidebar responsiveness
        // open sidebar
        function openMenu() {
            sidebar.value.classList.add("w-3/5");
        }
        // close sidebar
        function closeMenu() {
            sidebar.value.classList.remove("w-3/5");
        }



        return { form, destroy, message, sidebar, hamburger, closebutton, openMenu, closeMenu, logout }
    }
}

</script>