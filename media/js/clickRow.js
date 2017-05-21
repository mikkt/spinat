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
		if (pathArray.length < 4) {
			var today = new Date();
			var date = today.getFullYear()+"-"+(today.getMonth()+1)+"-"+today.getDate();
		}
		
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
					var amount = $('#ingredientTable').find('tr[data-id="' + name + '"]').find('.amount').text();
					var newAmount = parseFloat(quantity) + parseFloat(amount);
					$('#ingredientTable').find('tr[data-id="' + name + '"]').find('.amount').text(newAmount);
				} else {
					$('#ingredientTable tr:last').after('<tr class="clickable-row" data-id="'+name+'"><td class="ingredient-name">'+name+'</td><td class="amount">'+quantity+'</td><td>'+parsedData[0].ingredient_energy+'</td><td>'+parsedData[0].carbohydrates+'</td><td>'+parsedData[0].fat+'</td><td>'+parsedData[0].protein+'</td></tr>');
				}
				
				//Toidukorra kokku tabeli uuendamine
				var date = pathArray[4] + "-" + pathArray[5] + "-" + pathArray[6];
				if (pathArray.length < 4) {
				var today = new Date();
				var date = today.getFullYear()+"-"+(today.getMonth()+1)+"-"+today.getDate();
				}
				var dateArr = {
					'date' : date
				};
				$.ajax({
					type: "GET",
					url: "http://localhost/index.php/FoodController/updateMealTotal",
					data: dateArr,
					success: function(data) {
						var parsedSumData = $.parseJSON(JSON.stringify(data));
						if ($('#ingredientSumTable').find('td[data-id="total-amount"]').text().length < 1) {
							$('#ingredientSumTable tr:last').after('<tr class="total-row"><td>Kokku</td><td data-id="total-amount">'+parsedSumData[0][0].sum_amount+'</td><td data-id="total-energy">'+parsedSumData[0][0].sum_ingredient_energy+'</td><td data-id="total-carbs">'+parsedSumData[0][0].sum_carbohydrates+'</td><td data-id="total-fat">'+parsedSumData[0][0].sum_fat+'<td data-id="total-protein">'+parsedSumData[0][0].sum_protein+'</td></tr>');
						} else {
							$('#ingredientSumTable').find('td[data-id="total-amount"]').text(parsedSumData[0][0].sum_amount);
							$('#ingredientSumTable').find('td[data-id="total-energy"]').text(parsedSumData[0][0].sum_ingredient_energy);
							$('#ingredientSumTable').find('td[data-id="total-carbs"]').text(parsedSumData[0][0].sum_carbohydrates);
							$('#ingredientSumTable').find('td[data-id="total-fat"]').text(parsedSumData[0][0].sum_fat);
							$('#ingredientSumTable').find('td[data-id="total-protein"]').text(parsedSumData[0][0].sum_protein);
						}
					},
					error: function(xhr, status, error) {
						console.log(xhr);
						console.log(status);
						console.log(error);
					}
				});
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
		if (pathArray.length < 4) {
			var today = new Date();
			var date = today.getFullYear()+"-"+(today.getMonth()+1)+"-"+today.getDate();
		}		
		
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
				$('#ingredientTable').find('.clickable-row.active').remove();
				
				// uuendab toidukorra sum tabelit
				var date = pathArray[4] + "-" + pathArray[5] + "-" + pathArray[6];
				if (pathArray.length < 4) {
				var today = new Date();
				var date = today.getFullYear()+"-"+(today.getMonth()+1)+"-"+today.getDate();
				}
				var dateArr = {
					'date' : date
				};
				$.ajax({
					type: "GET",
					url: "http://localhost/index.php/FoodController/updateMealTotal",
					data: dateArr,
					success: function(data) {
						console.log(data)
						var parsedSumData = $.parseJSON(JSON.stringify(data));
						if (parsedSumData.sum_amount == -1) {
							$('#ingredientSumTable').find('.total-row').remove();
						} else {
							$('#ingredientSumTable').find('td[data-id="total-amount"]').text(parsedSumData[0][0].sum_amount);
							$('#ingredientSumTable').find('td[data-id="total-energy"]').text(parsedSumData[0][0].sum_ingredient_energy);
							$('#ingredientSumTable').find('td[data-id="total-carbs"]').text(parsedSumData[0][0].sum_carbohydrates);
							$('#ingredientSumTable').find('td[data-id="total-fat"]').text(parsedSumData[0][0].sum_fat);
							$('#ingredientSumTable').find('td[data-id="total-protein"]').text(parsedSumData[0][0].sum_protein);
						}
					},
					error: function(xhr, status, error) {
						console.log(xhr);
						console.log(status);
						console.log(error);
					}
				});
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