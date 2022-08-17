<x-app-layout>
<x-slot name="header">
</x-slot>
<div class="flex justify-center p-10">
    <table class="min-w-max w-3/4 table-auto">
        <thead>
        <tr class="bg-gray-300 text-gray-600 uppercase text-sm leading-normal">
            <th class="py-3 px-6 text-left">ID</th>
            <th class="py-3 px-6 text-left">Short Link</th>
            <th class="py-3 px-6 text-left">Link</th>
        </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
        @foreach($links as $link)
            <tr class="border-b border-gray-200 hover:bg-white
            @if($loop->index%=2)
                bg-gray-100 @else bg-gray-200
            @endif"
            >
                <td class="py-3 px-6 text-left whitespace-nowrap">{{ $link->id }}</td>
                <td class="py-3 px-6 text-left font-semibold whitespace-nowrap"><a href="{{ route('shorten.link', $link->code) }}" target="_blank">{{ route('shorten.link', $link->code) }}</a></td>
                <td class="py-3 px-6 text-left whitespace-nowrap">{{ $link->link }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

</x-app-layout>
