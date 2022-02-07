<x-app-layout>

    <x-slot name="header">
        <x-backend.header name="Tags"/>
    </x-slot>

    <div>
        <div class="max-w-2xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('tags.store') }}">
                    @csrf
                    <div>
                        <x-jet-label for="name" value="{{__('Title')}}" />
                        <x-jet-input id="name" class="mt-1 py-2 w-full" autocomplete="name" />
                        <x-jet-input-error for="name" class="mt-2"/>
                    </div>

                    <div>
                        <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="route('tags.index')">
                            {{ __('Cancel') }}
                        </x-jet-secondary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
