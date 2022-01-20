<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @if(Auth::user()->hasRole('admin'))
        <div class="pt-12 pb-3">
            @if (session('status'))
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex bg-green-100 h-10 items-center justify-center my-3">
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                </div>
            @endif
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-sm sm:rounded-lg ">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form action="{{url('/uploads')}}" method="post" enctype="multipart/form-data"
                              class="justify-between sm:flex items-center flex-row">
                            @csrf
                            <label>
                                <select name="subject_id"
                                        class="mt-1 h-12 border-gray-300 focus:border-indigo-300
                             focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm m-2">
                                    @foreach($subjects as $subject)
                                        <option value="{{$subject->id}}">{{$subject->subject_name}}</option>
                                    @endforeach
                                </select>
                            </label>
                            <x-input type="text" name="file_name" placeholder="File Name" class="m-2"></x-input>
                            <label
                                class="w-28 flex flex-col items-center px-2 py-1 bg-white text-blue rounded-lg shadow-lg tracking-wide border border-blue hover:cursor-pointer hover:bg-blue-700 hover:text-white m-2">
                                <span class="text-base leading-normal">Select a file</span>
                                <input type='file' class="hidden" name="file"/>
                            </label>
                            <x-input type="url" name="link" placeholder="link" class="m-2"></x-input>
                            <x-button type="submit" class="flex w-20 justify-center text-center m-2">Submit</x-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm sm:rounded-lg ">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            @isset($items)
                                <table class="min-w-full">
                                    <thead class="bg-white border-b">
                                    <tr>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            <b>No</b>
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            <b>File Name</b>
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            <b>View</b>
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            <b>Resources</b>
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            <b>Controls</b>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($items as $item)
                                        <tr class="bg-gray-100 border-b">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{$item->id}}
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
                                                            class="fas fa-link pl-2 text-center "></i></a>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                <a href="{{ url('dashboard/edit', $item->id) }}"><i
                                                        class="fas fa-edit text-blue-600 pl-2"></i></a>
                                                <a href="{{ url('dashboard/delete', $item->id) }}"><i
                                                        class="fas fa-trash text-red-600 pl-2"></i></a>
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
            <div class="px-2 py-1">{{ $items    ->links() }}</div>
        </div>
    </div>

</x-app-layout>
