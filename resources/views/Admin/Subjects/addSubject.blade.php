<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Subjects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{url('/dashboard/addsubject')}}" method="post" enctype="multipart/form-data"
                          class="justify-center sm:flex items-center">
                        @csrf
                        <x-input type="text" name="subject_name" placeholder="Subject Name" class="m-2 w-2/5"></x-input>
                        <x-button type="submit" class="flex w-20 justify-center text-center m-2">Submit</x-button>
                    </form>
                    <table class="min-w-full">
                        <thead class="bg-white border-b">
                        <tr>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                <b>Subject ID</b>
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                <b>Subject Name</b>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @isset($items)
                        @foreach($items as $item)
                            <tr class="bg-gray-100 border-b">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{$item->id}}
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{$item->subject_name}}
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
</x-app-layout>
