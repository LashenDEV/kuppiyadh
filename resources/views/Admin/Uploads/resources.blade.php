<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$curr->subject_name}}
        </h2>
    </x-slot>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 p-5">
        @isset($items)
            @foreach($items as $item)
                <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
                    <div class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                        <img
                            src="{{asset("assets/images/material.png")}}"
                            alt=""
                            class="h-full w-full">
                    </div>
                    @php($status = \App\Models\ViewStatus::where([['user_id', Auth::user()->id], ['material_id', $item->id]])->first())
                    @if(!$status)
                        <td>
                            <img class="h-8" src="{{asset('assets/images/new.png')}}" alt="">
                        </td>
                    @endif

                    <h2 class="mt-4 font-bold text-xl">{{$item->file_name}}</h2>
                    <h6 class="mt-2 text-sm font-medium">@if($item->file)
                            <a href="{{url('dashboard/view', $item->id)}}">View<i
                                    class="far fa-eye pl-2"></i></a>
                        @endif</h6>

                    <h6 class="mt-2 text-sm font-medium">@if($item->file)
                            <a href="{{url('/download', $item->file)}}">Download<i
                                    class="fas fa-file-download pl-2"></i></a>
                        @endif
                        @if($item->link)
                            <a href="{{$item->link}}">Link<i
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
