<x-app-layout>
<x-slot name="header">
</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4 text-right">
                        <a href="#" class="px-3 py-2 rounded-sm bg-green-300 text-green-800 text-sm font-bold">Add new URL</a>
                    </div>
                    <table class="w-full table-auto">
                        <thead>
                        <tr class="bg-blue-300 text-blue-800 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">ID</th>
                            <th class="py-3 px-6 text-left">Short Link</th>
                            <th class="py-3 px-6 text-left">Link</th>
                            <th class="py-3 px-6 text-left">Action</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">

                        @forelse ($links as $link)
                            <tr class="border-b border-gray-200 bg-gray-100 hover:bg-white duration-200 ease-in-out transform">
                                <td class="py-3 px-6 text-left whitespace-nowrap">{{ $link->id }}</td>
                                <td class="py-3 px-6 text-left font-semibold whitespace-nowrap"><a href="{{ route('shorten.link', $link->code) }}" target="_blank">{{ route('shorten.link', $link->code) }}</a></td>
                                <td class="py-3 px-6 text-left whitespace-nowrap">{{ $link->link }}</td>
                                <td class="py-3 px-6 flex justify-center space-x-4 items-center text-left whitespace-nowrap">
                                    <form method="post" action="{{ route('link.delete', $link->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="bg-red-300 text-red-800 text-xs p-1 rounded-sm font-bold">Delete</button>
                                    </form>
                                    <a href="#" class="p-1 rounded-sm bg-blue-300 text-blue-800 text-xs font-bold">Edit</a>
                                </td>
                            </tr>
                        @empty
                            <tr class="border-b border-gray-200 bg-gray-100 hover:bg-white duration-200 ease-in-out transform">
                                <td class="py-3 px-6 text-left whitespace-nowrap text-red-400 font-bold" colspan="4">
                                    <div class="flex space-x-8 items-center w-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-face-id-error" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M4 8v-2a2 2 0 0 1 2 -2h2" />
                                            <path d="M4 16v2a2 2 0 0 0 2 2h2" />
                                            <path d="M16 4h2a2 2 0 0 1 2 2v2" />
                                            <path d="M16 20h2a2 2 0 0 0 2 -2v-2" />
                                            <path d="M9 10h.01" />
                                            <path d="M15 10h.01" />
                                            <path d="M9.5 15.05a3.5 3.5 0 0 1 5 0" />
                                        </svg>
                                        <span>
                                        There are no records
                                    </span>
                                    </div>
                                </td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
