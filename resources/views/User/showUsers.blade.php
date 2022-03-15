<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full">
                                <thead class="border-b bg-gray-800">
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">
                                        <b>User Role</b>
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">
                                        <b>Username</b>
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">
                                        <b>Status</b>
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">
                                        <b>Last Online</b>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @isset($users)
                                    @foreach($users as $user)
                                        <tr class="bg-white border-b">
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left">
                                                @if($user->hasRole('user'))
                                                    User
                                                @else
                                                    Admin
                                                @endif
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left">
                                                {{$user->name}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left">
                                                <div class="flex">
                                                    @if($user->isOnline())
                                                        <label
                                                            class="block font-medium text-sm text-gray-900 font-bold text-left"
                                                            for="name">
                                                            Online<i class="fas fa-circle text-green-400 pl-2"></i>
                                                        </label>
                                                    @else
                                                        <label
                                                            class="block font-medium text-sm text-gray-900 font-bold text-left"
                                                            for="name">
                                                            Offline<i class="fas fa-circle text-red-400 pl-2"></i>
                                                        </label>

                                                    @endif
                                                </div>
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left">
                                                <div class="flex">
                                                    @if($user->last_seen != null)
                                                        <label
                                                            class="block font-medium text-sm text-gray-900 font-bold text-left"
                                                            for="name">{{Carbon\Carbon::parse($user->last_seen)->diffForHumans()}}
                                                        </label>
                                                    @else
                                                        <label
                                                            class="block font-medium text-sm text-gray-900 font-bold text-left"
                                                            for="name">
                                                            None
                                                        </label>

                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endisset
                                </tbody>
                            </table>
                            {!! $users->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
