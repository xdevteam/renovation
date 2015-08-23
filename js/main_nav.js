/* Navigation dropdowns */
	
	$('#main-nav > li').hover(
		function() {
			var subNavOut = $( this ).find('.sub-nav.out-level');
			
			$( subNavOut ).css('visibility', 'visible').animate({
				opacity: .9
			}, 300);
		},
		function() {
			var subNavOut = $( this ).find('.sub-nav.out-level');
			
			$( subNavOut ).css('visibility', 'hidden').animate({
				opacity: 0
			}, 300);
		}
	);
	
	$('.downItem').hover(
		function() {
			var subNavInn = $( this ).find('.inn-level');
			
			$( subNavInn ).css('visibility', 'visible').animate({
				opacity: .9
			}, 300);
		},
		function() {
			var subNavInn = $( this ).find('.inn-level');
			
			$( subNavInn ).css('visibility', 'hidden').animate({
				opacity: 0
			}, 300);
		}
	);