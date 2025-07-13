@props(['userlist'])
<x-admin-layout title="User List">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-white uppercase bg-white/30 border-b">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userlist as $user)
                        <tr class="text-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap">
                                {{ $user->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{$user->name}}
                            </td>
                            <td class="flex md:flex-row flex-col px-6 py-4 gap-2">
                                <a class="border px-2 text-center p-1 bg-blue-700 rounded-md" href="/admin/adminlist/{{$user->username}}/changeToAdmin">Promote</a>

                                {{-- delete popup modal button --}}
                                <button class="openDeleteModal1 border px-2 text-center p-1 bg-red-600 rounded-md"
                                    data-username="{{ $user->username }}" data-name="{{ $user->name }}">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach

                    <!-- Reusable Modal -->
                    <div id="deleteModal1"
                        class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
                        <div class="bg-white/30 backdrop-blur-sm p-6 rounded-lg w-96 shadow">
                            <h2 class="text-lg font-semibold text-white mb-4">Confirm Delete ?</h2>
                            <p class="text-white mb-6" id="deleteMessage1">Are you sure?</p>
                            <div class="flex justify-end space-x-2">
                                <button id="cancelDelete1"
                                    class="border hover:bg-gray-500 px-4 py-2 rounded text-white">Cancel</button>
                                <form id="deleteForm1" method="POST" action="">
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
                {{ $userlist->links() }}
            </div>
        </div>
</x-admin-layout>
