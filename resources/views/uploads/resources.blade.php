<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$curr->subject_name}}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-3">
        <div class="bg-white shadow-sm sm:rounded-lg ">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            @isset($items)
                                <table class="min-w-full">
                                    <thead class="bg-gray-900 border-b">
                                    <tr class="text-white text-left">
                                        <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                                            <b>No</b>
                                        </th>
                                        <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                                            <b>File Name</b>
                                        </th>
                                        <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                                            <b>View</b>
                                        </th>
                                        <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                                            <b>Resources</b>
                                        </th>
                                        <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                                            <b>Time</b>
                                        </th>
                                        </b>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($i = 1)
                                    @foreach($items as $item)
                                        <tr class="bg-gray-100 border-b">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{$i++}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{$item->file_name}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap hover:text-blue-900">
                                                @if($item->file)
                                                    <a href="{{url('dashboard/view', $item->id)}}">View<i
                                                            class="far fa-eye pl-2"></i></a>
                                                @endif
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap hover:text-blue-900">
                                                @if($item->file)
                                                    <a href="{{url('/download', $item->file)}}">Download<i
                                                            class="fas fa-file-download pl-2"></i></a>
                                                @endif
                                                @if($item->link)
                                                    <a href="{{$item->link}}">Link<i
                                                            class="fas fa-link pl-2"></i></a>
                                                @endif
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{Carbon\Carbon::parse($item->created_at)->diffForHumans()}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    @endisset
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-2 py-1">{{ $items ->links() }}</div>
        </div>
    </div>

</x-app-layout>
