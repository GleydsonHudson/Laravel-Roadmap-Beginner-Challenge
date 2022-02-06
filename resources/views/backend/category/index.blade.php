<x-app-layout>

    <x-slot name="header">
        <x-backend.header name="Categories" />
    </x-slot>

    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">

            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        @if($categories->isEmpty())
                            <h1 class="text-2xl font-medium">{{__("No categories were created! Let's start making some")}}</h1>
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
                                            {{__('Title')}}
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
                                    @foreach ($categories as $category)

                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $category->id }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $category->title }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $category->slug }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">

                                                <a href="{{ route('categories.edit', $category) }}"
                                                   class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>

                                                <form class="inline-block"
                                                      action="{{ route('categories.destroy', $category) }}"
                                                      method="POST" onsubmit="return confirm('Are you sure?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit"
                                                           class="text-red-600 hover:text-red-900 mb-2 mr-2"
                                                           value="Delete">
                                                </form>

                                            </td>
                                        </tr>

                                    @endforeach
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
