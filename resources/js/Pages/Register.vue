<template>
    <div class="sm:px-8 sm:py-8 w-full h-full text-standardPurple h-screen">
        <div class="sm:flex bg-[url('./img/authentication.svg')] bg-no-repeat bg-cover px-8 py-8 sm:bg-none">
            <div class="content w-3/5 sm:flex items-center justify-center">
                <div class="sm:flex sm:flex-col">
                    <div
                        class="avartar mx-auto flex bg-standardPurple w-20 h-20 rounded-full items-center justify-center uppercase mb-6">
                        <p class="text-white">logo</p>
                    </div>

                    <h2 class="font-bold text-center mt-8">Create Account</h2>
                    <p class="italic text-center">
                        Enter the fields below to get started
                    </p>
                    <form class="sm:w-formWidth m-auto">
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
                            class="mt-8 mb-8 bg-standardPurple text-white py-4 uppercase text-sm font-bold w-full rounded-md tracking-space">
                            sign up
                        </button>
                    </form>
                </div>
            </div>
            <div class="flex items-stretch logo hidden sm:flex">
                <img src="../../images/authentication.svg" alt="" class="w-3/5 h-full rounded-lg" />
            </div>
        </div>
    </div>
</template>