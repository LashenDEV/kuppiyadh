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
                        <form action="{{url('/Uploads')}}" method="post" enctype="multipart/form-data"
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
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 mt-2"
         style="margin-right: 25px; margin-left: 25px;">
        @isset($items)
            @foreach($items as $item)
                <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg m-3">
                    <div
                        class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                        <img
                            src="{{asset("assets/images/material.png")}}"
                            alt=""
                            class="h-full w-full">
                    </div>
                    @php($status = \App\Models\ViewStatus::where([['user_id', Auth::user()->id], ['material_id', $item->id]])->first())
                    @if(!$status)
                        <td><img class="h-8" src="{{asset('assets/images/new.png')}}" alt="">
                        </td>
                    @endif

                    <h2 class="mt-4 font-bold text-xl">{{$item->file_name}}</h2>
                    <h6 class="mt-2 text-sm font-medium">@if($item->file)
                            <a href="{{url('dashboard/view', $item->id)}}">View<i
                                    class="far fa-eye pl-2"></i></a>
                        @endif</h6>

                    <h6 class="mt-2 text-sm font-medium">@if($item->file)
                            <a href="{{url('/download', $item->id)}}">Download<i
                                    class="fas fa-file-download pl-2"></i></a>
                        @endif
                        @if($item->link)
                            <a href="{{url('dashboard/link', $item->id)}}">Link<i
                                    class="fas fa-link pl-2"></i></a>
                        @endif</h6>

                    <p class="text-xs text-gray-500 text-center mt-3">
                        {{Carbon\Carbon::parse($item->created_at)->diffForHumans()}}
                    </p>
                </div>
            @endforeach
        @endisset
    </div>
</x-app-layout>
