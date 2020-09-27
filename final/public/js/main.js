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

	$('.cart_quantity_up').on('click', addPositionsToBasket);

	function addPositionsToBasket(even){
		let idProduct = event.srcElement.dataset.name;
		let values = `id=${idProduct}`;
		$.ajax({
			url: "index.php?path=basket/addPositionToBasket/",
			type: "POST",
			//data:'id='+idProduct,
			data:values,
			error: function() {alert("Что-то пошло не так...");},
			success: function(answer){
				correctViewBasket(JSON.parse(answer).content_data.PositionBasket);
			},
		})
	}

	function checkSituationBasket(data){
		const allPosition = document.querySelectorAll('.cart_quantity_input');

		for (let stringHTML of allPosition) {
			let flag = 0;
			for (let elem of data){
				if (stringHTML.id == ('count'+elem.id)) {
					flag = 1;
					//break;
				}
			}
			if (flag == 0){

				document.querySelector('#'+stringHTML.id).value = 0;

				let idSummElem = '#summ'+stringHTML.id.slice(5);
				document.querySelector(idSummElem).innerHTML = 0;

			}
		}
	}

	function correctViewBasket(data){

		let fullSumm = 0;
		for (let elem of data) {
			let idElem = '#count'+ elem.id;
			document.querySelector(idElem).value = elem.count;
			let idSummElem = '#summ'+ elem.id;
			document.querySelector(idSummElem).innerHTML = (+elem.count) * (+elem.price);
			fullSumm += (+elem.count) * (+elem.price);
		}
		document.querySelector('#full_summ').innerHTML = fullSumm;
	}


	$('.cart_quantity_delete').on('click', deletePositionFromBasket);

	function deletePositionFromBasket(even){
		console.log(event);

		let idProduct = event.srcElement.dataset.id;
		console.log(idProduct);
		let values = `id=${idProduct}&count=2`;

		$.ajax({
			url: "index.php?path=basket/deletePositionFromBasket/",
			type: "POST",
			//data:'id='+idProduct,
			data:values,
			error: function() {alert("Что-то пошло не так...");},
			success: function(answer){
				let data = JSON.parse(answer).content_data.PositionBasket;
				checkSituationBasket(data);
				correctViewBasket(data);
			},
		})
	}

	$('.cart_quantity_down').on('click', deleteCountPositionToBasket);

	function deleteCountPositionToBasket(even, countOfproduct=1){
		console.dir(event);

		let idProduct = event.srcElement.dataset.name;
		console.log(idProduct);
		let values = `id=${idProduct}&count=${countOfproduct}`;

		$.ajax({
			url: "index.php?path=basket/deletePositionFromBasket/",
			type: "POST",
			//data:'id='+idProduct,
			data:values,
			error: function() {alert("Что-то пошло не так...");},
			success: function(answer){
				let data = JSON.parse(answer).content_data.PositionBasket;
				checkSituationBasket(data);
				correctViewBasket(data);
			},
		})
	}

	$('.add-to-cart').on('click', addToBasket);
	$('.cart').on('click', addToBasket);
	
	function addToBasket(even){
		let idProduct = event.srcElement.dataset.name;
		let count = 1;
		if (document.querySelector('.product-details-count')) {
			count = Math.round(document.querySelector('.product-details-count').value);
		}
		if ((count < 1)||(isNaN(count))||(count > 5)) {
			alert("Введите корректное количество товара!");
			return false;
		}
		let values = `id=${idProduct}&count=${count}`;
		$.ajax({
			url: "index.php?path=basket/add/",
			type: "POST",
			//data:'id='+idProduct,
			data:values,
			error: function() {alert("Что-то пошло не так...");},
			success: function(answer){
				let val = JSON.parse(answer);
				document.querySelector('.shop-menu-basket').innerHTML = "Корзина("+val.content_data+")";
				alert("Товар добавлен в корзину!");
			},
		})
	}

 /*
		$.ajax({
			url: "index.php?path=basket/add/",
			type: "POST",
			data:{
				id_good: 1,
				quantity: 1
			},
			error: function() {alert("Что-то пошло не так...");},
			success: function(answer){
				alert("Товар добавлен в корзину!");
			},
			dataType : "json"
		})

		*/



});


/*
function addToBasket(num){
	alert(num);
}

*/