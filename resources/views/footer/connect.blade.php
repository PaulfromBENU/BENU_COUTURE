<section class="footer-connect">
	<p class="text-center">
		Restons toujours connectés <span class="primary-color" style="font-weight: 600;">@benucouture</span>
	</p>
	<div class="flex justify-start footer-connect__pictures">
		@for($i = 0; $i < 10; $i++)
			<div class="footer-connect__pictures__img-container">
				<img src="{{ asset('images/pictures/insta.png') }}">
			</div>
		@endfor
	</div>
</section>