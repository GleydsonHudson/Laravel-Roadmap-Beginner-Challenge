<x-app-layout>

    <x-slot name="header">
        <x-backend.header name="Tags"/>
    </x-slot>

    <div>
        <div class="max-w-2xl mx-auto py-8 sm:px-6 lg:px-8">

            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                            <form action="{{route('tags.update', $tag)}}">
                                @csrf
                                @method('PUT')

                                <div>
                                    <x-jet-label for="name" value="{{ __('Title') }}" />
                                    <x-jet-input id="name" type="text" class="mt-1 block w-full" value="{{ old('name', $tag->name) }}" autocomplete="name" />
                                    <x-jet-input-error for="name" class="mt-2" />
                                </div>
                                <div></div>

                                <div>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
