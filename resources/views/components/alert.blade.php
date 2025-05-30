@props(['type' => 'success'])
@if(session($type))
    <div class="alert alert-{{ $type }} shadow cursor-pointer" onclick="this.remove()">
        {{ session($type) }}
    </div>
@endif
