<footer class="py-sm-5">
		<div class="container">
					<p style="text-align: center; color: #fff; font-size: 16px">© 2021 Department of Computer Science, University of Lagos.</a></p>
				
				<div class="clearfix"></div>
		</div>
	</footer>
    <script src="js/jquery-2.2.3.min.js"></script>
	<script src="js/minimal-slider.js"></script>
				<link rel="stylesheet" href="css/jquery-ui.css" />
				<script src="js/jquery-ui.js"></script>
				  <script>
						  $(function() {
							$( "#datepicker" ).datepicker();
						  });
				  </script>
	<script defer src="js/jquery.flexslider.js"></script>
	<script>
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				start: function (slider) {
					$('body').removeClass('loading');
				}
			});
		});
	</script>
    <script>
        window.onload = function () {
            document.getElementById("password1").onchange = validatePassword;
            document.getElementById("password2").onchange = validatePassword;
        }

        function validatePassword() {
            var pass2 = document.getElementById("password2").value;
            var pass1 = document.getElementById("password1").value;
            if (pass1 != pass2)
                document.getElementById("password2").setCustomValidity("Passwords Don't Match");
            else
                document.getElementById("password2").setCustomValidity('');
        }
    </script>
    <script src="js/move-top.js"></script>
    <script src="js/easing.js"></script>
    <script>
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();

                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <script>
        $(document).ready(function () {
             $().UItoTop({
                easingType: 'easeOutQuart'
            });
        });
    </script>
    <script src="js/SmoothScroll.min.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>