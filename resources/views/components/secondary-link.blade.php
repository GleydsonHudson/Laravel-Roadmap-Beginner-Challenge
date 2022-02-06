@props([
    'href'
])

<a href="{{$href}}" {{ $attributes->merge(['class' => 'inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest bg-indigo-500 text-white hover:bg-indigo-600 focus:outline-none focus:border-indigo-800 focus:ring focus:ring-indigo-200 active:bg-indigo-500 disable:opacity-25 transition']) }}>
    {{ $slot }}
</a>
