@props(['type' => 'info', 'message' => null])

@if ($message)
    <div 
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 3000)"
        x-show="show"
        x-transition
        class="fixed top-4 right-4 z-50"
    >
        <div class="
            px-4 py-3 rounded shadow text-white font-medium flex items-center justify-between gap-4
            @if($type === 'success') bg-green-600 @endif
            @if($type === 'error') bg-red-600 @endif
            @if($type === 'warning') bg-yellow-500 text-black @endif
            @if($type === 'info') bg-blue-600 @endif
        ">
            <span>{{ $message }}</span>

            <button @click="show = false" class="text-xl leading-none">&times;</button>
        </div>
    </div>
@endif
