<div wire:init="loadBaselinkerData">
    <button wire:click="checkToken" @if($isLocked || $isTokenVerified) disabled @endif class="btn btn-blue">
        <p wire:loading.class="d-none" wire:target="checkToken"> {{$isTokenVerified ? 'Token zweryfikowany poprawnie' : 'Sprawdź poprawność tokenu'}}
        </p>
        <i wire:loading.class="fa-spin" wire:target="checkToken" class="fa-solid fa-spinner" wire:loading></i>
    </button>
    @if(isset($baselinkerItems['success']) && !!$baselinkerItems['success'])
        <form action="{{route('panel.baselinker.store-baselinker-items')}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-row form-row--title w-50 mb-3 mt-4">
                <label for="inventory">Wybór inwentarza</label>
                <select class="form-control" id="inventory" name="inventory">
                    @foreach($baselinkerItems['inventories'] as $inventory)
                        <option @selected($currentInventoryName == $inventory['name']) value="{{$inventory['name']}}.#.{{$inventory['inventory_id']}}" title="{{$inventory['description']}}">{{$inventory['name']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-row form-row--title w-50 mb-3">
                <label for="warehouse">Wybór magazynu</label>
                <select class="form-control" id="warehouse" name="warehouse">
                    @foreach($baselinkerItems['warehouses'] as $warehouse)
                        <option @selected($currentWarehouseName == $warehouse['name']) value="{{$warehouse['name']}}.#.{{$warehouse['warehouse_id']}}.#.{{$warehouse['warehouse_type']}}" title="{{$warehouse['description']}}">{{$warehouse['name']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-row form-row--title w-50 mb-3">
                <label for="pricing">Wybór cennika</label>
                <select class="form-control" id="pricing" name="pricing">
                    @foreach($baselinkerItems['price_groups'] as $price)
                        <option @selected($currentPricingName == $price['name']) value="{{$price['name']}}.#.{{$price['price_group_id']}}" title="{{$price['description']}}">{{$price['name']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-row form-row--title w-50 mb-3">
                <button type="submit" class="btn btn-blue mt-2">Zapisz ustawienia</button>
            </div>
        </form>
    @else
        <div class="form-row form-row--title w-50 mb-3 mt-5 flex flex-wrap justify-content-center">
            <i class="fa-solid fa-spinner fa-spin" style="font-size: 72px" ></i>
        </div>
    @endif
</div>
