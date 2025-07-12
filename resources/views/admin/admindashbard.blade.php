@props(['blogs'])

<x-admin-layout title="Admin Dashboard">
    <div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-white uppercase bg-white/30 border-b">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3 hidden md:block">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog)
                        <tr class="text-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap">
                                {{ $blog->id }}
                            </th>
                            <td class="px-6 py-4">
                                <a class="underline underline-offset-2 hover:text-blue-300"
                                    href="/blogs/{{ $blog->slug }}">{{ $blog->title }}</a>
                            </td>
                            <td class="px-6 py-4 md:table-cell hidden">
                                {{ $blog->category->name }}
                            </td>
                            <td class="flex md:flex-row flex-col px-6 py-4 gap-2">
                                <a class="border px-2 text-center p-1 bg-blue-700 rounded-md" href="/admin/blogs/{{$blog->slug}}/edit">Edit</a>

                                {{-- delete popup modal button --}}
                                <button class="openDeleteModal border px-2 text-center p-1 bg-red-600 rounded-md"
                                    data-slug="{{ $blog->slug }}" data-name="{{ $blog->title }}">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach

                    <!-- Reusable Modal -->
                    <div id="deleteModal"
                        class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
                        <div class="bg-white/30 backdrop-blur-sm p-6 rounded-lg w-96 shadow">
                            <h2 class="text-lg font-semibold text-white mb-4">Confirm Delete ?</h2>
                            <p class="text-white mb-6" id="deleteMessage">Are you sure?</p>
                            <div class="flex justify-end space-x-2">
                                <button id="cancelDelete"
                                    class="border hover:bg-gray-500 px-4 py-2 rounded text-white">Cancel</button>
                                <form id="deleteForm" method="POST" action="{{route('blog.destroy',$blog->slug)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="border text-white bg-red-600 hover:bg-red-700 px-4 py-2 rounded">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </tbody>
            </table>

            <div class="my-3">
                {{ $blogs->links() }}
            </div>
        </div>

    </div>
</x-admin-layout>
