<form method="POST" wire:submit.prevent="updateGiftInfo" class="cart-gift-modal">
    @csrf
    <div class="cart-gift-modal__close-container" wire:click="closeModal">
        <div class="cart-gift-modal__close">
            {{ __('sidebar.close') }} <span class="pl-2">&#10005;</span>
        </div>
    </div>

    <h4>Cet article est un cadeau</h4>
    
    @if($article_id > 0)
    <div class="flex justify-center">
        <button class="cart-gift-modal__section-btn @if($section == 'wrapping') cart-gift-modal__section-btn--active @endif" wire:click.prevent.stop="changeSection('wrapping')">
            Emballage cadeau
        </button>
        <button class="cart-gift-modal__section-btn @if($section == 'card') cart-gift-modal__section-btn--active @endif" wire:click.prevent.stop="changeSection('card')">
            Carte personnalisée
        </button>
        <button class="cart-gift-modal__section-btn @if($section == 'message') cart-gift-modal__section-btn--active @endif" wire:click.prevent.stop="changeSection('message')">
            Message personnalisé
        </button>
    </div>

    <div class="cart-gift-modal__wrapping" @if($section !== 'wrapping') style="display: none;" @endif>
        <div class="cart-gift-modal__wrapping__input">
            <input type="checkbox" name="cart_add_wrapping" wire:model="with_wrapping" id="cart-add-wrapping">
            <label for="cart-add-wrapping">Ajouter un emballage cadeau <span class="pl-3 font-bold">+ 5&euro;</span></label>
        </div>
        <p>
            Lorem ipsum etc...
        </p>
    </div>

    <div class="cart-gift-modal__card" @if($section !== 'card') style="display: none;" @endif>
        <h5>Ajouter une carte personnalisée <span class="pl-3 font-bold">+ 3&euro;</span></h5>
        <div class="flex justify-center">
            <div class="cart-gift-modal__card__type @if($card_type == 1) cart-gift-modal__card__type--active @endif" wire:click="updateCard(1)">
                <div class="cart-gift-modal__card__type__svg-container">
                    @svg('carte-message-cadeau-1')
                </div>
                <div>
                    <input type="radio" name="cart_add_card" value="1" wire:model="card_type" id="cart-add-card-1">
                    <label for="cart-add-card-1">Ajouter la carte #1</label>
                </div>
            </div>
            <div class="cart-gift-modal__card__type @if($card_type == 2) cart-gift-modal__card__type--active @endif" wire:click="updateCard(2)">
                <div class="cart-gift-modal__card__type__svg-container">
                    @svg('carte-message-cadeau-2')
                </div>
                <div>
                    <input type="radio" name="cart_add_card" value="2" wire:model="card_type" id="cart-add-card-2">
                    <label for="cart-add-card-2">Ajouter la carte #2</label>
                </div>
            </div>
            <div class="cart-gift-modal__card__type @if($card_type == 3) cart-gift-modal__card__type--active @endif" wire:click="updateCard(3)">
                <div class="cart-gift-modal__card__type__svg-container">
                    @svg('carte-message-cadeau-3')
                </div>
                <div>
                    <input type="radio" name="cart_add_card" value="3" wire:model="card_type" id="cart-add-card-3">
                    <label for="cart-add-card-3">Ajouter la carte #3</label>
                </div>
            </div>
        </div>
    </div>

    <div class="cart-gift-modal__message" @if($section !== 'message') style="display: none;" @endif>
        <h5>Ajouter un message personnalisé <span class="pl-3 font-bold uppercase">GRATUIT</span></h5>
        <div class="relative">
            <div class="absolute cart-gift-modal__message__placeholder">
                Mon message
            </div>
            <textarea wire:model="message" class="w-full" rows="5" maxlength="1000" placeholder="Max 1000 caractères"></textarea>
        </div>
    </div>

    <div class="text-center cart-gift-modal__confirm-btn">
        <button type="submit" class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover m-auto">
            Confirmer les options
        </button>
    </div>

    @endif
</form>