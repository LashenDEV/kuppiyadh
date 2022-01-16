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
                    <form action="{{url('uploads')}}" method="post" enctype="multipart/form-data"
                          class="justify-between sm:flex">
                        @csrf
                        <label>
                            <select name="subject_id"
                                    class="mt-1 h-12 border-gray-300 focus:border-indigo-300
                             focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option value="1">Programming Kuppiya</option>
                                <option value="2">Maths Kuppiya</option>
                            </select>
                        </label>
                        <x-input type="text" name="file_name" placeholder="File Name"></x-input>
                        <label
                            class="w-64 flex flex-col items-center px-2 py-1 bg-white text-blue rounded-lg shadow-lg tracking-wide border border-blue hover:cursor-pointer hover:bg-blue-700 hover:text-white">
                            <span class="mt-2 text-base leading-normal">Select a file</span>
                            <input type='file' class="hidden" name="file"/>
                        </label>
                        <x-button type="submit" class="flex w-24" >Submit</x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
