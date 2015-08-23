$(function() {
	
	// CATEGORIES ACCORDION
		
	$('.cat-parent > a').click(function(ev) {
		ev.preventDefault();
		$('.product-cat li ul').attr('style', 'display:none;');
		$( this ).next().next().slideToggle();
	});
	
	// CAROUFREDSEL
	
	(function() {
		
		function Set( parent, next, prev, items, duration ) {
			this.parent = parent;
			this.next = next;
			this.prev = prev;
			this.items = items;
			this.duration = duration;
			this.exist = document.querySelector( parent );
		}
		
		var most_popular = new Set( 
			'#most-popular .carou-fred-sel',
			"#car_next",
			"#car_prev", 
			5, 
			1000 
		);
		var already_seen = new Set(
			'#already-seen .carou-fred-sel',
			"#car_next_",
			"#car_prev_",
			5,
			1000
		);
		
		try {
			
			if( most_popular.exist ) createCarousel( most_popular );
			if( already_seen.exist ) createCarousel( already_seen );
			
		} catch( e ) {
			console.warn('name : %s, message : %s', e.name, e.message);
		}
		
		function createCarousel( set ) {
			$( set.parent ).carouFredSel({
				items: set.items,
				direction: "top",
				height: '360px',
				align: "center",
				auto: {
					play: false
				},
				scroll: {
					items: 1,
					duration: set.duration,
					easing: "swing"
				},
				prev: {
					button: set.next
				},
				next: {
					button: set.prev
				}
			});
		}
		
		$('.caroufredsel_wrapper').css({
			'marginBottom': '0',
			'minHeight': '340px',
			'maxHeight': '1000px'
		});
		
	})();	
		
});