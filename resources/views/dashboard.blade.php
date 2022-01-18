<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg ">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="" method="post" enctype="multipart/form-data"
                          class="justify-between sm:flex items-center">
                        @csrf
                        <label>
                            <select name="subject_id"
                                    class="mt-1 h-12 border-gray-300 focus:border-indigo-300
                             focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm m-2">
                                <option value="1">Programming Kuppiya</option>
                                <option value="2">Maths Kuppiya</option>
                            </select>
                        </label>
                        <x-input type="text" name="file_name" placeholder="File Name" class="m-2"></x-input>
                        <label
                            class="w-28 flex flex-col items-center px-2 py-1 bg-white text-blue rounded-lg shadow-lg tracking-wide border border-blue hover:cursor-pointer hover:bg-blue-700 hover:text-white m-2">
                            <span class="text-base leading-normal">Select a file</span>
                            <input type='file' class="hidden" name="file"/>
                        </label>
                        <x-button type="submit" class="flex w-20 justify-center text-center m-2">Submit</x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm sm:rounded-lg ">
            <table class="table-auto">
                <thead>
                <tr>
                    <th>Song</th>
                    <th>Artist</th>
                    <th>Year</th>
                </tr>
                </thead>
                <tbody>
                @isset($items)
                    @foreach($items as $item)
                        <tr>
                            <td>{{$item->file_name}}</td>
                            <td>Malcolm Lockyer</td>
                            <td>1961</td>
                        </tr>
                    @endforeach
                @endisset
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
