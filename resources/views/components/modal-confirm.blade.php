@props([
  'modal_id',
  'title'   => '¿Confirmar?',
  'message' => 'Esta acción no se puede deshacer.',
  'confirm' => 'Eliminar',
])
{{-- Trigger slot outside --}}
<input type="checkbox" id="{{ $modal_id }}" class="modal-toggle" />
<div class="modal" role="dialog">
  <div class="modal-box">
    <h3 class="font-bold text-lg">{{ $title }}</h3>
    <p class="py-4">{{ $message }}</p>
    <div class="modal-action">
      <label for="{{ $modal_id }}" class="btn">Cancelar</label>
      {{ $slot }}
    </div>
  </div>
</div>
