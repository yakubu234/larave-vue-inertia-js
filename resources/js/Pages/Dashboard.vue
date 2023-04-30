<template>
    <div class="w-full">
        <div class="flex min-h-screen">
            <!-- side bar -->
            <div class="w-1/5 bg-blue-300">
                <!-- avartar -->
                <div class="flex items-center justify-center mt-8">
                    <div
                        class="avartar flex bg-standardPurple w-20 h-20 rounded-full items-center justify-center uppercase">
                        <p class="text-white">logo</p>
                    </div>
                    <h4 class="text-standardPurple font-bold ml-6">Biometric Page</h4>
                </div>

                <!-- dashboard -->
                <div class="w-full bg-standardPurple">
                    <span class="font-bold text-white ml-6 block py-3 mt-top80">Dashboard</span>
                </div>
            </div>
            <div class="w-4/5 px-profilePadX py-profilePadY">
                <h2 class="text-standardPurple font-bold text-xl mb-6">Profile</h2>
                <div class="font-bold flex items-center justify-between text-white block py-3 px-6 bg-standardPurple">
                    welcome, ABIOLA
                    <button class="bg-white font-bold text-standardPurple py-1 px-3 rounded-sm">
                        Logout
                    </button>
                </div>
                <p class="italic text-standardPurple mt-4 mb-6">
                    Enter the fields below to get started
                </p>

                <form class="">
                    <label class="font-medium mt-6 mb-2 text-sm block">Full Name</label>

                    <input type="text"
                        class="border-2 border-standardPurple border-b-4 outline-0 rounded-md py-1 px-3 w-full" />
                    <br />
                    <label class="font-medium mt-6 mb-2 text-sm block">Email</label>

                    <input type="email"
                        class="border-2 border-standardPurple border-b-4 outline-0 rounded-md py-1 w-full" />
                    <br />
                    <label class="font-medium mt-6 mb-2 text-sm block">Password</label>

                    <input type="password"
                        class="border-2 border-standardPurple border-b-4 outline-0 rounded-md py-1 w-full" />
                    <br />
                    <label class="font-medium mt-6 mb-2 text-sm block">Confirm Password</label>

                    <input type="password"
                        class="border-2 border-standardPurple border-b-4 outline-0 rounded-md py-1 w-full" />
                    <br />
                    <button type="submit"
                        class="mt-8 mb-8 bg-standardPurple text-white py-4 px-3 uppercase text-sm font-bold rounded-md">
                        update details
                    </button>

                    <button type="submit"
                        class="block mb-8 bg-white text-red-300 border-red-300 border-2 py-4 px-3 uppercase text-sm font-bold rounded-md">
                        delete my account
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>