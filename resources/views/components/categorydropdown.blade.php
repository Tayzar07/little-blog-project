@props(['categories'])


<div class="relative block text-left md:w-[180px] w-[150px] mx-auto">
    <!-- Dropdown Button -->
    <button id="categoryDropdownBtn"
        class="border md:w-[180px] w-[150px] bg-white/30 md:text-lg text-md cursor-pointer text-white px-5 py-2 rounded">
        <span>Categories</span><i class="ms-3 fa-solid fa-angle-down"></i>
    </button>

    <!-- Dropdown Menu -->
    <div id="categoryDropdown"
        class="hidden z-10 text-white absolute mt-2 md:w-[180px] w-[150px] bg-gray-400 backdrop-blur-sm border rounded shadow z-12">
        @foreach ($categories as $category)
            <a href="/?category={{$category->slug}}" class="block px-4 py-2 border border-transparent hover:border-white rounded m-1">{{$category->name}}</a>
        @endforeach
    </div>
</div>
