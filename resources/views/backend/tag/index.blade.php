<x-app-layout>

    <x-slot name="header">
        <x-backend.header name="Tags"/>
    </x-slot>

    <div>
        <div class="max-w-6xl mx-auto py-8 sm:px-6 lg:px-8">

            <div class="block mb-6">
                <x-link.primary :href="route('tags.create')">{{__('Create Tag')}}</x-link.primary>
            </div>

            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        @if($tags->isEmpty())
                            <h1 class="text-2xl font-medium">{{__("No tags were created! Let's start making some!")}}</h1>
                        @else
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200 w-full table-auto">
                                    <thead>
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{__('ID')}}
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{__('Name')}}
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{__('Slug')}}
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('Actions') }}
                                        </th>
                                    </tr>

                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse ($tags as $tag)

                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $tag->id }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $tag->name }}
                                            </td>

                                            <td class="px-6 py-4  text-sm text-gray-900">
                                                {{ $tag->slug }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">

                                                <x-link.secondary
                                                    :href="route('tags.edit', $tag)">{{__('Edit')}}</x-link.secondary>

                                                <x-buttons.delete-inline :action="route('tags.destroy', $tag)"/>

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            {{__('No Tags yet!')}}
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>
