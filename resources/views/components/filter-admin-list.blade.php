<form
    @if(isset($params) && $params != null)
        @if(isset($value) && $value != null)
            action="{{ route($routeName, array_merge(request()->except('page'), ['sort' => request('sort'), 'direction' => request('direction'), $name => $value])) }}"
        @else
            action="{{ route($routeName, array_merge(request()->except('page'), ['sort' => request('sort'), 'direction' => request('direction')], $params)) }}"
        @endif
    @else
        @if(isset($value) && $value != null)
            action="{{ route($routeName, array_merge(request()->except('page'), ['sort' => request('sort'), 'direction' => request('direction'), $name => $value])) }}"
        @else
            action="{{ route($routeName, array_merge(request()->except('page'), ['sort' => request('sort'), 'direction' => request('direction')])) }}"
        @endif
    @endif
    method="get"
    id="search-form-comp">
    <div class="filter-table">
        @if(isset($textFilterName))
            <div class="form-col">
                <input type="text" placeholder="Wyszukaj" name="{{ $textFilterName }}" value="{{ request($textFilterName) }}">
                <span class="icon-search" id="search-button-comp"><i class="fa-solid fa-magnifying-glass"></i></span>
            </div>
        @endif
        {{$slot}}
        @if(isset($select))
            <div class="form-col">
                <select name="{{$select}}" onchange="this.form.submit()">
                    <option value="default">{{isset($selectPlaceholder) ? $selectPlaceholder : 'Wybierz'}}</option>
                    @foreach($collection as $item)
                        <option @selected(request()->get($select) == $item->id) value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
        @endif
        @if(isset($dateFromName) && isset($dateToName))
            <div class="form-col">
                <input type="datetime-local" placeholder="Data od" onchange="this.form.submit()" name="{{ $dateFromName }}" value="{{ request($dateFromName) }}">
            </div>
            <div class="form-col">
                <input type="datetime-local" placeholder="Data do" onchange="this.form.submit()" name="{{ $dateToName }}" value="{{ request($dateToName) }}">
            </div>
        @endif
        @if(isset($perPageItems))
                <div class="form-col">
                    <select name="{{$perPageItems}}" onchange="this.form.submit()">
                        @foreach([10,25,50,100,250,500] as $num)
                            <option @selected(request()->get('perPage') == $num) value="{{$num}}">{{$num}}</option>
                        @endforeach
                    </select>
                </div>
        @endif

        @if(request()->has('sort') && request()->has('direction'))
                <input type="hidden" name="sort" value="{{ request('sort') }}">
                <input type="hidden" name="direction" value="{{ request('direction') }}">
        @endif

       {{-- DISABLED BTNS
        <div class="form-col">
            <button type="submit" class="btn btn-blue">Wyszukaj</button>
        </div>--}}
        @if(isset($clear))
            <div class="form-col">
                @if(isset($value) && $value != null)
                    <a href="{{ route($routeName, [$name => $value]) }}" class="btn btn-danger">Wyczyść filtry</a>
                @else
                    <a href="{{ route($routeName) }}" class="btn btn-danger">Wyczyść filtry</a>
                @endif
            </div>
        @endif

        @if(isset($submit))
             <div class="form-col">
                 <button type="submit" class="btn btn-blue">Szukaj</button>
             </div>
        @endif
        @if(isset($exportRoute))
             <div class="form-col">
                 <a href="{{ route($exportRoute, array_merge(request()->except('page'), ['sort' => request('sort'), 'direction' => request('direction')])) }}" class="btn btn-blue">Eksport CSV</a>
             </div>
        @endif


    </div>
</form>


