<x-admin-layout title="Create Blog">
    <div class="rounded-lg p-5 pe-7 w-4/5 mx-auto bg-white/10 backdrop-blur-sm my-[30px]">

            <form action="{{ route('register') }}" class="flex flex-col gap-3" method="post">
                @csrf
                <div>
                    <label class="text-white ms-1" for="">Title</label>
                    <input name="title" class="border bg-white/10 border-white text-white rounded-lg m-1 px-3 py-2 w-full placeholder-gray-300"
                        placeholder="blog title..." type="text">
                    @error('title')
                        <p class="text-red-400 ms-2 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="text-white ms-1" for="">Blog Slug</label>
                    <input name="slug" class="border bg-white/10 border-white text-white rounded-lg m-1 px-3 py-2 w-full  placeholder-gray-300" placeholder="slug001"
                        type="text">
                    @error('slug')
                        <p class="text-red-400 ms-2 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="text-white ms-1" for="">Info</label>
                    <input name="info" class="border bg-white/10 border-white text-white rounded-lg m-1 px-3 py-2 w-full placeholder-gray-300"
                        placeholder="info of blog" type="text">
                    @error('info')
                        <p class="text-red-400 ms-2 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="text-white ms-1" for="">Category</label>
                    <select class="border border-white bg-white/10 rounded-lg text-white m-1 px-3 py-2 w-full" name="category_id" id="">
                        <option class="text-white bg-gray-500" value="">Select Category</option>
                        <option class="text-white bg-gray-500" value="">Laravel</option>
                        <option class="text-white bg-gray-500" value="">React</option>
                        <option class="text-white bg-gray-500" value="">Vue</option>
                    </select>
                    @error('category_id')
                        <p class="text-red-400 ms-2 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="text-white ms-1" for="">Body</label>
                    <div>
                        <textarea class="border bg-white/10 border-white text-white rounded-lg m-1 px-3 py-2 w-full placeholder-gray-300" name="body" id="editor" cols="50" rows="10"></textarea>
                    </div>
                    @error('body')
                        <p class="text-red-400 ms-2 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="text-white ms-1" for="">Thumbnail</label>
                    <input type="file" class="border file:bg-white/10 file:border-white file:rounded-lg file:text-white bg-white/10 border-white text-white rounded-lg m-1 px-3 py-2 w-full placeholder-gray-300" name="thumbnail" id="">
                    @error('thumbnail')
                        <p class="text-red-400 ms-2 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <input class="border mt-3 self-end bg-blue-700 w-[100px] rounded-lg m-1 px-3 py-2 text-white hover:bg-blue-600 cursor-pointer"
                    type="submit" value="Create">
            </form>

        </div>
</x-admin-layout>
