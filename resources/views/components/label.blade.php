@props(['value'])

<label
    {{ $attributes->merge(['class' => 'block font-medium text-sm text-on-surface-strong dark:text-on-surface-dark-strong']) }}>
    {{ $value ?? $slot }}
</label>
