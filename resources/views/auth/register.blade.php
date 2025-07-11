<x-layout>
    <section>
        <div class="rounded-lg p-5 pe-7 md:w-[450px] w-[350px] mx-auto bg-white/10 backdrop-blur-sm my-[60px]">
            <h1 class="text-white text-center mb-5 md:text-2xl text-lg ">Create an account</h1>
            <form action="{{ route('register') }}" class="flex flex-col gap-3" method="post">
                @csrf
                <div>
                    <label class="text-white ms-1" for="">Name</label>
                    <input name="name" class="border rounded-lg m-1 px-3 py-2 w-full placeholder-gray-300"
                        placeholder="full name..." type="text">
                    @error('name')
                        <p class="text-red-400 ms-2 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="text-white ms-1" for="">User Name</label>
                    <input name="username" class="border rounded-lg m-1 px-3 py-2 w-full  placeholder-gray-300" placeholder="name123..."
                        type="text">
                    @error('username')
                        <p class="text-red-400 ms-2 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="text-white ms-1" for="">Email</label>
                    <input name="email" class="border rounded-lg m-1 px-3 py-2 w-full placeholder-gray-300"
                        placeholder="email@example.com" type="text">
                    @error('email')
                        <p class="text-red-400 ms-2 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="text-white ms-1" for="">Password</label>
                    <div class="relative">
                        <input name="password" id="password"
                            class="border w-full rounded-lg m-1 px-3 py-2  placeholder-gray-300"
                            placeholder="password..." type="password">
                        <button type="button" id="togglePassword"
                            class="absolute inset-y-0 right-0 px-4 text-sm text-gray-400 hover:text-blue-600 focus:outline-none">
                            Show
                        </button>
                    </div>
                    @error('password')
                        <p class="text-red-400 ms-2 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="text-white ms-1" for="">Confirm Password</label>
                    <div class="relative">
                        <input name="password_confirmation" id="confirmPassword"
                            class="border w-full rounded-lg m-1 px-3 py-2 placeholder-gray-300"
                            placeholder="confirm password..." type="password">
                        <button type="button" id="toggleConfirmPassword"
                            class="absolute inset-y-0 right-0 px-4 text-sm text-gray-400 hover:text-blue-600 focus:outline-none">
                            Show
                        </button>
                    </div>
                    @error('password_confirmation')
                        <p class="text-red-400 ms-2 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <input class="border mt-3 w-full rounded-lg m-1 px-3 py-2 text-white hover:bg-blue-600 cursor-pointer"
                    type="submit" value="Register">
            </form>
            <div class="mt-3">
                <p class="text-center text-white">Already have an account? <a href="/login"
                        class="text-blue-700 underline underline-offset-2 hover:text-blue-600">Log in</a></p>
            </div>
        </div>
    </section>
</x-layout>
