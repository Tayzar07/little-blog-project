@props(['blog', 'randomblogs'])

<x-layout>

    {{-- success message --}}

    <x-success-msg />

    {{-- show blog section --}}

    <div>
        <div class="w-[70%] mx-auto rounded-md overflow-hidden mt-10 bg-white/10 shadow-lg border p-3">
            <img class="w-[50%] mx-auto rounded-md"
                src="{{$blog->thumbnail ? "/storage/$blog->thumbnail" : '/storage/default-photos/default-thumbnail.png'}}"
                alt="Sunset in the mountains">
            <div class="px-6 py-4">
                <div class="font-bold text-white text-3xl mb-2 text-center mb-5">{{ $blog->title }}</div>
                <div class="text-white">
                    {!! $blog->body !!}
                </div>
            </div>
            <div class="flex bg-white/20 items-baseline justify-between border rounded-md mt-5">
                <div class="px-6 pt-3 pb-2 text-center">
                    <a href="/?category={{ $blog->category->slug }}">
                        <span
                            class="inline-block bg-white/30 rounded-full px-3 py-1 font-semibold text-white mr-2 mb-2">{{ $blog->category->name }}</span>
                    </a>
                </div>
                <div class="px-6 pb-3">
                    <p class="text-white ">Written By - <span><a
                                class="underline underline-offset-2 text-blue-800 hover:text-white"
                                href="/?username={{ $blog->author->username }}">{{ $blog->author->name }}</a></span></p>
                </div>
            </div>
        </div>
    </div>

    {{-- subscribe button --}}

    @auth
        <div class="text-center w-[70%] mx-auto rounded-md bg-white/10 border p-4 mt-10"">

            <form method="POST" action="/blogs/{{ $blog->slug }}/subscription">
                @csrf
                @if (auth()->user()->isSubscribe($blog))
                    <h3 class="text-white md:text-2xl text-md mb-3">You have subscribed to this blog !!</h3>
                    <button
                        class="border px-4 md:text-md text-sm bg-red-700 py-2 text-white rounded-lg">Unsubscribe</button>
                @else
                    <h3 class="text-white md:text-2xl text-md mb-3">Subscribe here to get discussions about this blog !!
                    </h3>
                    <button class="border px-4 md:text-md text-sm bg-blue-700 py-2 text-white rounded-lg">Subscribe</button>
                @endif
            </form>
        </div>
    @else
        <div class="w-[70%] mx-auto rounded-md bg-white/10 border p-5 mt-10">
            <h3 class="text-white text-md md:text-xl text-center ">Please <a href="/login"
                    class="underline underline-offset-2 text-blue-700">Login</a> to discuss about this blog !!</h3>
        </div>
    @endauth

    {{-- comment form --}}

    @auth
        <div class="mt-10 w-[70%] mx-auto border p-5 rounded-lg bg-white/10">
            <form method="POST" class="flex flex-col" action="/blogs/{{ $blog->slug }}/comment">
                @csrf
                <textarea name="body" placeholder="how do you think about this blog..."
                    class="placeholder-gray-300 bg-transparent border border-white text-white rounded-lg" name="" id=""
                    cols="30" rows="5">{{ request('body') }}</textarea>
                @error('body')
                    <p class="text-red-400 mt-1">{{ $message }}</p>
                @enderror
                <input type="submit"
                    class="cursor-pointer border w-[100px] self-end mt-3 text-white bg-blue-700 px-4 py-2 rounded-lg"
                    value="Submit">
            </form>
        </div>
    @endauth

    {{-- show comments --}}

    <x-comments :comments="$blog->comments()->latest()->paginate(3)" />

    <div class="lg:mx-20 md:mx-20 mx-5 mb-12 mt-8">
        <h1 class="text-white text-2xl md:text-4xl pt-5 pb-8 text-center">Blogs you may like</h1>
        <div class="grid lg:grid-cols-3 md:grid-cols-2 mb-10 justify-items-center gap-3">
            @foreach ($randomblogs as $blog)
                <x-blog-card :blog="$blog" />
            @endforeach

        </div>
    </div>
</x-layout>
