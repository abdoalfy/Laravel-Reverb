<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <div
                  x-init=
                "
                Echo.channel('publicChanel')
                .listen('PublicEvent',(event) => {
                    alert('public event has been fired')
                })
                "
                class="p-6 text-gray-900">

                    {{ __("You're logged in!") }}
                </div> --}}





                <div
                x-init=
              "
        Echo.private('privateChanel.{{ auth()->id() }}')
            .listen('PrivateEvent', (event) => {
                console.log(event);
            });
              "
              class="p-6 text-gray-900">

                  {{ __("You're logged in!") }}
              </div>
            </div>
        </div>
    </div>
</x-app-layout>
