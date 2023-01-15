@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => '']) !!} {{ old('gender') ==='1' ? 'checked' : '' }}>
