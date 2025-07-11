<x-layout>
    <h1 class="text-white text-xl border py-2 rounded-md mx-auto bg-white/30 w-[250px] text-center mt-5">{{$title}}</h1>
    <div class="grid grid-cols-12 border rounded-lg mx-10 mt-5 mb-10">
        <div class="col-span-2 text-center mt-1">
            <ul>
                <a  href="/admin/dashboard"><li class="border m-2 py-2 text-white text-sm rounded-lg hover:bg-blue-700">
                    <span class="md:block hidden">Dashboard</span>
                    <span class="md:hidden"><i class="fa-solid fa-user-tie"></i></span>
                </li></a>
                <a  href="/admin/blog/create"><li class="border m-2 py-2 text-white text-sm rounded-lg hover:bg-blue-700">Create</li></a>
                <a  href=""><li class="border m-2 py-2 text-white text-sm rounded-lg hover:bg-blue-700">Profile</li></a>
                <a  href=""><li class="border m-2 py-2 text-white text-sm rounded-lg hover:bg-blue-700">Users</li></a>

            </ul>
        </div>
        <div class="col-span-10 my-3 me-3 ms-1">
            <div class="border rounded-lg">
                {{$slot}}
            </div>
        </div>
    </div>
</x-layout>
