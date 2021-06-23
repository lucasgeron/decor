@if ($sortBy !== $field)
<i  class="text-gray-300 hidden md:inline fas fa-sort"></i>
@elseif ($sortDirection == 'asc')
<i  class="text-gray-500 hidden md:inline fas fa-sort-up"></i>
@else
<i  class="text-gray-500 hidden md:inline fas fa-sort-down"></i>
@endif