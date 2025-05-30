@props([
  'headers'   => [],      
  'classes'   => '',      
])

<div class="overflow-x-auto">
  <table {{ $attributes->merge(['class'=>"table table-zebra ".$classes]) }}>
    <thead>
      <tr>
        @foreach($headers as $h) <th>{{ $h }}</th> @endforeach
      </tr>
    </thead>
    <tbody>{{ $slot }}</tbody>
  </table>
</div>
