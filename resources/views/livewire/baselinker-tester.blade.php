<div>
    <button wire:click="checkToken()" @if($isLocked) disabled @endif class="btn btn-blue">Sprawdź poprawność tokenu</button>
    <span>
        {{ $resultInfo }}
        <i wire:loading.class="fa-spin" wire:target="checkToken" class="fa-solid fa-spinner" wire:loading></i>
    </span>
</span>
</div>
