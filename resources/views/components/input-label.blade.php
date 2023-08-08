@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-bold mb-2 text-sm text-gray-500']) }}>
    {{ $value ?? $slot }}
</label>
