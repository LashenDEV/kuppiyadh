<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notices') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{route('notice.add')}}" method="post" enctype="multipart/form-data"
                          class="flex items-center justify-center">
                        @csrf
                        <textarea name="notice_name" placeholder="Type in here" cols="30" rows="3"
                                  class="m-2 w-2/5"></textarea>
                        <x-button type="submit" class="flex w-20 justify-center text-center m-2">Add Notice</x-button>
                    </form>
                    @isset($items)
                        @foreach($items as $item)
                            <div class="rounded overflow-hidden shadow-lg m-2">
                                <div class="px-6 py-4">
                                    <p class="text-gray-700 text-base">
                                        {{$item->notice_name}}
                                    </p>
                                </div>
                                <div class="px-6 pt-4 pb-2">
                                        <span
                                            class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"><a
                                                class="text-blue-600" href="{{route('notice.edit', $item->id)}}">Edit<i
                                                    class="far fa-edit pl-2"></i></a></span>
                                    <span
                                        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"><a
                                            class="text-red-600" href="{{route('notice.delete', $item->id)}}">Delete<i
                                                class="fa fa-trash pl-2"></i></a></span>
                                </div>
                            </div>
                        @endforeach
                    @endisset
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
