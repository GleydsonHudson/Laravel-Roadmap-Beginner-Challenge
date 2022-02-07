<x-app-layout>

    <x-slot name="header">
        <x-backend.header name="Create Post"/>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-8 sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-6">

                        <form action="{{route('posts.store')}}" method="POST">

                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div>

                                </div>


                            </div>
                        </form>
                        <div>
                            <x-backend.editor/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
