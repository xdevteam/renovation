$(document).ready(function () {
	
    (function () {
		
		/* AJAX */

        var prodGroup = $('#prod_group'),
			prodCat = $('#prod_cat'),
			prodSubCat = $('#prod_subcat');

        $( prodGroup ).change(function () {
		
			var val ='id='+ $( this ).val();
			sendAjax( val, 'ajax/filter_by_group', prodCat );
			
        });
		
		$( document ).on('change', '#prod_cat', function() {
			
			var val = 'id='+$( this ).val();
			sendAjax( val, 'ajax/filter_by_categories', prodSubCat );
			
		});
		
		function sendAjax( data, url, select ) {
			$.ajax({
				type: 'POST',
				url: url,
				data: data,
				success: function( data ) {
					fillSelect( data, select );
				}
			});
		}
		
		function fillSelect( data, select ) {
			
			$( select ).html('<option value="default">Выберите категорию</option>');
            
			var obj = JSON.parse( data );
			
			var names = obj.name;
			var values = obj.id;
			
			for(var i = 0; i<names.length; i++) {
				var opt = document.createElement('option');
				opt.innerHTML = names[i];
				opt.setAttribute('value', values[i]);
				
				$( select ).append( opt );
			}
			
        }
		
		/* Slider */
		
		$( "#slider-range-max" ).slider({
			range: "max",
			min: 1,
			max: 10,
			value: 1,
			slide: function( event, ui ) {
				$( ".amount" ).val( ui.value ).attr( 'data-value', ui.value );
				$('#range_hidden').val( $('.amount').attr('data-value') );
			}
		});
			
		$( ".amount" ).val( $( "#slider-range-max" ).slider( "value" ) ).attr( 'data-value', $( "#slider-range-max" ).slider( "value" ) );
		$('#range_hidden').val( $('.amount').attr('data-value') );
		
		/* Checkbox */
		
		$('#check_min_order').click(function() {
			$('#prod_min_order').slideToggle();
		});

    }());
	
});