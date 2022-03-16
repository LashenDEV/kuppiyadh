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
    <div class="flex w-full p-2 mb-4 text-sm text-blue-700 bg-white rounded-lg"
         role="alert">
        <svg class="inline flex-shrink-0 mr-3 w-5 h-5" fill="red" viewBox="0 0 20 20"
             xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                  d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                  clip-rule="evenodd"></path>
        </svg>
        <span class="font-medium pr-2 text-red-600">Notices :</span>
        <div>
            <div class="ticker-wrapper-h sm:w-11/12 w-9/12 overflow-hidden">
                <ul class="news-ticker-h">
                    @isset($notices)
                        @foreach($notices as $notice)
                            <li><i class="fas fa-check-double text-gray-900 px-2"></i>
                                {{$notice->notice_name}}
                            </li>
                        @endforeach
                    @endisset
                </ul>
            </div>
        </div>
    </div>
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
    <br>
</x-app-layout>
