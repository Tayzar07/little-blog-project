@props(['adminlist'])

<x-admin-layout title="Admin List">
    <div>
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
                    @foreach ($adminlist as $admin)
                        <tr class="text-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap">
                                {{ $admin->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{$admin->name}}
                            </td>
                            <td class="flex md:flex-row flex-col px-6 py-4 gap-2">
                                <a class="border px-2 text-center p-1 bg-blue-700 rounded-md" href="/admin/adminlist/{{$admin->username}}/changeToUser">Change to User</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
