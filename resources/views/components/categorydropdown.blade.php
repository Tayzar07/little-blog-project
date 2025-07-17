@props(['categories','currentCategory'=>null])


<div class="relative block text-left md:w-[250px] w-[200px] mx-auto">
    <!-- Dropdown Button -->
    <button id="categoryDropdownBtn"
        class="border md:w-[250px] w-[200px] {{$currentCategory?"bg-blue-700":"bg-white/30"}} md:text-lg text-md cursor-pointer text-white px-5 py-2 rounded">
        <span>{{$currentCategory ? $currentCategory->name : "categories"}}</span><i class="ms-3 fa-solid fa-angle-down"></i>
    </button>

    <!-- Category Dropdown Menu -->
    <div id="categoryDropdown"
        class="hidden z-10 text-white absolute mt-2 md:w-[250px] w-[200px] bg-white/30 backdrop-blur-lg border rounded shadow z-12">
            <a href="/" class="block px-4 py-2 border border-transparent hover:border-white rounded m-1">All</a>
        @foreach ($categories as $category)
            <a href="/?category={{$category->slug}}{{request('username')?"&username=".request('username'):" "}}{{request('search')?"&search=".request('search'):" "}}" class="block px-4 py-2 border border-transparent hover:border-white rounded m-1">{{$category->name}}</a>
        @endforeach
    </div>
</div>
