<div>
    <div class="form-row form-row--title w-50 mb-3">
        <label for="token">Token API APH Connector</label>
        <div class="input-container">
            <input type="text" class="form-control" placeholder="Wygeneruj Token API Baselinker" disabled name="token" id="token" value="{{$token}}">
            <div class="tooltip-custom">
                <i class="fa-solid fa-clipboard" id="copy-clipboard-btn-1"></i>
                <span class="tooltiptext" id="text-tooltip-1">Skopiuj do schowka</span>
            </div>
        </div>
    </div>
    <div class="form-row form-row--title w-50 mb-3">
        <div class="input-container">
            <label for="domain">Domena APH Connector</label>
            <div class="input-container">
                <input type="text" class="form-control" id="domain" disabled placeholder="Domena" value="{{config('app.url')}}"/>
                <div class="tooltip-custom">
                    <i class="fa-solid fa-clipboard" id="copy-clipboard-btn-2"></i>
                    <span class="tooltiptext" id="text-tooltip-2">Skopiuj do schowka</span>
                </div>
            </div>
        </div>
    </div>
    <div class="form-row form-row--title w-50 mb-3">
        <div class="input-container">
            <label for="aph_token">Token API APH-Serwis</label>
            <div class="input-container">
                <input type="text" class="form-control" id="aph_token" placeholder="Token API APH-Serwis" value="{{$aphToken}}"/>
                <div class="tooltip-custom">
                    <i class="fa-solid fa-clipboard" id="copy-clipboard-btn-3"></i>
                    <span class="tooltiptext" id="text-tooltip-3">Skopiuj do schowka</span>
                </div>
            </div>
        </div>
    </div>
    <div class="form-row form-row--title w-50 mb-3">
        <button type="submit" wire:click="generateToken()" class="btn btn-blue mt-2">
            <p wire:loading.class="d-none" wire:target="generateToken">Wygeneruj nowy token</p>
            <i wire:loading.class="fa-spin" wire:target="generateToken" class="fa-solid fa-spinner" wire:loading></i>
        </button>
    </div>
    <div class="form-row form-row--title w-50 mb-3">
        <button type="submit" wire:click="storeAphToken(document.getElementById('aph_token').value)" class="btn btn-blue mt-2">
            <p wire:loading.class="d-none" wire:target="storeAphToken">Zapisz token API APH-Serwis</p>
            <i wire:loading.class="fa-spin" wire:target="storeAphToken" class="fa-solid fa-spinner" wire:loading></i>
        </button>
    </div>
    @if(!!$isVerified)
        <div class="form-row form-row--title w-50 mb-3">
            <button type="submit" wire:click="testAphConnection()" class="btn btn-blue mt-2">
                <p wire:loading.class="d-none" wire:target="testAphConnection">Przetestuj połącznie z APH-Serwis</p>
                <i wire:loading.class="fa-spin" wire:target="testAphConnection" class="fa-solid fa-spinner" wire:loading></i>
            </button>
        </div>
    @endif
</div>
