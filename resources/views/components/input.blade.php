@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'border-outline dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark focus:border-outline-strong dark:focus:border-outline-dark-strong focus:ring-outline-strong dark:focus:ring-outline-dark-strong rounded-xl shadow-sm',
]) !!}>
