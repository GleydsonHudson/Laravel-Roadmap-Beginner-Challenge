@props(['action', 'buttonText' => __('Delete')])

<div x-cloak x-data="{ initial: true, deleting: false }" class="inline-block">

    <x-jet-danger-button class="disabled:opacity-50"
        x-on:click.prevent="deleting = true; initial = false"
        x-show="initial"
        x-on:deleting.window="$el.disabled = true"
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100"
    >
        {{ $buttonText }}
    </x-jet-danger-button>

    <div
        x-show="deleting"
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90"
        class=""
    >

        <form x-on:submit="$dispatch('deleting')" method="post" action="{{ $action }}">
            @csrf
            @method('delete')

            <x-jet-button
                x-on:click="$el.form.submit()"
                x-on:deleting.window="$el.disabled = true"
                type="submit"
                class="disabled:opacity-50"
            >
                {{__('Yes')}}
            </x-jet-button>

            <x-jet-secondary-button
                x-on:click.prevent="deleting = false; setTimeout(() => { initial = true }, 150)"
                x-on:deleting.window="$el.disabled = true"
                class="disabled:opacity-50"
            >
                {{__('No')}}
            </x-jet-secondary-button>
        </form>
    </div>
</div>
