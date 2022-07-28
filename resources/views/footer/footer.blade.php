<footer class="footer">
	<div class="benu-container">
		<div class="flex flex-start flex-wrap footer__lists">
			<div class="footer__lists__col">
				<h4>{{ __('footer.footer-title-1') }}</h4>
				<ul>
					<li><a href="{{ route('model-'.app()->getLocale()) }}">{{ __('footer.footer-list-1-1') }}</a></li>
					<li><a href="{{ route('vouchers-'.app()->getLocale()) }}">{{ __('footer.footer-list-1-2') }}</a></li>
					<li><a href="{{ route('dashboard', ['locale' => app()->getLocale()]) }}">{{ __('footer.footer-list-1-3') }}</a></li>
					<li><a href="#">{{ __('footer.footer-list-1-4') }}</a></li>
					<li><a href="{{ route('partners-'.app()->getLocale()) }}">{{ __('footer.footer-list-1-5') }}</a></li>
					<li><a href="{{ route('header.participate-'.app()->getLocale()) }}">{{ __('footer.footer-list-1-6') }}</a></li>
					<!-- <li><a href="#">{{ __('footer.footer-list-1-7') }}</a></li> -->
				</ul>
			</div>
			<div class="footer__lists__col">
				<h4>{{ __('footer.footer-title-2') }}</h4>
				<ul>
					<li><a href="{{ route('news-'.app()->getLocale()) }}">{{ __('footer.footer-list-2-1') }}</a></li>
					<li><a href="#">{{ __('footer.footer-list-2-2') }}</a></li>
					<li><a href="{{ route('full-story-'.app()->getLocale()) }}">{{ __('footer.footer-list-2-3') }}</a></li>
					<li><a href="{{ route('about-'.app()->getLocale()) }}">{{ __('footer.footer-list-2-4') }}</a></li>
					<li><a href="#">{{ __('footer.footer-list-2-5') }}</a></li>
					<li><a href="#">{{ __('footer.footer-list-2-6') }}</a></li>
					<li><a href="{{ route('footer.policy-'.app()->getLocale()) }}">{{ __('footer.footer-list-2-7') }}</a></li>
					<li><a href="{{ route('footer.legal-'.app()->getLocale()) }}">{{ __('footer.footer-list-2-8') }}</a></li>
				</ul>
			</div>
			<div class="footer__lists__col">
				<h4>{{ __('footer.footer-title-3') }}</h4>
				<ul>
					<li><a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-faq')]) }}">{{ __('footer.footer-service-1') }}</a></li>
					<li><a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-delivery')]) }}">{{ __('footer.footer-service-2') }}</a></li>
					<li><a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-sizes')]) }}">{{ __('footer.footer-service-3') }}</a></li>
					<li><a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-return')]) }}">{{ __('footer.footer-service-4') }}</a></li>
					<li><a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-payment')]) }}">{{ __('footer.footer-service-5') }}</a></li>
					<li><a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-care')]) }}">{{ __('footer.footer-service-6') }}</a></li>
					<li><a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-shops')]) }}">{{ __('footer.footer-service-7') }}</a></li>
					<li><a href="#">{{ __('footer.footer-sitemap') }}</a></li>
				</ul>
			</div>
			<div class="footer__lists__col">
				<h4>{{ __('footer.footer-title-4') }}</h4>
				<p class="footer__contact">
					<span class="primary-color"><strong>BENU Village Esch asbl</strong></span>
					<br/>51 rue d'Audun
					<br/>4018 Esch-sur-Alzette
					<br/>Luxembourg
					<br/><span class="primary-color">+352 27 91 19 49</span>
				</p>
				<ul style="margin-bottom: 45px;">
					<li><a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-contact')]) }}">{{ __('footer.footer-contact') }}</a></li>
				</ul>
				<h4>{{ __('footer.footer-title-5') }}</h4>
				<div class="flex justify-start">
					<a href="https://www.facebook.com/benuvillageesch/" target="_blank" class="footer__social"><i class="fab fa-facebook-f"></i></a>
					<a href="https://www.instagram.com/benu_village/" target="_blank" class="footer__social"><i class="fab fa-instagram"></i></a>
					<a href="https://lu.linkedin.com/company/benu-village-esch" target="_blank" class="footer__social"><i class="fab fa-linkedin-in"></i></a>
				</div>
			</div>
		</div>
		<div class="footer__copyright">
			&copy; 2022&nbsp;- Kamoo Studio&nbsp;- BENU Village Esch Asbl
		</div>
	</div>
	<div class="footer__logo-container">
		@svg('logo_benu_couture', 'footer__logo-container__logo')
	</div>
</footer>