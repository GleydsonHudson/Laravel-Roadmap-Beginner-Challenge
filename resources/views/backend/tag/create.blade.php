<x-app-layout>

    <x-slot name="header">
        <x-backend.header name="Tags"/>
    </x-slot>


    <div class="px-4 mx-auto mt-5 max-w-3xl md:px-0">

        <div class="inline-flex mb-2 text-xl font-semibold tracking-widest text-gray-700 uppercase">
            <h2 class="py-2">{{__('Create Tags')}}</h2>
        </div>

        <form method="post" action="{{ route('tags.store') }}">
            @csrf

            <div class="px-4 py-5 bg-white shadow sm:p-6 sm:rounded-tl-md sm:rounded-tr-md">
                <div class="flex flex-col items-center">
                    <div class="space-y-4 w-3/4">

                        <div>
                            <x-jet-label for="name" value="{{__('Title')}}"/>
                            <x-jet-input id="name" class="py-2 mt-1 w-full" value="{{ old('name') }}"
                                         autocomplete="name"/>
                            <x-jet-input-error for="name" class="mt-2"/>
                        </div>

                        <div>
                            <x-jet-label for="slug" value="{{__('Slug')}}"/>
                            <x-jet-input id="slug" class="py-2 mt-1 w-full border-gray-400" value="{{ old('slug') }}"
                                         autocomplete="slug"/>
                            <x-jet-input-error for="slug" class="mt-2"/>
                        </div>

                        <div>
                            <x-jet-label for="type" value="{{__('Type')}}"/>
                            <x-jet-input id="type" class="py-2 mt-1 w-full" value="{{ old('type') }}"
                                         autocomplete="type"/>
                            <x-jet-input-error for="type" class="mt-2"/>
                        </div>
                    </div>

                </div>

            </div>

            <div
                class="flex justify-end items-baseline px-4 py-3 space-x-1 text-right bg-gray-50 shadow sm:px-6 sm:rounded-bl-md sm:rounded-br-md">

                <x-link.cancel :href="route('tags.index')">
                    {{ __('Cancel') }}
                </x-link.cancel>

                <x-jet-button>
                    {{ __('Save') }}
                </x-jet-button>
            </div>

        </form>
    </div>

</x-app-layout>


