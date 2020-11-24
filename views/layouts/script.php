<script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
<script src="assets/js/popper.min.js"></script>
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
	
	
	// Tắt overlay khi trang web đã tải xong.
    if ($("#overlay")) { 
        setTimeout(function() {
            $("#overlay").addClass('animate__animated animate__fadeOut');
            setTimeout(function() {
                $("#overlay").remove();
            }, 1000);
        }, 200);
	}

	// Hẹn giờ đếm ngược ưu đãi.
	if($("#clockdiv")){ 
		var deadline = new Date("2020-12-06");
		initializeClock('clockdiv', deadline);
	}
};
$(function() {
    $(".addtocart").on('click', function() {
        var e = this;
        var id = $(e).attr('value');
        $.ajax({
            type: "POST",
            url: 'shop.php?action=addToCart&id=' + id + '&quantity=1',
            success: function(data) {
                $("#linkToCart").text('Giỏ hàng (' + data + ')');
            }
        });
        $(e).children('.ti-bag').removeClass('ti-bag').addClass(
            'ti-check animate__animated animate__headShake');
        $(e).children('p').text("Đã thêm");
        setTimeout(function() {
            $(e).children('.ti-check').removeClass(
                'ti-check animate__animated animate__headShake').addClass('ti-bag');
            $(e).children('p').text("Thêm vào giỏ");
        }, 1000);
    });

    $(".deleteItem").on('click', function() {
        var e = this;
        var id = $(e).data('value');
        $.ajax({
            type: "POST",
            url: 'shop.php?action=deleteItem&id=' + id,
            success: function(data) {
                console.log(data);
                e.closest('tr').remove();
            }
        });
    });
});

function quantityUpdate(e, id) {
    $.ajax({
        type: "GET",
        url: 'cart.php?action=updateCartAJAX&id=' + id + '&quantity=' + e.value,
        success: function(data) {
            data = JSON.parse(data);
            $('#product-' + id + ' .total').text(data[0] + "");
            $('.cart-total').text(data[1] + "");

        }
    });
}
</script>