@extends('layouts.base_layout')

@section('title')
	{{ __('models.seo-title', ['name' => 'Caretta']) }}
@endsection

@section('description')
	{{ __('models.seo-description') }}
@endsection

@section('breadcrumbs')
	<div class="breadcrumbs pattern-bg">
		<div class="benu-container breadcrumbs__content flex justify-start">
			<a href="{{ route('home', [app()->getLocale()]) }}">{{ __('breadcrumbs.home') }}</a>
			<div class="pl-5 pr-5">
				>
			</div>
			<a href="{{ route('full-story', ['locale' => app()->getLocale()]) }}" class="primary-color"><strong>{{ __('breadcrumbs.about') }}</strong></a>
		</div>
	</div>
@endsection

@section('main-content')
<section class="w-3/5 m-auto full-story mb-10 pb-10">
	<h2 class="full-story__subtitle">À propos de BENU</h2>
	<h1 class="full-story__title">Faciliter le don de meubles et d'objets d'occasion au Luxembourg </h1>

	<p class="full-story__txt">
		Chez BENU REUSE, tu peux facilement rechercher et commander des articles d'occasion depuis chez toi. Tu peux proposer des choses dont tu n’as plus besoin et les transmettre aux clients intéressés. Que ce soit en tant que particulier, salarié*e dans un organisme public ou une société commerciale au Luxembourg : T’es invité*e à rejoindre BENU REUSE.
	</p>
	<p class="full-story__highlight">
		Réutilisons et réduisons les déchets ensemble !
	</p>
	<p class="full-story__txt">
		L'utilisation multiple des matériaux usagés et des objets du quotidien permet d'économiser matières premières, énergie, émissions et déchets. Moins de nouvelles productions, un recyclage moins gourmand en ressources et moins d'espace d'enfouissement sont nécessaires.<br/> Les articles d'occasion encore en bon état, propres, complets et fonctionnels sont vendus via BENU REUSE. Diverses choses ne sont pas acceptées, par exemple les appareils nécessitant une réparation ou les matériaux contaminés par des polluants. Tu peux en savoir plus sur les critères d'un placement via BENU REUSE ici. 
	</p>

	<p class="full-story__txt">
		Contrairement aux plateformes commerciales conventionnelles, tous les objets et matériaux sont transmis gratuitement à BENU REUSE. Notre équipe BENU REUSE récupère les articles proposés et les livre directement aux clients. Ceux-ci paient des frais de livraison avec lesquels nous couvrons une partie de nos frais de logistique et de transport. Étudiant*e, les organismes à but non lucratif bénéficient d'une réduction sur les frais de livraison. Nos réponses aux questions les plus fréquemment posées expliquent comment fonctionnent la recherche, la commande et l'offre chez BENU REUSE.
	</p>

	<p class="full-story__txt">
		Avec BENU REUSE, nous voulons sensibiliser au thème de la réduction des déchets, de la réutilisation et de la consommation durable. Nous t’ invitons à parcourir, à en savoir plus, à faire preuve de créativité et à redécouvrir ton appréciation de ce que tu ass procuré. BENU REUSE n'est qu'une des nombreuses structures luxembourgeoises actives dans le domaine du recyclage. Sous REUSE Service, tu peux savoir où les articles usagés sont acceptés, transmis ou réparés au Luxembourg.
	</p>

	<p class="full-story__txt">
		BENU REUSE est un projet pilote en phase de test et est continuellement développé, par exemple en évaluant les informations actuelles sur la gestion du recyclage et le recyclage. T’es cordialement invités à participer, que ce soit dans le cadre du REUSE Service ou grâce à tes connaissances spécialisées. Si t’as des informations ou des connaissances approfondies sur des études, par exemple sur les critères de durabilité, alors rejoigne-nous et deviens un membre actif de la communauté BENU REUSE. Contacte-nous ici et nous discuterons ensemble de la manière dont tes expériences chez BENU REUSE peuvent être intégrées.
	</p>
	
	<p class="full-story__txt text-center">
		Tu veux en savoir plus sur BENU REUSE ?
	</p>

	<p class="text-center mb-10">
		<a href="{{ route('full-story', ['locale' => app()->getLocale()]) }}" class="btn-couture m-auto">Alors lis toute l'histoire !</a>
	</p>

</section>
@endsection

@section('scripts')
@endsection