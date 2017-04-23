$(document).ready(function() {
	$('#foodTable').on('click', '.clickable-row', function(event) {
		if($(this).hasClass('active')){
			$(this).removeClass('active');
		} else {
			$(this).addClass('active').siblings().removeClass('active');
		}
	});
	
	$(document).on('click', '#addIngredient', function() {
		var ingredient = $('.clickable-row.active');
		var name = ingredient.find('.ingredient-name').text();
		var quantity = $('#q').val();
		var pathArray = window.location.pathname.split('/');
		var date = pathArray[4] + "-" + pathArray[5] + "-" + pathArray[6];
		
		var postData = {
			'ingredientName' : name,
			'quantity' : quantity,
			'date' : date
		};
		
		console.log(postData);
		 console.log("http://localhost/index.php/FoodController/addMealIngredient");
		$.ajax({
			type: "POST",
			url: "http://localhost/index.php/FoodController/addMealIngredient",
			data: postData,
			success: function() {
				
			},
			error: function(xhr, status, error) {
					console.log(xhr);
					console.log(status);
					console.log(error);
				}
		});
		return false;
	});
});