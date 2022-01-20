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
    @isset($subjects)
        @foreach($subjects as $subject)
            <a href="{{url('dashboard/resources', $subject->id)}}">
                <div class="py-4">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">
                                {{$subject->subject_name}}
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    @endisset
</x-app-layout>
