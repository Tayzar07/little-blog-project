@props(['blog'])

<x-layout>

    <div>
        <div class="w-[70%] mx-auto rounded-md overflow-hidden bg-white/10 shadow-lg border p-3">
            <img class="w-[50%] mx-auto rounded-md"
                src="https://t4.ftcdn.net/jpg/03/16/45/77/360_F_316457746_jcEMNJy3LRoH8XwmQ4bozIOlCdji9uSi.jpg"
                alt="Sunset in the mountains">
            <div class="px-6 py-4">
                <div class="font-bold text-white text-3xl mb-2 text-center mb-5">{{$blog->title}}</div>
                <p class="text-gray-200 text-base">
                    {{$blog->body}}
                </p>
            </div>
            <div class="flex items-center justify-between border rounded-md mt-5">
                <div class="px-6 pt-3 pb-2 text-center">
                <span
                    class="inline-block bg-white/30 rounded-full px-3 py-1 font-semibold text-white mr-2 mb-2">{{$blog->category->name}}</span>
            </div>
            <div class="px-6 pb-3">
                <p class="text-white ">Written By - <span><a
                            class="underline underline-offset-2 text-blue-800 hover:text-white"
                            href="">{{$blog->author->name}}</a></span></p>
            </div>
            </div>
        </div>
    </div>
</x-layout>
