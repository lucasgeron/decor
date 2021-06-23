@if ($sortBy !== $field)
<i  class="text-gray-300 fas fa-sort"></i>
@elseif ($sortDirection == 'asc')
<i  class="text-gray-500 fas fa-sort-up"></i>
@else
<i  class="text-gray-500 fas fa-sort-down"></i>
@endif