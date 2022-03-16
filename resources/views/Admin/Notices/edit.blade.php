<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit
        </h2>
    </x-slot>
    <div class="bg-slate-800 bg-opacity-50 flex justify-center items-center absolute top-0 right-0 bottom-0 left-0">
        <div class="bg-white px-12 pt-5 pb-5 rounded-md text-center">
            <form action="{{route('notice.update', $notice->id)}}" method="post" enctype="multipart/form-data"
                  class="justify-between flex items-center flex-col sm:w-96">
                @csrf
                @method('PUT')
                <textarea name="notice_name"  cols="30" rows="3">{{$notice->notice_name}}</textarea>
                <x-button type="submit" class="flex w-20 justify-center text-center m-2">Update</x-button>
                <a href="{{ route('dashboard.notices') }}">
                    <button type="button">Close</button>
                </a>
            </form>
        </div>
    </div>

</x-app-layout>
