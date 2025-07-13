@props(['comments'])

<div class="mt-3 p-3">
    @if ($comments->count())
        <h1 class="w-[71%] mx-auto text-lg text-gray-300 mb-5">comments - ( {{ count($comments) }} )</h1>
    @endif
    @forelse ($comments as $comment)
        <div class="w-[71%] mx-auto rounded-md bg-white/10 shadow-lg border mb-5 p-5">
            <div class="flex justify-between">
                <div class="flex items-center space-x-3">
                    <img class="rounded-full w-[50px] bg-white/20 border p-1"
                        src="https://i.pinimg.com/474x/18/b9/ff/18b9ffb2a8a791d50213a9d595c4dd52.jpg" alt="">
                    <div>
                        <h1 class="text-white ">{{ $comment->user->name }}</h1>
                        <p class="text-gray-300 text-sm">{{ $comment->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                @if (auth()->user()->isAdmin)
                    <div>
                        {{-- delete popup modal button --}}
                        <button class="openDeleteModal2 border text-white text-sm px-2 text-center p-1 bg-red-600 rounded-md"
                            data-id="{{ $comment->id }}" data-body="{{ $comment->body }}">
                            Delete
                        </button>
                    </div>
                @endif
            </div>
            <div class="mt-3 text-white">{{ $comment->body }}</div>
        </div>
    @empty
        <h1 class="text-gray-300 mt-5 text-lg md:text-2xl text-center">No comments yet !!</h1>
    @endforelse
    {{ $comments->links() }}

    <!-- Reusable Modal -->
    <div id="deleteModal2" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
        <div class="bg-white/30 w-[400px] backdrop-blur-sm p-6 rounded-lg w-96 shadow">
            <h2 class="text-lg font-semibold text-white mb-4">Confirm Delete ?</h2>
            <p class="text-white mb-6" id="deleteMessage2">Are you sure?</p>
            <div class="flex justify-end space-x-2">
                <button id="cancelDelete2" class="border hover:bg-gray-500 px-4 py-1 rounded text-white">Cancel</button>
                <form id="deleteForm2" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="border text-white bg-red-600 hover:bg-red-700 px-4 py-1 rounded">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
