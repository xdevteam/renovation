/* Top Fixed Menu & Mobile Responsive Menu */
	
	try {
		
		var	header = document.getElementById('header'),
		carousel = document.getElementById('main-carousel'),
		mobileMenu = document.getElementById('dl-menu'),
		mainNav = document.getElementById('main-nav'),
		topBar = document.getElementById('top-bar'),
		topBarArrow = document.querySelector('.top-bar-arrow ');
		
	} catch(err) {
		console.log( err.type + ' ' + err.message );
	}
	
		
	window.addEventListener('scroll', function(ev) {
		ev.preventDefault();
		
		if ( document.documentElement.clientWidth > 900 ) {
		
			if( window.pageYOffset > 110 ) {
				header.classList.add('fixed-header');
				topBar.style.display = 'none';
				
				try {
					carousel.classList.add('fixed-carousel');
				} catch(err) {
					console.log( err.type + ' ' + err.message );
				}
				
			} else {
				header.classList.remove('fixed-header');
				topBar.style.display = 'block';
				
				try {
					carousel.classList.remove('fixed-carousel');
				} catch(err) {
					console.log( err.type + ' ' + err.message );
				}
				
			}
			
			return;
		} 
		
	});
	
	window.addEventListener('resize', function() {
		if( document.documentElement.clientWidth <= 900 ) {
			mobile.turnOn();
		} else {
			mobile.turnOff();
		}
	});
	
	var mobile = {
		turnOn: function() {
			
			mainNav.style.display = 'none';
			
			mobileMenu.style.display = 'inline-block';
			
			topBar.style.display = 'none';
			topBar.classList.remove('full-width-line');
			
			topBarArrow.style.display = 'block';
			
		},
		turnOff: function() {
			if( mainNav ) mainNav.style.display = 'inline-block';
			
			if( mobileMenu ) mobileMenu.style.display = 'none';
			
			topBar.style.display = 'block';
			topBar.classList.add('full-width-line');
			
			topBarArrow.style.display = 'none';
			
		}
	};
	
	//
	
	
	$(document).on('click', '.top-bar-arrow', function() {
		
		if( $(this).find('i').hasClass('fa-angle-down') ) {
			$(this).find('i').removeClass('fa-angle-down');
			$(this).find('i').addClass('fa-angle-up');
		} else {
			$(this).find('i').removeClass('fa-angle-up');
			$(this).find('i').addClass('fa-angle-down');
		}
		
		$( '#top-bar' ).slideToggle();
		
	});
	
	
	//
	
	if (  document.documentElement.clientWidth <= 900 ) {
		mobile.turnOn();
	} else {
		mobile.turnOff();
	}
	
	//
	
	if( mobileMenu ) {
		mobileMenu.addEventListener('click', function() {
		
			if( this.querySelector('.menu-open').style.display == 'inline' ) {
				this.querySelector('.menu-open').style.display = 'none';
				this.querySelector('.menu-back').style.display = 'inline';
			} else {
				this.querySelector('.menu-open').style.display = 'inline';
				this.querySelector('.menu-back').style.display = 'none';
			}
			
			this.querySelector('.dl-menu').classList.toggle('dl-menu-open');
		
		});	
	}