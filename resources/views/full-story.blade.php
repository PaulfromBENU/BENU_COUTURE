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
			<a href="{{ route('full-story', ['locale' => app()->getLocale()]) }}" class="primary-color"><strong>{{ __('breadcrumbs.full-story') }}</strong></a>
		</div>
	</div>
@endsection

@section('main-content')
<section class="w-3/5 m-auto full-story">
	<h2 class="full-story__subtitle">L'histoire de BENU</h2>
	<h1 class="full-story__title">L'unique plate-forme luxembourgeoise de seconde main</h1>

	<h3 class="full-story__lowtitle">Le problème</h3>
	<p class="full-story__txt">
		De nombreux objets d'occasion bien conservés et des matériaux usagés qui sont trop bons pour être jetés sont quand même éliminés ... "jetés" … tous les jours.
	</p>
	<p class="full-story__txt">
		Les services de réparation sont de moins en moins nécessaires, l'appareil de remplacement peut être livré immédiatement. Même les vêtements présentant des dommages mineurs, comme un petit trou, ne sont plus réparés. L'offre dans les magasins aux prix soi-disant bas est infinie. Ceci fait augmenter la consommation de ressources sans garantir une réutilisation cohérente de ces ressources.
	</p>
	<p class="full-story__highlight">
		Les déchets municipaux, c'est-à-dire les déchets résiduels, les déchets collectés séparément (verre, papier...) et les déchets dangereux (piles, bois usagé...) des ménages et des petites entreprises représentaient en moyenne 610 kg par personne au Luxembourg en 2018. La moyenne de l'UE était de 489 kg par personne en 2018.
	</p>
	<p class="full-story__highlight">
		En 2016, les ménages représentaient 8,5 % et la construction 36,5 % des déchets produits dans l'UE.
	</p>
	<p class="full-story__txt">
		<em>Source: <a href="https://www.europarl.europa.eu/news/de/headlines/society/20180328STO00751/abfallwirtschaft-in-der-eu-zahlen-und-fakten" target="_blank">Eurostat, Agence européenne pour l'environnement, Commission européenne</a></em>
	</p>
	<p class="full-story__txt">
		Un exemple parmi d'autres : rien qu'en Allemagne, plus de 7,1 millions de tonnes de meubles sont éliminés chaque année. La montagne de déchets de bois pèse au total 10,5 millions de tonnes par an. Sur ce total, 10 millions de tonnes (95 %) sont brûlées. Le reste est complété par beaucoup de bois neuf (20 % de déchets de bois : 80 % de bois neuf) pour produire des panneaux de particules. Ce processus consomme de très grandes quantités d'eau et d'énergie. De nombreux panneaux d'agglomérés utilisent également des adhésifs douteux. Tout cela conduit à une mauvaise empreinte écologique. Nous appelons ce processus global le <a href="https://www.umweltbundesamt.de/altholz#verwertung-und-produktion-in-deutschland" target="_blank">recyclage du bois</a>.
	</p>
	<p class="full-story__txt">
		Autre exemple, le secteur de la construction : le secteur de la construction est responsable de 50 % des déchets dans le monde, ce qui en fait l'un des plus grands producteurs de déchets au monde. Chaque année, des millions de tonnes de matériaux de construction encore utilisables sont jetées seulement en Allemagne. La majorité est générée dans le cadre de projets de démolition et de démantèlement, mais aussi sur les chantiers de construction de nouveaux bâtiments. 10 à 15 % de tous les matériaux sont éliminés sans jamais être utilisés, par exemple en raison d'une commande excessive ou d'une planification incorrecte. Seule une fraction de ces matériaux de construction est effectivement recyclée et réutilisée. Le transport, le recyclage, l'élimination ainsi que la nouvelle production des matériaux de construction qui font défaut créent des déchets inutiles et une empreinte CO<sub>2</sub> considérable. En conséquence, le secteur de <a href="https://www.umweltbundesamt.de/altholz#verwertung-und-produktion-in-deutschland" target="_blank">la construction est responsable de 23 % des émissions mondiales de CO<sub>2</sub></a>.
	</p>
	<p class="full-story__txt">
		Le <a href="https://www.sueddeutsche.de/wirtschaft/rohstoffe-welterschoepfungstag-autoindustrie-recycling-wertstoffkreislauf-1.5368626" target="_blank">29 juillet 2021</a>, l'humanité a épuisé toutes les ressources biologiques que la Terre peut reconstituer et donc fournir durablement en un an. Dans le monde entier, les humains consomment tant de ressources qu'il faudrait 2,75 Terres pour les fournir de manière durable. Le Luxembourg consomme 7,9 Terres (ce qui le place au deuxième rang mondial en matière de consommation de ressources, derrière le Qatar), l'Allemagne 3, la France un peu moins de 3 et la Belgique 3,8 Terres (2019, <a href="https://www.footprintnetwork.org" target="_blank">www.footprintnetwork.org</a>).
	</p>

	<h3 class="full-story__lowtitle">La vision de BENU COUTURE</h3>
	<p class="full-story__txt">
		BENU COUTURE veut avant tout contribuer à ce que les choses, les composants, les matériaux, les objets, etc. qui sont déjà là soient utilisés le plus longtemps possible ..... Ce faisant, nous intégrons des études et des connaissances spécialisées pour filtrer l'offre d'objets usagés. En fait, il est logique, principalement d'un point de vue écologique, de retirer du marché certains produits qui fonctionnent probablement encore et/ou pourraient encore être utilisés, car les dommages qu'ils causent (potentiellement) aux personnes et à l'environnement seraient trop importants par rapport à l'achat d'un produit nouveau et amélioré. Nous ne nous appuyons pas ici sur les émotions et la bonne volonté, mais sur des études solides et sur l'expérience et les connaissances des experts. En cas de doute, nous conseillons de continuer à utiliser des choses intactes aussi longtemps que possible.
	</p>
	<p class="full-story__txt">
		Les matériaux de construction, les composants usagés destinés à être éliminés, les objets et matériaux de tous les jours qui sont encore en bon état sont mis à disposition par BENU REUSE et réutilisés au lieu d'être éliminés de la manière habituelle. Les fournisseurs et les acheteurs se rencontrent via une plateforme, une place de marché numérique, pour négocier les objets et matériaux usagés. Cela permet&nbsp;:
	</p>
	<ul class="full-story__bullets">
		<li>la réutilisation d'objets quotidiens en bon état ;</li>
		<li>le réassemblage de matériaux de construction et de composants usagés dans le même but, la réutilisation créative de matériaux usagés (tout en respectant les risques éventuels) et les matériaux restants qui n'ont pas encore été utilisés.</li>
	</ul>
	<p class="full-story__txt">
		La réutilisation de matériaux usagés et d'objets du quotidien permet d'économiser des matières premières, de l'énergie, des émissions et des déchets, de réduire la production nouvelle, le recyclage à forte intensité de ressources et l'espace nécessaire à la mise en décharge. Dans le même temps, elle peut contribuer à sensibiliser les consommateurs à un comportement plus conscient et à la prévention des déchets.
	</p>
	<p class="full-story__txt">
		Avec BENU REUSE, les particuliers ainsi que les administrations et les entreprises se voient offrir cette opportunité,
	</p>
	<ul class="full-story__bullets">
		<li>... de pouvoir transmettre des objets en bon état où ils pourront être réutilisés ;</li>
		<li>... pour trouver des objets en bon état et ainsi éviter d'acheter des objets neufs ;</li>
		<li>... pour réduire les coûts ;</li>
		<li>... pour agir/économiser de manière durable ;</li>
		<li>... s'informer sur les alternatives plus durables ;</li>
		<li>... pour connaître les entreprises et les organisations actives dans la collecte et/ou la vente d'articles usagés, réparés et/ou recyclés.</li>
	</ul>
	<p class="full-story__txt">
		BENU REUSE est non seulement en accord avec l'idée de protection de l'environnement, mais soulage également le porte-monnaie des réutilisateurs, puisque les articles usagés (à l'exception des frais de livraison) sont transmis gratuitement. Notre vision est celle d'une approche consciente de la consommation et des objets. Nos biens ont beaucoup plus de valeur lorsque nous pouvons choisir les choses plus consciemment, avec plus de connaissances, et que nous comprenons comment ces choses continuent d'être bénéfiques après que nous les avons possédées.
	</p>

	<h3 class="full-story__lowtitle">Comment est née l'idée de BENU REUSE&nbsp;?</h3>
	<p class="full-story__txt">
		Un premier bâtiment pilote BENU PROVISORIUM (> lien) a été érigé sur la Place de la Frontière à Esch-sur-Alzette. Les caractéristiques de cette construction, qui a ouvert ses portes à la fin de 2018, sont : ZeroWaste, une construction neutre en CO<sub>2</sub> et une culture locale, une isolation naturelle, plus de 94% de "déchets" dans la construction, une absence totale de nouveaux matériaux de construction (bitume, plâtre, ciment et mortier, silicone...), seules les vis sont nouvelles ;).
	</p>
	<p class="full-story__highlight">
		Nous tenons à souligner l'esprit pionnier de la municipalité d'Esch-sur-Alzette, qui a non seulement mis le site à notre disposition, mais qui a aussi généreusement soutenu le projet BENU depuis le début. Nous remercions la municipalité pour son grand soutien !
	</p>
	<p class="full-story__txt">
		Les bâtiments ont été construits avec des matériaux démantelés d'autres projets de construction, des maisons démolies, des stocks de restes d'entreprises, tels que des matériaux de construction usagés, des métaux et du bois, des portes et fenêtres usagées, entre autres. Les intérieurs et les façades ont également été conçus en upcycling à partir d'objets usagés et de divers types de déchets...... en plus de ZeroWaste également une construction neutre en CO2 et une isolation à partir de matière première renouvelable (Miscanthus (lien)).
	</p>
	<p class="full-story__txt">
		Créativité, cohésion sociale, participation : sous la direction d'artistes professionnels, plus de 140 bénévoles et personnes intéressées des environs immédiats, mais aussi de plus loin (jusqu'aux Pays-Bas, où un groupe de jeunes est venu travailler sur le projet de conception pendant une semaine) ont crée et conçu. Même des jeunes d'un établissement d'enseignement régional y ont participé. Dans le cadre d'un projet participatif d'un mois, un aménagement extérieur unique a été créé, qui raconte des histoires sur la cohésion sociale, documente l'énorme consommation de ressources des pays industrialisés et intègre les souvenirs des participants (voitures miniatures, baskets, disques, assiettes de DenHaag, pendentifs d'un groupe de rock bien connu et bien d'autres choses encore).
	</p>
	<p class="full-story__txt">
		La première boutique BENU a ouvert ses portes au BENU PROVISORIUM le 1er décembre 2018. On y vend principalement des créations de BENU COUTURE, qui sont conçues et produites en série au premier étage du bâtiment, dans un atelier où travaillent des designers et des tailleurs professionnels. Il s'agit exclusivement de vêtements UpCycling fabriqués à partir de tissus provenant de vêtements donnés par les habitants de la région.
	</p>
	<p class="full-story__txt">
		Lors de la collecte de matériaux de construction pour la réalisation du bâtiment pilote BENU PROVISORIUM et dans le cadre des travaux préparatoires du BENU VILLAGE, le premier écovillage de la Grande Région, nous avons pu établir de nombreux contacts avec des entreprises, des particuliers et des organisations qui nous ont fourni des matériaux usagés pour nos projets.
	</p>

	<h3 class="full-story__lowtitle">Pourquoi les entreprises travaillent-elles avec nous&nbsp;?</h3>
	<p class="full-story__txt">
		Bien sûr, elles économisent sur les coûts d'élimination. Mais après que ceux-ci aient été transmis aux clients, ce sont, d'après notre expérience, principalement les entrepreneurs qui se préoccupent de la consommation et de l'élimination quotidienne de produits et de matériaux parfois de grande qualité. Ils acceptent l'effort supplémentaire consistant à mettre de côté le bon matériel et à le rendre disponible pour une utilisation ultérieure. Nous remercions pour cet effort supplémentaire les entreprises engagées et tous les particuliers. En outre, nous avons été approchés avec des besoins concrets : nous avions besoin de quelques fenêtres pour une serre dans le jardin, de pots pour la confiture maison ...
	</p>
	<p class="full-story__txt">
		Jusque-là, nous avions examiné toutes les demandes une par une, téléphoné, écrit et posté beaucoup de choses. Grâce aux nombreuses expériences positives et à la prise de conscience du rôle important que joue la réutilisation dans une économie circulaire durable, le désir de développer l'idée de REUSE a mûri chez BENU. Nous ne voulions pas garder ces expériences pour nous et les utiliser uniquement pour nos propres projets. Toutes les parties intéressées devraient avoir la possibilité de participer...
	</p>
	<p class="full-story__txt">
		Le Luxembourg travaille activement à la mise en place et à l'expansion de bourses/lieux d'échange, par exemple sous la forme de boutiques d'échange dans les centres de recyclage... Ainsi, nous ne sommes pas des pionniers, mais des retardataires. Dans certains cas, nous sommes à la traîne par rapport aux pays européens qui ont mis en œuvre avec succès de tels concepts il y a de nombreuses années. BENU veut soutenir activement. Rattraper le temps perdu. BENU REUSE se présente explicitement comme un complément innovant aux initiatives locales de prévention des déchets.
	</p>
	<p class="full-story__txt">
		Afin de réaliser le démarrage du projet le plus rapidement possible, nous avons interrogé notre entourage à la recherche d'une solution pragmatique et axée sur les objectifs et avons présenté le projet. Nous avons rencontré un grand intérêt à la <a href="http://www.loschfondation.lu/" target="_blank">André Losch Fondation</a>. À court terme, nous avons eu la possibilité de mettre en œuvre le projet dans son intégralité :
	</p>
	<ul class="full-story__bullets">
		<li>le développement d'une nouvelle plateforme internet avec de nombreuses informations de fond,</li>
		<li>le recrutement de deux personnes, l'une d'entre elles recherchant la stabilité sociale,</li>
		<li>l'achat d'une camionnette de livraison qui nous permet d'optimiser les trajets et de réduire l'empreinte carbone correspondante.</li>
	</ul>
	<p class="full-story__highlight">
		Un grand merci à la <a href="http://www.loschfondation.lu/" target="_blank">André Losch Fondation</a> pour son soutien non bureaucratique, qui nous permet de démarrer le projet BENU REUSE avec la population!
	</p>

	<h3 class="full-story__lowtitle">Pourquoi rejoindre BENU REUSE&nbsp;?</h3>
	<p class="full-story__txt">
		Tous ceux qui veulent faire la différence et ne pas se contenter de mesures sympathiques mais manifestement insuffisantes pour protéger notre planète devraient se joindre à nous.
	</p>
	<p class="full-story__txt">
		<strong>Mes avantages en tant que fournisseur&nbsp;:</strong> Je donne à mes objets et matériaux qui sont encore en bon état la perspective d'être utilisés ultérieurement. En outre, je peux m'informer dans des textes faciles à comprendre sur ce que je dois éviter à l'avenir afin de réduire les déchets inutiles et parfois toxiques, voire de les éviter complètement. Que faire des déchets que je produis encore&nbsp;? Je peux trouver une réponse à cette question sur benureuse.lu. Une fois qu'un acheteur a été trouvé pour mes dons, BENU se charge du transport. Tout est gratuit pour moi. Cela me permet de gagner du temps, de ne pas devoir me rendre au centre de recyclage, d'éviter les frais d'élimination et, qui plus est, de faire quelque chose de bien pour quelqu'un d'autre. Une contribution active à la durabilité.
	</p>
	<p class="full-story__txt">
		<strong>Mes avantages en tant qu'acheteur&nbsp;:</strong> Je suis soutenu dans ma recherche d'articles et de matériaux. Je peux trouver des contacts avec des fournisseurs sur benureuse.lu. Je reçois les articles et le matériel gratuitement, je ne participe que symboliquement aux frais de livraison. Les économies réalisées par rapport à un achat neuf sont donc considérables. N'est-il pas vrai que de nombreuses personnes se sentent à l'aise de se débarrasser des choses "correctement" afin de leur donner un prétendu "recyclage" ! Mais combien d'entre nous recherchent consciemment et régulièrement des produits qui contiennent ces matières recyclables&nbsp;? En tant qu'acheteurs d'objets et de matériaux proposés, nous évitons le "re-" et/ou le downcycling (transformation d'un produit tout en réduisant sa qualité) et contribuons ainsi de manière importante et active à une durabilité efficace.
	</p>
	<p class="full-story__txt">
		<strong>Avantages pour les entreprises et les structures publiques&nbsp;:</strong> J'améliore mon image durable et je prends davantage conscience de ma responsabilité dans la société et tout simplement sur la terre. Je réduis également mes coûts d'élimination.
	</p>

	<h3 class="full-story__lowtitle">REUSE - partie d'une stratégie globale</h3>
	<p class="full-story__highlight">
		reduce  •  reuse / repair / share  •  recycle
	</p>
	<p class="full-story__txt">
		<strong>Reduce&nbsp;:</strong>  (anglais: réduction, évitement): En rejetant/évitant, vous apportez moins de déchets dans la maison. La plupart des déchets sont évités en rejetant simplement les articles superflus (par exemple, les emballages et les sacs inutiles). Moins nous consommons, moins nous devons produire et éliminer par la suite.
	</p>
	<p class="full-story__txt">
		<strong>Réutiliser / Réparer / Partager&nbsp;:</strong>  Il est optimal que les choses soient utilisées le plus longtemps possible. Il existe plusieurs façons de procéder : transmettre, partager, échanger, louer, réparer, acheter d'occasion. La réutilisation en fait également partie. Dans le cadre de l'UpCycling, nous changeons les choses en augmentant leur valeur, par exemple en produisant de nouveaux meubles modernes et de haute qualité à partir de vieux meubles démodés.
	</p>
	<p class="full-story__txt">
		<strong>Recycler&nbsp;:</strong>  Tout ce qui s'accumule encore malgré le rejet, la réduction et le réemploi/la réutilisation et dont on veut se débarrasser finit dans les déchets résiduels (décharge ou incinération ) ou peut en partie être remis au Wertstoffhof (centre de "recyclage"). La plupart des matières recyclables triées qui y sont collectées sont incinérées (l'incinération peut être déclarée comme "recyclage" si de l'énergie est récupérée au cours du processus). Dans le cas contraire, ils sont recyclés à la baisse, c'est-à-dire retraités avec une réduction de la qualité (ce processus est également déclaré comme "recyclage" sans commentaire). Seule une partie est réellement recyclée au sens strict du terme.
	</p>
	<p class="full-story__highlight">
		Exemple du plastique : 2 % du plastique collecté dans le monde est recyclé, 7 % est déclassé et 91 % finit dans les décharges, sur nos champs et en grande partie dans la mer
	</p>
	<p class="full-story__highlight">
		Au Luxembourg, la quasi-totalité des déchets résiduels est incinérée. Dans d'autres pays, comme le Portugal, l'Espagne ou la Grèce, plus de la moitié des déchets résiduels sont mis en décharge
	</p>
	<p class="full-story__txt">
		<strong>Mot clé ZERO DÉCHET&nbsp;:</strong>  <em>Zéro déchet signifie "pas d'ordures et pas de déchets". Il s'agit de réduire vos propres déchets et de minimiser les déchets inutiles. Le principe directeur suivi est : Réduire, Réutiliser, Recycler. En d'autres termes, réduire la consommation et éviter les déchets. Utiliser plus longtemps les choses qui sont déjà là, acheter des objets usagés et donner les objets inutilisés. Et le recyclage n'arrive qu'en troisième position. Le recyclage est important, mais il consomme toujours de l'énergie et ne fonctionne malheureusement pas de manière satisfaisante.</em> (<a href="https://www.greenpeace-energy.de/blog/handeln/kundenportraets/reduce-reuse-recycle-drei-r-zum-gluecklich-sein/" target="_blank">Olga Witt</a>, auteur de "Une vie sans déchets")
	</p>
	<p class="full-story__txt">
		Vous pouvez en savoir plus sur ZERO Waste sur <a href="https://zero-waste.lu/" target="_blank">zero-waste.lu</a> et <a href="https://environnement.public.lu/fr/offall-ressourcen/null-offall-letzebuerg.html" target="_blank">zero-offal-letzebuerg</a>.
	</p>

	<h3 class="full-story__lowtitle">REUSE et comportement du consommateur</h3>
	<p class="full-story__txt">
		Notre objectif : sensibiliser à la prévention des déchets et à un comportement plus conscient des consommateurs. De quoi ai-je vraiment besoin&nbsp;? Doit-il être neuf&nbsp;? Puis-je réparer, modifier et/ou réutiliser quelque chose&nbsp;?
	</p>
	<p class="full-story__txt">
		Déjà, lorsque j'achète de nouveaux produits, je tiens également compte du processus futur : le produit est-il durable, réparable&nbsp;? L'article peut-il être réutilisé ou recyclé&nbsp;? À la fin du cycle, est-il possible de s'en débarrasser d'une manière plus durable, voire inoffensive&nbsp;? Les facteurs décisifs sont notamment les ingrédients, la composition, le traitement (par exemple, éviter les matériaux composites, c'est-à-dire les matériaux qui sont collés ensemble (...) et qui ne peuvent donc être recyclés qu'au prix d'efforts considérables ou, comme dans la plupart des cas, pas du tout).
	</p>
	<p class="full-story__txt">
		Les biens de consommation durables sont durables, réutilisables, réparables, composés d'ingrédients séparables qui peuvent être réutilisés, recyclés ou éliminés sans danger (voir le principe <a href="https://www.c2ccertified.or/" target="_blank">Cradle2Cradle</a>). Les aspects sociaux sont également essentiels, bien que presque toujours dissimulés : où et comment l'objet ou le matériau a-t-il été produit, où et comment les composants contenus dans le produit ont-ils été produits, les conditions de production, de transformation, de transport et de distribution sont-elles humaines&nbsp;? 
	</p>
	<p class="full-story__txt">
		<strong><em>Pourquoi BENU REUSE fait-elle également le courtage d'articles qui ne répondent pas aux critères des biens de consommation durables&nbsp;?</em></strong>
	</p>
	<p class="full-story__txt">
		Nous avons décidé de définir nos critères pour la revente d'objets et de matériaux usagés de la manière la plus large possible. La réutilisation d'articles en bon état permet d'éviter l'achat de nouveaux produits ailleurs, avec la consommation de ressources et d'énergie que cela implique.
	</p>
	<p class="full-story__txt">
		Toutefois, les articles qui causent des dommages à la santé ou qui entraînent une pollution excessive de l'environnement (par exemple, une consommation excessive d'énergie) sont exclus (mot clé : pauvreté énergétique (*)). Vous pouvez trouver les critères sous-jacents dans le chapitre CRITERES de ce site web. Discutez avec nous ! Si vous avez des études supplémentaires, contactez-nous et devenez un membre actif de BENU REUSE Brain.
	</p>
	<p class="full-story__txt">
		<em>
			(*) Qu'est-ce que la précarité énergétique&nbsp;?<br/>
			"Le Royaume-Uni est le seul pays de l'UE à avoir défini la pauvreté énergétique. Là, sont considérés comme pauvres en énergie les ménages qui devraient consacrer plus de dix pour cent de leurs revenus aux coûts énergétiques nécessaires pour atteindre la norme de chauffage selon l'Organisation mondiale de la santé et pour répondre à d'autres besoins énergétiques nécessaires (notamment l’électricité)." 
		</em>
	</p>

	<h3 class="full-story__lowtitle">Facteur de bien-être</h3>
	<p class="full-story__txt">
		Oui, vous pouvez, non, vous devez vous sentir bien de participer et de contribuer à la réduction des déchets et des détritus. Super !
	</p>
	<p class="full-story__txt">
		Cependant, chez BENU, nous constatons que les gens ne font que participer à la collecte, nous donnent des vêtements, proposent éventuellement des choses sympas sur BENU REUSE, puis suivent immédiatement leur comportement habituel de consommateur. Soyons clairs : nous ne changeons pratiquement rien si nous ne modifions pas (de manière significative) notre comportement de consommation.
	</p>
	<p class="full-story__txt">
		Par conséquent : la participation est formidable ! Modifier son comportement de consommation en conséquence, c'est-à-dire donner ce qui est bon, réduire ce qui est neuf, mais promouvoir et demander ce qui est utilisé (par exemple aussi ici sur BENU REUSE), réparer, échanger, donner ..., est vraiment durable et une contribution décisive à la durabilité. C'est comme ça qu'on avance !
	</p>

</section>
@endsection

@section('scripts')
@endsection