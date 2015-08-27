/* Cabinet Switch */
	
	$(function() {
		
		$('.entrance .query').click(function() {
			$('.changeRole').slideToggle();
		});
		
		setSwitch();
		
		try {
			
			$('[name="role"]').bootstrapSwitch({ state: true }).on('switchChange.bootstrapSwitch', function(event, state) {
				sendAjax( state, 'ajax/change_role' );
			});
			
		} catch( e ) {
			console.log( e.type + ' : ' + e.message );
		}
		
		function sendAjax( state, url ) {
			
			console.log( '%s, %s', url, state );
			
			$.ajax({
				type: 'GET',
				url: url,
				data: {
					  id: +state
				},
				success: function( data ) {
					  
					setTimeout(function() {
						$('#overlay').hide();
						$('.bubblingG').hide();
						
						document.querySelector('#page').removeChild( document.querySelector('header') );
						
						if( window.location.pathname == '/' || window.location.pathname == '/default' ) {
							document.querySelector('#main-carousel').insertAdjacentHTML( 'beforeBegin', data );
						} else if( $('#page').has('.page-title').length ) {
							document.querySelector('.page-title').insertAdjacentHTML( 'beforeBegin', data );
						} else {
							document.querySelector('#main').insertAdjacentHTML( 'beforeBegin', data );
						}
						
						get.search();
						get.searchPost();
						get.cabinet();
						get.cabinetPost();
						
						setSwitch();
					}, 2000);
					
					$('#overlay').show();
					$('.bubblingG').show();
					  
				}
			});
		  
		}
		
		var get = {
			search: function() {
				$.getScript('js/perfect-scrollbar.jquery.js');
				$.getScript('js/autoComplete.js');
				$.getScript('js/main.js');
				$.getScript('js/cart.js');
				$.getScript('js/ajax_select.js');
			},
			searchPost: function() {
				$.post('../../../js/perfect-scrollbar.jquery.js');
				$.post('../../../js/autoComplete.js');
				$.post('../../../js/main.js');
				$.post('../../../js/cart.js');
				$.post('../../../js/ajax_select.js');
			},
			cabinet: function() {
				$.getScript('js/bootstrap-switch.js');
				$.getScript('js/main_nav.js');
				$.getScript('js/switcher.js');
			},
			cabinetPost: function() {
				$.getScript('js/bootstrap-switch.js');
				$.post('../../../js/main_nav.js');
				$.post('../../../js/switcher.js');
			}
		}
		
		function setSwitch() {
			var who = $('.entrance strong').text().trim();
			( who == 'Покупатель' ) ? $('[name="role"]').bootstrapSwitch({ state: false }) : $('[name="role"]').bootstrapSwitch({ state: true });
		}
		
	}());