<x-layout>

    {{-- success message --}}
    <x-success-msg />

    <h1 class="text-white text-xl border py-2 rounded-md mx-auto bg-white/30 w-[250px] text-center mt-5">
        {{ $title }}</h1>
    <div class="grid grid-cols-12 border rounded-lg mx-10 mt-5 mb-10">
        <div class="col-span-2 text-center mt-1">
            <ul class="bg-transparent">
                <a href="/admin/dashboard">
                    <li
                        class=" {{ request()->is('admin/dashboard') ? 'bg-blue-700' : '' }} transition-all border m-2 py-2 text-white text-sm rounded-lg hover:bg-blue-700 ">
                        <span class="md:block hidden">Dashboard</span>
                        <span class="md:hidden"><i class="fa-solid fa-user-tie"></i></span>
                    </li>
                </a>
                <a href="/admin/blog/create">
                    <li class=" {{request()->is('admin/blog/create')?'bg-blue-700':''}}  border m-2 py-2 text-white text-sm rounded-lg hover:bg-blue-700">Blog Create</li>
                </a>
                <a href="/admin/categorylist">
                    <li class=" {{request()->is('admin/categorylist')?'bg-blue-700':''}}  border m-2 py-2 text-white text-sm rounded-lg hover:bg-blue-700">Category List</li>
                </a>
                <a href="/admin/category/create">
                    <li class=" {{request()->is('admin/category/create')?'bg-blue-700':''}}  border m-2 py-2 text-white text-sm rounded-lg hover:bg-blue-700">Create Category</li>
                </a>
                <a href="/admin/profile/edit">
                    <li class=" {{request()->is('admin/profile/edit')?'bg-blue-700':''}}  border m-2 py-2 text-white text-sm rounded-lg hover:bg-blue-700  ">Profile Edit</li>
                </a>
                <a href="/admin/adminlist">
                    <li class=" {{request()->is('admin/adminlist')?'bg-blue-700':''}}  border m-2 py-2 text-white text-sm rounded-lg hover:bg-blue-700">Admins</li>
                </a>
                <a href="/admin/userlist">
                    <li class=" {{request()->is('admin/userlist')?'bg-blue-700':''}}  border m-2 py-2 text-white text-sm rounded-lg hover:bg-blue-700">Users</li>
                </a>

            </ul>
        </div>
        <div class="col-span-10 my-3 me-3 ms-1">
            <div class="border rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-layout>
