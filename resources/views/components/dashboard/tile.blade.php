{{-- resources/views/components/dashboard/tile.blade.php --}}
@props(['route','icon','label'])

<a href="{{ route($route) }}"
   class="card bg-base-200 hover:bg-primary/20 transition-colors shadow-md">
    <div class="card-body items-center text-center">
        {{-- lucide-react icon names used by DaisyUI --}}
        <x-icon :name="$icon" class="w-8 h-8 opacity-70"/>
        <span class="font-semibold">{{ $label }}</span>
    </div>
</a>
