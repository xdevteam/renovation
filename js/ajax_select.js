/* -----------------------------------------------------
						AJAX FOR LOCATION 
	-------------------------------------------------------- */
	
	try {
		
		var region = $('[data-ajax="region"]');
		
	} catch( e ) {
		console.log( e.type + ' : ' + e.message );
	}
	
	$( region ).change(function() {
		var val = $( this ).val();
		var self = $( this ).attr('rel');
		
		sendAjax( val, self );
	});
	
	function sendAjax( val, self ) {
		$.ajax({
			type: 'POST',
			url: 'ajax/change_location',
			data: {
				id: val
			},
			success: function( data ) {
				deploy( data, self );
			}
		});
	}
	
	function deploy( data, self ) {
		var json = JSON.parse( data ),
			city;
		
		var id = json.id;
		var name = json.name;
		
		switch( self ) {
			case 'cart':
				city = $('[rel="cart-city"]');
				break;
			case 'account':
				city = $('[rel="city-account"]');
				break;
			case 'company_info':
				city = $('[rel="company_info_city"]');
				break;
			case 'company_location':
				city = $('[rel="company_info_city"]');
				break;
			case 'registr-buyer':
				city = $('[rel="registr-buyer-city"]');
				break;
			case 'registr-seller':
				city = $('[rel="registr-seller-city"]');
				break;
			default:
				break;
		}
		
		$( city ).html('');
		
		for(var i = 0; i<id.length; i++) {
			var option = document.createElement('option');
			option.setAttribute('value', id[i]);
			option.innerHTML = name[i];
			$( city ).append( option );
		}
	}