<script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="assets/js/vendor/bootstrap.min.js"></script>
<script src="assets/js/jquery.ajaxchimp.min.js"></script>
<script src="assets/js/jquery.nice-select.min.js"></script>
<script src="assets/js/jquery.sticky.js"></script>
<script src="assets/js/nouislider.min.js"></script>
<script src="assets/js/countdown.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>

<!--gmaps Js-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="assets/js/gmaps.min.js"></script>
<script src="assets/js/main.js"></script>


<script>
	window.onload = () => {
		if ($("#overlay")) {
			setTimeout(function() {
				$("#overlay").addClass('animate__animated animate__fadeOut');

				setTimeout(function() {
					$("#overlay").remove();
				}, 1000);
			}, 200);
		}
	};
</script>