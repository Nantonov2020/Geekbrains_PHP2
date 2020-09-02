/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
});

function indexAjax(){
	$.ajax({
        type:'POST',
        url: 'index2.php',
        data: 'id='+document.querySelector('.hidden_field').value,
        success:function(data){

			if (data.length < 20) {
				console.dir(document.querySelector('.index__button'));
				document.querySelector('.index__button').style.visibility='hidden';

			} else {

			let products = JSON.parse(data);

			products.forEach(function(element){
				document.querySelector('.features_items').innerHTML += '<div class="col-sm-4">'+
				
				'<div class="product-image-wrapper">'+
					'<div class="single-products">'+
						'<div class="productinfo text-center">'+
							'<a href="product.php?id='+ element.id +'">'+
							'<img src="templates/images/home/'+ element.image +'" alt="" width="269" height="249"/>'+
							'<h2>'+ element.price +' руб.</h2>'+
							'<p>'+ element.name +'</p>'+
							'</a>'+
							'<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>'+
						'</div></div></div></div>';

					//	if (element.is_new == 1)	{
					//		document.querySelector('.features_items').innerHTML +='<img src="templates/images/home/new.png" class="new" alt="" ></div></div></div>';
					//	}else{
					//		document.querySelector('.features_items').innerHTML +='</div></div></div>';
					//	}


			document.querySelector('.hidden_field').value = +element.id + 1;
			});
		}
        }
	});

}
