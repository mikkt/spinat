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
		
		// TODO backend validation w/ language support
		if (quantity <= 0) {
			alert('quantity <= 0');
			$('#q').val('');
		} else {
			
		//console.log(postData);
		//console.log("http://localhost/index.php/FoodController/addMealIngredient");
		$.ajax({
			type: "GET",
			url: "http://localhost/index.php/FoodController/addMealIngredient",
			data: postData,
			success: function(ingredientData) {
				var stringData = JSON.stringify(ingredientData);
				var parsedData = $.parseJSON(JSON.stringify(ingredientData));
				//console.log(parsedData);
				
			$('#ingredientTable tr:last').after('<tr><td>'+name+'</td><td>'+quantity+'</td><td>'+parsedData[0].ingredient_energy+'</td><td>'+parsedData[0].carbohydrates+'</td><td>'+parsedData[0].fat+'</td><td>'+parsedData[0].protein+'</td></tr>');
			},
			error: function(xhr, status, error) {
					console.log(xhr);
					console.log(status);
					console.log(error);
				}
		});
		}
		return false;
	});
});