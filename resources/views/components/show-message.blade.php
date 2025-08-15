@props(['type' => 'success', 'message' => ''])

<div
    x-data="{show: true}"
    x-show="show"
    x-init="setTimeout(function(){
    show = false
    }, 3000)"
    class="mb-4 p-4 rounded shadow text-sm font-medium"
    :class="{
        'bg-green-100 text-green-800': '{{ $type }}' === 'success',
        'bg-red-100 text-red-800': '{{ $type }}' === 'error',
    }"

>
    {{ $message }}
</div>
