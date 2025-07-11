@props(['blogs'])


<section>
    <h1 class="md:text-4xl text-3xl text-center text-white mb-7">Blogs</h1>

    <x-categorydropdown />

        <form class="relative md:px-20 sm:px-15 px-5 mt-5 gap-3" action="">
            @if (request('username'))
                <input type="hidden" value="{{request('username')}}" name="username">
            @endif
            @if (request('category'))
                <input type="hidden" value="{{request('category')}}" name="category">
            @endif
            <input value="{{request('search')}}" name="search" class="text-white border-white bg-transparent w-full rounded-xl" type="text" name="" id="">
            <input class="border absolute md:right-[84px] bg-blue-700 right-[23px] top-[4px] px-5 py-1 text-white rounded-lg hover:bg-blue-800" type="submit" value="Search..">
        </form>

    <div class="lg:mx-20 md:mx-20 mx-5 mb-12 mt-8">
        <div class="grid lg:grid-cols-3 md:grid-cols-2 mb-10 justify-items-center gap-3">
            @foreach ($blogs as $blog)
                <x-blog-card :blog="$blog" />
            @endforeach

        </div>

        <div class="px-15">
            {{$blogs->links()}}
        </div>
    </div>
</section>
