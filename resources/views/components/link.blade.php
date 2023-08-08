@php
    $clases = 'text-xs text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 cursor:pointer';
@endphp
<div>
    <a {{ $attributes->merge(['class' => $clases]) }}>
        {{ $slot }}
    </a>
</div>
