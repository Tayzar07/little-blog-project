<x-layout>
    <section>
        <div class="border rounded-lg p-5 pe-7 md:w-[450px] w-[350px] mx-auto bg-white/10 backdrop-blur-sm my-[110px]">
            <h1 class="text-white text-center mb-5 md:text-3xl text-2xl">Login</h1>
            <form action="{{ route('login') }}" class="flex flex-col gap-3" method="post">
                @csrf
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
                        <input id="password" name="password"
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

                <!-- Remember Me -->
                <div class="flex items-center ms-1">
                    <input id="remember" name="remember" type="checkbox" class="h-4 w-4 border rounded-lg focus:">
                    <label for="remember" class="ml-2 block text-sm text-white">
                        Remember me
                    </label>
                </div>

                <input
                    class="border mt-3 w-full rounded-lg m-1 px-3 py-2 text-white text-lg hover:scale-102 cursor-pointer"
                    type="submit" value="Login">
            </form>
            <div class="mt-3">
                <p class="text-center text-white">Don't have an account?<a href="/register"
                        class="text-blue-700 ms-2 underline underline-offset-2 hover:text-blue-600">Sign up</a></p>
            </div>
        </div>
    </section>
</x-layout>



























