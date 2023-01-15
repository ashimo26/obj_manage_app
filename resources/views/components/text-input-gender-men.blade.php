@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => '']) !!} {{ old('gender') ==='0' ? 'checked' : '' }}>
