	
	<!-- footer -->
		<footer class="footer" data-background-color="black">
			<div class="container">
				<nav class="float-left">
					<ul>
						<li>
							<a href="https://www.creative-tim.com/">
								Creative Tim
							</a>
						</li>
						<li>
							<a href="https://www.creative-tim.com/presentation">
								About Us
							</a>
						</li>
						<li>
							<a href="https://www.creative-tim.com/blog">
								Blog
							</a>
						</li>
						<li>
							<a href="https://www.creative-tim.com/license">
								Licenses
							</a>
						</li>
					</ul>
				</nav>
				<div class="copyright float-right">
					&copy;
					<script>
						// document.write(new Date().getFullYear())
					</script>, made with <i class="material-icons">favorite</i> by
					<a href="https://www.creative-tim.com/" target="_blank">Creative Tim</a> for a better web.
				</div>
			</div>
		</footer>
	<!-- end footer -->

	
	<script>
		$(document).ready(function() {
			//init DateTimePickers
			materialKit.initFormExtendedDatetimepickers();

			// Sliders Init
			materialKit.initSliders();
		});

		function scrollToDownload() {
			if ($('.section-download').length != 0) {
				$("html, body").animate({
					scrollTop: $('.section-download').offset().top
				}, 1000);
			}
		}
		
	</script>
</body>

</html>
