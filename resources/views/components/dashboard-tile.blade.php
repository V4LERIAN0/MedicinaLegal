{{-- resources/views/components/dashboard-tile.blade.php --}}
@props(['title','route'])

<a href="{{ $route }}"
   class="block bg-white dark:bg-gray-800 p-6 rounded-lg shadow
          hover:bg-blue-50 dark:hover:bg-gray-700 transition">
    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
        {{ $title }}
    </h3>
</a>
