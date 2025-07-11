@props(['comments'])

<div class="mt-3 p-3">
    @if ($comments->count())
        <h1 class="w-[71%] mx-auto text-lg text-gray-300 mb-5">comments - ( {{count($comments)}} )</h1>
    @endif
    @forelse ($comments as $comment)
        <div class="w-[71%] mx-auto rounded-md bg-white/10 shadow-lg border mb-5 p-5">
            <div class="flex items-center space-x-3">
                <img class="rounded-full w-[50px] bg-white/20 border p-1"
                    src="https://i.pinimg.com/474x/18/b9/ff/18b9ffb2a8a791d50213a9d595c4dd52.jpg" alt="">
                <div>
                    <h1 class="text-white ">{{$comment->user->name}}</h1>
                    <p class="text-gray-300 text-sm">{{$comment->created_at->diffForHumans()}}</p>
                </div>
            </div>
            <div class="mt-3 text-white">{{$comment->body}}</div>
        </div>
        @empty
        <h1 class="text-gray-300 mt-5 text-lg md:text-2xl text-center">No comments yet !!</h1>
    @endforelse
    {{$comments->links()}}
</div>
