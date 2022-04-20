<section class="w-full m-auto return service-panel" id="services-return">
	<h2 class="return__title">{{ __('services.return-title') }}</h2>
	<!-- <p class="return__txt">
		{{ __('services.return-txt-1') }}
	</p>
	<div class="return__highlight">
		{{ __('services.return-highlighted-1') }}
	</div>
	<p class="return__txt">
		{{ __('services.return-txt-2') }}
	</p>
	<div class="text-center return__link">
		<a href="{{ route('client-service-'.app()->getLocale(), ['page' => 'contact']) }}" class="btn-couture m-auto">
			{{ __('services.return-contact') }}
		</a>
	</div> -->

	<div class="flex justify-between benu-container">
		<div class="return__index relative">
			<ul class="return__index__menu">
				<li>
					<button class="btn-slider-left font-bold" onclick="document.getElementById('return-chapter-article').scrollIntoView({ behavior: 'smooth', block: 'center' });">
						{{ __('services.return-article') }}
					</button>
				</li>
				<li>
					<button class="btn-slider-left font-bold" onclick="document.getElementById('return-chapter-voucher').scrollIntoView({ behavior: 'smooth', block: 'center' });">
						{{ __('services.return-voucher') }}
					</button>
				</li>
				<li>
					<button class="btn-slider-left font-bold" onclick="document.getElementById('return-chapter-refund').scrollIntoView({ behavior: 'smooth', block: 'center' });">
						{{ __('services.return-refund') }}
					</button>
				</li>
			</ul>
		</div>

		<div class="return__chapters">
			<div class="return__chapter" id="return-chapter-article">
				<h3>{{ __('services.return-article') }}</h3>
				
				<p class="mb-2">
					Tu peux nous renvoyer un article qui ne te plaît pas ou qui ne te convient pas dans les 28 jours suivant l'envoi de la marchandise. 
				</p>
				<p class="mb-2">
					Veille à ce que l'article que tu nous renvoies soit en parfait état d'origine, non lavé et non utilisé. Il est toutefois possible d'essayer les vêtements avec précaution et minutie.
				</p>
				<p>
					Merci d'affranchir suffisamment ton retour et de l'envoyer à :
				</p>
				<ul class="mb-2">
					<li class="primary-color font-bold">BENU Village Esch ASBL</li>
					<li>51 rue d'Audun</li>
					<li>L-4018 Esch-sur-Alzette</li>
					<li>Luxembourg</li>
				</ul>
				<p>
					Tu peux également retourner ton article en personnel dans <a href="{{  route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-shops')]) }}" class="return__chapter__link">notre magasin à Esch-sur-Alzette</a>pendant les heures d'ouverture. 
				</p>
			</div>

			<div class="return__chapter" id="return-chapter-voucher">
				<h3>{{ __('services.return-voucher') }}</h3>
				
				<p class="mb-2">
					Afin que nous puissions traiter ton retour rapidement et sans complications, nous te prions de joindre un bon de retour.
				</p>
				<p class="mb-2">
					Si tu as passé ta commande avec ton compte BENU, tu trouveras le bon de retour dans ton compte. Sélectionne sous la commande concernée les articles que tu souhaites renvoyer et indique une raison pour le retour. Tu peux ensuite télécharger le bon de retour, l'imprimer et le joindre à ton envoi. N'oublie pas d'indiquer le numéro de compte et le(s) titulaire(s) du compte, afin que nous puissions te rembourser le prix d'achat !
				</p>
				<p class="mb-2">
					Tu ne trouves pas ton bon de retour ? Ou tu as commandé en tant que visiteur(se) sans compte BENU ? Tu trouveras ici un bon de retour vierge. Remplis manuellement les champs vides et joins le bon à ton retour.
				</p>
				<div class="text-center mt-5 pt-5">
					<a href="#" class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover">Télécharger le bon de retour vierge</a>
				</div>
			</div>

			<div class="return__chapter" id="return-chapter-refund">
				<h3>{{ __('services.return-refund') }}</h3>
				
				<p class="mb-2">
					Nous traitons ton retour immédiatement après l'avoir reçu. Le prix d'achat sera alors viré le plus rapidement possible sur ton compte.
				</p>
				<p class="mb-2">
					En cas de réclamation (marchandise défectueuse, livraison erronée, etc.), nous prenons bien sûr aussi en charge les frais de transport de retour. Dans ce cas, nous avons besoin non seulement du numéro de compte et du nom du/de la titulaire du compte, mais aussi d'une quittance des frais d'envoi.
				</p>
			</div>
		</div>
	</div>
</section>