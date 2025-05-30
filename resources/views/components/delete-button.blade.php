<form method="POST" {{ $attributes }}>
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-error btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')">
        Eliminar
    </button>
</form>
