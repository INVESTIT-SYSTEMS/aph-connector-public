<th>
    <a style="text-decoration: none; color: #192E51"
       @if(isset($params) && $params != null)
           href="{{ route($routeName, array_merge(request()->except('page'), ['sort' => $column, 'direction' => $sortDirection()], $params)) }}"
       @elseif(isset($value) && $value != null)
            href="{{ route($routeName, array_merge(request()->except('page'), ['sort' => $column, 'direction' => $sortDirection(), $name => $value])) }}"
        @else
           href="{{ route($routeName, array_merge(request()->except('page'), ['sort' => $column, 'direction' => $sortDirection()])) }}"
        @endif
    >
        {{ $title }}
         <i class="fa-solid {{ $currentIcon() }}"></i>
    </a>
</th>
