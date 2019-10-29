$(document).ready(function() {
	// $("#create_payment").click(function() {
	// 	var sum = $("#sum").val();
	// 	var tel = $("#tel").val();
	// 	var email = $("#email").val();

	// 	ajaxPayment(sum, tel, email);

	// });
});


function ajaxPayment(sum, tel, email) {
	  $.post (

    '/home/payment',
    {
    _token: $('meta[name="csrf-token"]').attr('content'),
      sum: sum,
      tel: tel,
      email: email
    },

    function(msg) {

    	alert(msg);
        // <input id="`+s+`" type="text" hidden value="`+res.status+`">
    }


    );
}