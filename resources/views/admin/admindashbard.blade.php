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
                        <tr
                        class="text-white border-b">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-white whitespace-nowrap">
                            {{$blog->id}}
                        </th>
                        <td class="px-6 py-4">
                            <a class="underline underline-offset-2 hover:text-blue-300" href="/blogs/{{$blog->slug}}">{{$blog->title}}</a>
                        </td>
                        <td class="px-6 py-4 md:table-cell hidden">
                            {{$blog->category->name}}
                        </td>
                        <td class="flex md:flex-row flex-col px-6 py-4 gap-2">
                            <a class="border px-2 text-center p-1 bg-blue-700 rounded-md" href="">Edit</a>
                            <a class="border px-2 p-1 bg-red-600 rounded-md text-center" href="">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="my-3">
                {{$blogs->links()}}
            </div>
        </div>

    </div>
</x-admin-layout>
