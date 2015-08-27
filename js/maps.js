$( document ).ready(function() {
	
	(function() {
		
		var country = document.querySelector('[data-map="country"]').options[0].text,
			city = document.querySelector('[data-map="city"]').options[0].text,
			street = document.querySelector('[data-map="street"]').value,
			building = document.querySelector('[data-map="building"]').value;
			
		// XHR
		/*
		(function(url) {
			
			var xhr = new XMLHttpRequest();
			
			xhr.open('GET', url + country + ',+' + city + ',+' + street + ',+' + building, true);
			
			xhr.onload = function() {
				deployMap( this.responseText );
			}
			xhr.onerror = function() {
				console.log( 'Error : ' + this.status );
			}
			
			xhr.send();
			
		})('http://geocode-maps.yandex.ru/1.x/?geocode=');
		*/
		
		// JSONP
		
		function scriptRequest(url, onSuccess, onError) {
			
			var scriptOk = false;
			
			var callbackName = 'cb' + String(Math.random()).slice(-6);
			
			url += ~url.indexOf('?') ? '&' : '?';
			url += 'callback=' + callbackName;
			
			window[callbackName] = function( data ) {
				scriptOk = true;
				delete window[callbackName];
				onSuccess( data );
			}
			
			function checkCallback() {
				if( scriptOk ) return;
				delete window[callbackName];
				onError(url);
			}
			
			var script = document.createElement('script');
			
			// For Old Browsers
			script.onreadystatechange = function() {
				if( this.readyState == 'complete' || this.readyState == 'loaded' ) {
					this.onreadystatechange = null;
					setTimeout(checkCallback, 0);
				}
			}
			
			script.onload = script.onerror = checkCallback;
			
			script.src = url;
			document.body.appendChild(script);
		}
		
		function success( data ) {
			console.log( 'Success : %O', data );
			deployMap( data );
		}
		
		function fail( url ) {
			console.log( 'Failure : ' + url );
		}
		
		scriptRequest('http://geocode-maps.yandex.ru/1.x/?format=json&geocode=' + country + ',+' + city + ',+' + street + ',+' + building, success, fail);
		
		// DEPLOYING MAP
		
		function deployMap( data ) {
			var coords = data.response.GeoObjectCollection.featureMember['0'].GeoObject.Point.pos,
			center = [],
			myMap;
			
			coords.split(' ').reverse().forEach(function( point ) {
				center.push( parseFloat( point ) );
			});
						
			ymaps.ready(init);
			
			function init() {
				myMap = new ymaps.Map('map', {
					center: center,
					zoom: 13,
				});
				
				placemark = new ymaps.Placemark(center, { 
					hintContent: "Zp - center", 
					balloonContent: "Here we go!" 
				});
				
				myMap.geoObjects.add( placemark );
			}
		}	

	}());
	
});