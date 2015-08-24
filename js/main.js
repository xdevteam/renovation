$(document).ready(function() {
	
	/* SEARCHING DROPDOWN */
	
	var searchIcon = $('.search-select-icon'),
		dropDown = $('.searching-dropdown'),
		helpInput = $( dropDown ).find('[name="searchCityName"]'),
		iconSpan = $( searchIcon ).children().first();
		
	$( searchIcon ).click(function() {
		iconChange();
		$( dropDown ).css('opacity') == 0 ? showDropDown() : hideDropDown();
	});
	
	// ICON CHANGE
	
	var iconChange = function() {
		if( $( iconSpan ).hasClass('fa fa-angle-down') ) {
			$( iconSpan ).removeClass('fa fa-angle-down');
			$( iconSpan ).addClass('fa fa-angle-up');
		} else {
			$( iconSpan ).removeClass('fa fa-angle-up');
			$( iconSpan ).addClass('fa fa-angle-down');
		}
	}
	
	// SHOW
	
	function showDropDown() {
		$( dropDown ).css('visibility', 'visible');
			
		$( dropDown ).animate({
			opacity: 1,
			top: '100%',
			width: $('#location-select-button').width() + 40 + 'px',
		}, 500);
		
		$( helpInput ).val('');
		
		if( $( promptDiv ).is(':visible') ) $( promptDiv ).remove();
	}
		
	// HIDE 
	
	var hideDropDown = function() {
		$( dropDown ).animate({
			opacity: 0,
			top: '110%',
		}, 500, function() {
			$( this ).css('visibility', 'hidden');
		});
	}

	/* DROPDOWN CLICK */
	
	$( dropDown ).click(function(ev) {
		if( ev.target.tagName == 'SPAN' ) {
			var text = ev.target.textContent;
			
			$('#location-select-button .searching-title').text( text );
			$('[name="certainCity"]').val( text );
			
			hideDropDown();
	
		} else if( ev.target.tagName == 'INPUT' ) {
			
			ev.stopPropagation();
			
		}
	});
	
	/* CITIES ARRAY */
	
	var cities = ['Винница', 'Луцк', 'Днепропетровск', 'Житомир', 'Ужгород', 'Запорожье',
		'Ивано-Франковск', 'Киев', 'Кировоград', 'Львов', 'Николаев', 'Одесса', 'Полтава',
		'Ровно', 'Сумы', 'Тернополь', 'Харьков', 'Херсон', 'Черкассы', 'Чернигов', 'Черновцы'
	];
	
	/* AUTOCMPLETE INSERT */

	try {
		var search = document.getElementsByName('searchCityName')[0];
		
		if( search ) {
			var promptDiv = autoComplete(search, cities, hideDropDown, iconChange);
		}
	} catch(e) {
		console.warn( 'name : %s, message : %s', e.name, e.message );
	}
	
	/* FILL IN CITIES */
	
	(function() {
		try {
			var dropDownUl = document.querySelector('.searching-dropdown ul');
			dropDownUl.innerHTML = '';
			
			fill();
		} catch(e) {
			console.warn( 'name : %s, message : %s', e.name, e.message );
		}
		
		function fill() {
			for(var i=0; i<cities.length; i++) {
				var li = document.createElement('li');
				
				var a = document.createElement('a');
				a.setAttribute('href', '#');
				
				var span = document.createElement('span');
				span.innerHTML = cities[i];
				
				a.appendChild(span);
				li.appendChild(a);
				
				dropDownUl.appendChild(li);
			}
		}
		
	})();
	
	/* NICE SCROLLBAR */
	
	(function() {
		
		//$('#location-select-button .sub-nav ul').perfectScrollbar();
		$('.searching-dropdown .scrollbar-inner').scrollbar();
		
	}());
	
	/* ACCORDION */
	
	try {
		$('.foot-accordion').accordion({
			collapsible: true
		});
	} catch( e ) {
		console.warn( 'name : %s, message : %s', e.name, e.message );
	}
	
	// Styles
	
	$('.accor-content, .accor-link').css({
		'background': 'transparent',
		'border': 0
	});
	
	$('.ui-accordion-header-icon').remove();
	
	// Arrow
	
	$('.foot-accordion a').click(function(ev) {
		ev.preventDefault();
		
		if ( $( this ).find('.accor-toggle-icon i').hasClass('fa fa-angle-down') ) {
			
			$( this ).find('.accor-toggle-icon i').removeClass('fa fa-angle-down');
			$( this ).find('.accor-toggle-icon i').addClass('fa fa-angle-up');
			
		} else {
			
			$( this ).find('.accor-toggle-icon i').removeClass('fa fa-angle-up');
			$( this ).find('.accor-toggle-icon i').addClass('fa fa-angle-down');
			
		}
	});
	
	/* ARROW UP */
	
	var arrow = document.querySelector('.scroll-top');
	
	window.addEventListener('scroll', function() {
		if( window.pageYOffset > 250 ) {
			arrow.classList.add('scroll-on');
		} else {
			arrow.classList.remove('scroll-on');
		}	
	});
	
	arrow.addEventListener('click', function(ev) {
		ev.preventDefault();
		
		var top = setInterval(function() {
			if ( window.pageYOffset > 0 ) {
				document.body.scrollTop ? document.body.scrollTop -= 20 : document.documentElement.scrollTop -= 20;
			} else {
				clearInterval( top );
			}
		}, 10);
	});
	
	/* EDIT ITEM. SORTABLE */
	
	$(function() {
		try {
			$('.sortable').sortable();
		} catch( e ) {
			console.warn( 'name : %s, message : %s', e.name, e.message );
		} 
	});
	
	/* PAGINATION */
	
	(function() {
		var links = document.querySelectorAll('.cat-row > .pagination > a'),
			current = document.querySelector('.cat-row > .pagination > strong'),
			pagination = document.querySelector('.pagination');
		
		try {
			if( current ) {
				var def = Lia('#', current.innerHTML, false);
				pagination.replaceChild(def, current);
				go();
			}
		} catch( e ) {
			console.warn( 'name : %s, message : %s', e.name, e.message );
		}
		
		function Lia(href, text, bool) {
			var li = document.createElement('li');
			if( !bool ) li.className = 'active';
			var a = document.createElement('a');
			a.innerHTML = text;
			a.setAttribute('href', href);
			li.appendChild(a);
			return li;
		}
		
		function go() {
			for(var i = 0; i<links.length; i++) {
				var li = Lia(links[i].getAttribute('href'), links[i].innerHTML, true);
				pagination.replaceChild(li, links[i]);
			}
		}
	}());
	
	
	/* TRIMING PRODUCT NAMES */
	
	(function() {
		var carousels = $('.marketing-carousel'),
			catItems = $('.cat-content-row-item'),
			sidebarCarousels = $('.widget-top-rated');
			
		try {
			if( carousels.length ) trimTitle( carousels, 25 );
			if( catItems.length ) trimTitle( catItems, 40 );
			if( sidebarCarousels.length ) trimTitle( sidebarCarousels, 16 );
		} catch( e ) {
			console.warn( 'name : %s, message : %s', e.name, e.message );
		}
		
		function trimTitle( itemsList, maxlength ) {
			
			[].forEach.call(itemsList, function( item ) {
				var titles = $( item ).find('.product-title');
				[].forEach.call(titles, function(title) {
					var text = $( title ).text().trim();
					if( text.length > maxlength ) $( title ).text( text.slice(0, maxlength) + '..' );
				});
			});
		
		}
		
	})();
	
	/* CABINET TOOLTIP */
	
	(function() {
		var view = $('.view_my_profile');
		try{
			if( view ) {
				$( view ).tooltip({
					title: 'Посмотреть профиль моей компании',
					placement: 'bottom'
				});
			}
		} catch( e ) {
			console.warn('name : $s, message : $s'. e.name, e.message);
		}
		
	})();
	
	
});