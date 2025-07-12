<header class="sticky top-2 z-10">
    <nav class="m-2 backdrop-blur-sm bg-white/20 py-3 rounded-md sm:px-[70px] px-[30px]">
        <div class="flex justify-between items-center ">
            <h1 class="sm:text-3xl text-xl rounded-md p-2 px-5 text-white border bg-blue-700"><a
                    href="/">TechNest</a></h1>
            <div class="flex items-center">
                @auth
                    <div class="hidden sm:block">
                        @if (auth()->user()->avatar)
                            <img class="rounded-full lg:w-[50px] w-[40px] bg-white/20 me-3 border p-1"
                                src="/storage/{{ auth()->user()->avatar }}" alt="">
                        @else
                            <img class="rounded-full lg:w-[50px] w-[40px] bg-white/20 me-3 border p-1"
                                src="/storage/default-photos/default-profile.jpg" alt="">
                        @endif
                    </div>
                @endauth
                <ul class="md:flex mx-3 items-center hidden space-x-3">
                    <li><a class="text-white border border-transparent hover:border-white p-4 py-2 rounded-md text-lg"
                            href="/">Home</a></li>
                    @auth
                        @if (auth()->user()->isAdmin)
                            <li><a class="text-white border border-transparent hover:border-white p-4 py-2 rounded-md text-lg"
                                    href="/admin/dashboard">Dashboard</a>
                            </li>
                        @else
                            <li><a class="text-white border border-transparent hover:border-white p-4 py-2 rounded-md text-lg"
                                    href="/profile">Profile</a>
                            </li>
                        @endif
                        <li>
                            <div
                                class="text-white border border-transparent hover:border-white p-4 py-2 rounded-md text-lg">
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit">Logout</button>
                                </form>
                            </div>
                        </li>
                    @else
                        <li><a class="text-white border border-transparent hover:border-white p-4 py-2 rounded-md text-lg"
                                href="/register">Register</a>
                        </li>
                        <li><a class="text-white border border-transparent hover:border-white p-4 py-2 rounded-md text-lg"
                                href="/login">Login</a></li>
                    @endauth


                </ul>

                {{-- humberger dropdown menu --}}

                <div class="relative inline-block text-left">
                    <!-- Dropdown Button -->
                    <button id="dropdownBtn"
                        class="border md:hidden cursor-pointer text-white px-4 py-2 rounded hover:bg-gray-400">
                        <i class="fa-solid sm:text-lg fa-bars"></i>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="dropdownMenu"
                        class="hidden text-white absolute right-0 mt-2 w-40 bg-gray-400 backdrop-blur-sm border rounded shadow z-12">
                        <a href="/"
                            class="block px-4 py-2 border border-transparent hover:border-white rounded m-1">Home</a>

                        @auth
                            @if (auth()->user()->isAdmin)
                                <a href="/admin/dashboard"
                                    class="block px-4 py-2 border border-transparent hover:border-white rounded m-1">Dashdboard</a>
                            @else
                                <a href="/profile"
                                    class="block px-4 py-2 border border-transparent hover:border-white rounded m-1">Profile</a>
                            @endif
                            <div class="block px-4 py-2 border border-transparent hover:border-white rounded m-1">
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit">Logout</button>
                                </form>
                            </div>
                        @else
                            <a href="/register"
                                class="block px-4 py-2 border border-transparent hover:border-white rounded m-1">Register</a>
                            <a href="/login"
                                class="block px-4 py-2 border border-transparent hover:border-white rounded m-1">Login</a>
                        @endauth


                    </div>
                </div>
            </div>

        </div>
    </nav>
</header>
