<div class="dashboard__content__box dashboard__content__box--large">
    <h3 class="dashboard__content__box__title">Mes détails</h3>
    <div class="w-1/2">
        <h4 class="dashboard__content__box__subtitle">{{ Auth::user()->first_name.' '.Auth::user()->last_name }}</h4>
        <p>
            Membre depuis le {{ Auth::user()->created_at->format('d'.'/'.'m'.'/'.'Y') }}
        </p>
    </div>
    <div class="w-1/2 dashboard__content__box__low-links">
        <div class="flex flex-col justify-end">
            <p>
                <a wire:click="changeSection('details')" class="btn-dashboard-plain">Détails du compte</a>
            </p>
            <p>
                <a wire:click="changeSection('delete')" class="btn-dashboard-plain">Supprimer mon compte</a>
            </p>
        </div>
    </div>
</div>
<div class="dashboard__content__box dashboard__content__box--normal">
    <h3 class="dashboard__content__box__title">Mes adresses</h3>
    <p>
        Ajouter, modifier ou supprimer des adresses.
    </p>
    <p class="dashboard__content__box__bottom-link">
        <a wire:click="changeSection('addresses')" class="btn-dashboard-plain">Voir toutes mes adresses</a>
    </p>
</div>
<div class="dashboard__content__box dashboard__content__box--normal">
    <h3 class="dashboard__content__box__title">Mes commandes</h3>
    <p>
        Gérer, modifier, supprimer mes commandes
    </p>
    <p class="dashboard__content__box__bottom-link">
        <a wire:click="changeSection('orders')" class="btn-dashboard-plain">Voir toutes mes commandes</a>
    </p>
</div>
<div class="dashboard__content__box dashboard__content__box--normal">
    <h3 class="dashboard__content__box__title">Mes demandes</h3>
    <p>
        Gérer, modifier, supprimer mes demandes
    </p>
    <p class="dashboard__content__box__bottom-link">
        <a wire:click="changeSection('demands')" class="btn-dashboard-plain">Voir toutes mes demandes</a>
    </p>
</div>
<div class="dashboard__content__box dashboard__content__box--normal">
    <h3 class="dashboard__content__box__title">Mes retours</h3>
    <p>
        Vérifier mes retours
    </p>
    <p class="dashboard__content__box__bottom-link">
        <a wire:click="changeSection('returns')" class="btn-dashboard-plain">Voir tous mes retours</a>
    </p>
</div>
<div class="dashboard__content__box dashboard__content__box--normal">
    <h3 class="dashboard__content__box__title">Ma Wishlist</h3>
    <p>
        Gérer et modifier ma wishlist
    </p>
    <p class="dashboard__content__box__bottom-link">
        <a wire:click="changeSection('wishlist')" class="btn-dashboard-plain">Voir ma wishlist</a>
    </p>
</div>