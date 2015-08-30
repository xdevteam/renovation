$(function() {

// 	/* Tabs */
	
	
	$('ul .cat-item').click(function(ev) {
		// ev.preventDefault();
		// var src="http://cms.loc/images/1downarrow.png";
		// var srcOld="http://cms.loc/images/strl.png";
		// $('ul .cat-item').removeClass('active_cat');
		// $(this).addClass('active_cat');
		// $('ul .cat-item').find('img').each( function(){ this.src = srcOld } );
		// $(this).find('img').each( function(){ this.src = src } );
		// $('ul .cat-item').find('ul').hide('slow');
		// $(this).find('ul').slideToggle();


		var val = $( this ).attr('data-ajax');
		$('#category_content').animate({
    							opacity: 0    
  		}, 500, function() {
    	$('#category_content').remove();
    	$.ajax({  
				type: 'POST',
				url: 'ajax/category_info',                
                data: {
					id: val
				},  
                success: function(html){ 
                	$('.tabs-content-grid').append(html);
                	$('#category_content').animate({
    							opacity: 1    
  					}, 500, function() {});
                      
                }  
            });  
 		});		
	});
	
});
	

// 	function callForAjax( data ) {
		
// 		var xhr = new XMLHttpRequest();
		
// 		xhr.open('GET', 'change_tabs' + data, true);
		
// 		xhr.onreadystatechange = function() {
// 			if( xhr.readyState != 4 ) return;
			
// 			if( xhr.status != 200) {
				
// 				console.error( xhr.status + ' : ' + xhr.statusText );
				
// 			} else {
				
// 				var obj = JSON.parse( xhr.responseText );
				
// 				var names = obj['name'];
// 				var links = obj['link'];
				
// 				createCategoryList( names, links );

// 			}
// 		}
		
// 		xhr.send();
		
// 	}
	
// 	function createCategoryList( names, links ) {
		
// 		var catList = document.querySelector('.tabs-content-category-list'),
// 			host = 'http://' + window.location.host + '/subcategories/';
	
// 		try {
// 			if( names && links ) {
// 				catList.innerHTML = '';
// 				fill();
// 			}
// 		} catch( e ) {
// 			console.warn( 'name : %s, message : $s', e.name, e.message );
// 		}
		
// 		function fill() {
// 			for(var i=0; i<names.length; i++) {
// 				var li = document.createElement('li');
// 				var link = document.createElement('a');	
				
// 				link.innerHTML = names[i];
// 				link.setAttribute('href', host + links[i]);
				
// 				li.appendChild(link);
// 				catList.appendChild( li );
// 			}
// 		}
		
// 	}
	
// 	// Default list
	
// 	(function() {
// 		var firstTab = document.querySelector('#tabs-container ul li:first-child');
// 		callForAjax( firstTab.getAttribute('data-ajax') );
// 	})();
	
// });
