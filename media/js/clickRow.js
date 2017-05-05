$(document).ready(function() {
	
	/*
	Toiduaine lisamine toidukorda.
	*/
	var isActiveFood = false; // variable selleks, et kontrollida kas mingi tabeli row on selected
	// funktsioon teeb tabeli rowid klikitavaks
	$('#foodTable').on('click', '.clickable-row', function(event) {
		if($(this).hasClass('active')){
			$(this).removeClass('active');
			isActiveFood = false;
		} else {
			$(this).addClass('active').siblings().removeClass('active');
			isActiveFood = true;
		}
	});
	
	// 'lisa toiduaine' nupule vajutamise funktsioon
	$(document).on('click', '#addIngredient', function() {
		var ingredient = $('#foodTable').find('.clickable-row.active');
		var name = ingredient.find('.food-name').text();
		var quantity = $('#q').val();
		var pathArray = window.location.pathname.split('/');
		var date = pathArray[4] + "-" + pathArray[5] + "-" + pathArray[6];
		
		var postData = {
			'ingredientName' : name,
			'quantity' : quantity,
			'date' : date
		};
		
		if (quantity <= 0) {
			$('#q').val('');
		} else if (isActiveFood){
			
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
				
				if (parsedData.ingredient_energy == -1)
				{
					console.log('asd');
					var amount = $('#ingredientTable').find('tr[data-id="' + name + '"]').find('.amount').text();
					var newAmount = parseFloat(quantity) + parseFloat(amount);
					$('#ingredientTable').find('tr[data-id="' + name + '"]').find('.amount').text(newAmount);
				} else {
					$('#ingredientTable tr:last').after('<tr class="clickable-row" data-id="'+name+'"><td class="ingredient-name">'+name+'</td><td class="amount">'+quantity+'</td><td>'+parsedData[0].ingredient_energy+'</td><td>'+parsedData[0].carbohydrates+'</td><td>'+parsedData[0].fat+'</td><td>'+parsedData[0].protein+'</td></tr>');
				}
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
	
	/*
	Toiduaine toidukorrast eemaldamine.
	*/
	var isActiveMeal = false;
	$('#ingredientTable').on('click', '.clickable-row', function(event) {
		if($(this).hasClass('active')){
			$(this).removeClass('active');
			isActiveMeal = false;
		} else {
			$(this).addClass('active').siblings().removeClass('active');
			isActiveMeal = true;
		}
	});
	
	// 'eemalda toiduaine menüüst' nupule vajutamise funktsioon
	$(document).on('click', '#removeIngredient', function() {
		var ingredient = $('#ingredientTable').find('.clickable-row.active');
		var name = ingredient.find('.ingredient-name').text();
		var pathArray = window.location.pathname.split('/');
		var date = pathArray[4] + "-" + pathArray[5] + "-" + pathArray[6];
		
		console.log(name);
		var postData = {
			'ingredientName' : name,
			'date' : date
		};
		
		if (isActiveMeal){
			
		//console.log(postData);
		$.ajax({
			type: "GET",
			url: "http://localhost/index.php/FoodController/removeMealIngredient",
			data: postData,
			success: function(data) {
				
				var parsedData = $.parseJSON(JSON.stringify(data));
				console.log(data);
				$('#ingredientTable').find('.clickable-row.active').remove();
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