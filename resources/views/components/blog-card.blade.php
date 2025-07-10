@props(['blog'])
<div>
    <div class="max-w-sm rounded-md overflow-hidden bg-white/10 shadow-lg border p-3">
        <img class="w-full rounded-md"
            src="https://t4.ftcdn.net/jpg/03/16/45/77/360_F_316457746_jcEMNJy3LRoH8XwmQ4bozIOlCdji9uSi.jpg"
            alt="Sunset in the mountains">
        <div class="px-6 py-4">
            <div class="font-bold text-white text-xl mb-2">{{ $blog->title }}</div>
            <p class="text-gray-200 text-base">
                {{ $blog->info }}
            </p>
        </div>
        <div class="px-6 pt-3 pb-2">
            <span
                class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $blog->category->name }}</span>

        </div>
        <div class="px-6 pb-3">
            <p class="text-white ">Written By - <span><a
                        class="underline underline-offset-2 text-blue-800 hover:text-white"
                        href="/?username={{$blog->author->username}}">{{ $blog->author->name }}</a></span></p>
        </div>
        <div class="text-center px-6">
            <a href="/blogs/{{ $blog->slug }}"><button
                    class="border w-full px-2 py-1 text-white rounded-full bg-white/30 hover:bg-blue-700">Read More</button></a>

        </div>
    </div>
</div>
