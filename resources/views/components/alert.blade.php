@props(['type' => $type, 'message' => $message])

@php
    $colors = [
        'success' => 'bg-green-100 text-green-700 border-green-400',
        'error'   => 'bg-red-100 text-red-700 border-red-400',
        'info'    => 'bg-blue-100 text-blue-700 border-blue-400',
    ];

    $colorClass = $colors[$type] ?? $colors['success'];
@endphp

@if($message)
    <div x-data="{ show: true }"
         x-show="show"
         x-init="setTimeout(() => show = false, 3000)"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform scale-95"
         x-transition:enter-end="opacity-100 transform scale-100"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 transform scale-100"
         x-transition:leave-end="opacity-0 transform scale-95"
         class="border px-4 py-3 rounded relative flex justify-between items-center {{ $colorClass }} shadow-md"
         role="alert">

        <!-- Message -->
        <span class="block sm:inline">{{ $message }}</span>

        <!-- Close button -->
        <button type="button"
                class="ml-4 text-xl font-bold leading-none focus:outline-none"
                @click="show = false">
            &times;
        </button>
    </div>
@endif
