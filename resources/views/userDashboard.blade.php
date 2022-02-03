<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            <?php
            date_default_timezone_set('Asia/Calcutta');

            // 24-hour format of an hour without leading zeros (0 through 23)
            $Hour = date('G');

            if ($Hour >= 5 && $Hour <= 11) {
                echo "Good Morning";
            } else if ($Hour >= 12 && $Hour <= 18) {
                echo "Good Afternoon";
            } else if ($Hour >= 19 || $Hour <= 4) {
                echo "Good Evening";
            }
            ?>
            {{Auth::user()->name}}
        </h2>
    </x-slot>
    <br>
    @isset($subjects)
        @foreach($subjects as $subject)
            <div class="py-1">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow-sm sm:rounded-lg">
                        <a href="{{url('dashboard/resources', $subject->id)}}">
                            <div
                                class="p-6 bg-white border-b border-gray-200 hover:bg-gray-300 duration-400 flex justify-between items-center">
                                {{$subject->subject_name}}
                                @php($label = 0)
                                @foreach($upload as $up)
                                    @if($up->subject_id == $subject->id)
                                        @if((Carbon\Carbon::parse($up->created_at)->diffInHours())-5 <= 72)
                                            @if($label == 0)
                                                <img class="h-8" src="{{asset('assets/images/new.png')}}" alt="">
                                                @php($label = 1)
                                            @endif
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    @endisset
    {{--    <div class="px-2 py-1">{{ $subjects ->links() }}</div>--}}
    <br>
</x-app-layout>
