@props([
    'name',
    'label' => null,
    'value' => old($name),
    'required' => false,
])

<div class="form-control">
    @if ($label)
        <label class="label">
            <span class="label-text">{{ $label }}</span>
        </label>
    @endif

    <input
        type="date"
        name="{{ $name }}"
        value="{{ $value }}"
        {{ $required ? 'required' : '' }}
        {{ $attributes->merge(['class' => 'input input-bordered']) }}
    >

    @error($name)
        <span class="text-error text-sm">{{ $message }}</span>
    @enderror
</div>
