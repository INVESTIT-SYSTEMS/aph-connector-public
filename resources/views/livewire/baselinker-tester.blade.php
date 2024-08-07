<div>
    <button wire:click="checkToken()" @if($isLocked || $isTokenVerified) disabled @endif class="btn btn-blue">
        <p wire:loading.class="d-none"> {{$isTokenVerified ? 'Token zweryfikowany poprawnie' : 'Sprawdź poprawność tokenu'}}
        </p>
        <i wire:loading.class="fa-spin" wire:target="checkToken" class="fa-solid fa-spinner" wire:loading></i>
    </button>
</span>
</div>
