@props(['category'])
<x-admin-layout title="Category Edit">
    <div>
        <div class="border rounded-lg p-5 pe-7 w-[90%] mx-auto bg-white/10 backdrop-blur-sm my-10">

            <form action="/admin/categories/{{$category->slug}}/update" class="flex flex-col gap-3" method="post">
                @csrf
                <div>
                    <label class="text-white ms-1" for="">Category</label>
                    <input name="name"
                        class="border rounded-lg m-1 px-3 bg-transparent text-white border-white py-2 w-full placeholder-gray-300"
                        placeholder="" type="text" value="{{old('name',$category->name)}}">
                    @error('name')
                        <p class="text-red-400 ms-2 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="text-white ms-1" for="">Category Slug</label>
                    <input name="slug"
                        class="border rounded-lg m-1 px-3 bg-transparent text-white border-white py-2 w-full placeholder-gray-300"
                        placeholder="" type="text" value="{{old('slug',$category->slug)}}">
                    @error('slug')
                        <p class="text-red-400 ms-2 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <input
                    class="border mt-3 w-full bg-blue-700 rounded-lg m-1 px-3 py-2 text-white text-lg hover:bg-blue-800 cursor-pointer"
                    type="submit" value="Update">
            </form>
        </div>
    </div>
</x-admin-layout>
