<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit
        </h2>
    </x-slot>
    <div class="bg-slate-800 bg-opacity-50 flex justify-center items-center absolute top-0 right-0 bottom-0 left-0">
        <div class="bg-white px-12 pt-5 pb-5 rounded-md text-center">
            <form action="{{url('/dashboard/update', $upload->id)}}" method="post" enctype="multipart/form-data"
                  class="justify-between flex items-center flex-col sm:w-96">
                @csrf
                @method('PUT')
                <label>
                    <select name="subject_id"
                            class="mt-1 h-12 border-gray-300 focus:border-indigo-300
                             focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm m-2"
                    >
                        @foreach($subjects as $subject)
                            <option value="{{$upload->subject_id}}"
                                    value="{{$subject->id}}">{{$subject->subject_name}}</option>
                        @endforeach
                    </select>
                </label>
                <x-input type="text" name="file_name" placeholder="File Name" value="{{$upload->file_name}}"
                         class="m-2"></x-input>
                <label
                    class="w-28 flex flex-col items-center px-2 py-1 bg-white text-blue rounded-lg shadow-lg tracking-wide border border-blue hover:cursor-pointer hover:bg-blue-700 hover:text-white m-2">
                    <span class="text-base leading-normal">Select a file</span>
                    <input type='file' class="hidden" name="file" value="{{$upload->file}}"/>
                </label>
                <x-input type="url" name="link" placeholder="link" class="m-2" value="{{$upload->link}}"></x-input>
                <x-button type="submit" class="flex w-20 justify-center text-center m-2">Update</x-button>
                <a href="{{ route('dashboard') }}">
                    <button type="button">Close</button>
                </a>
            </form>
        </div>
    </div>

</x-app-layout>
