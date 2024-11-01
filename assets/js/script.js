jQuery(document).ready(function($) {
    //get count products after adding to cart
	$("body").on("click", ".add_to_cart_button", function (event) {

		setTimeout(function(){
          
			jQuery.post(
		        ajax_object.ajax_url,{
		            'action':'woo_sp_cart_count',          
		        },
		        function(data) {
		            $('.woo_sp_cart_count').html(data.substring(0, data.length - 1)); 
		        }
		    );
           
        }, 1500);   

    });	
});	