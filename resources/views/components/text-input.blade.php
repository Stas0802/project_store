@props(['disabled' => false])

@php
    $baseClass = 'rounded-md shadow-sm'
@endphp

<input {{ $disabled ? '$disabled' : ''}} {{ $attributes->merge(['class' => $baseClass]) }}>

{{--<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>--}}
