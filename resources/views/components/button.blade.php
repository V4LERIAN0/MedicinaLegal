@props([
  'color' => 'primary',    
  'href'  => null,
])

@php $class = 'btn btn-'.$color; @endphp

@if($href)
  <a {{ $attributes->merge(['href'=>$href,'class'=>$class]) }}>{{ $slot }}</a>
@else
  <button {{ $attributes->merge(['class'=>$class]) }}>{{ $slot }}</button>
@endif
