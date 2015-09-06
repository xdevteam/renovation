jQuery(document).ready(function () {
   
    setInterval(function(){
        var countCartitems=$('#cart-amount').text();
        if(countCartitems=="0"){
        $('#topBarCartLink').removeClass('green');
        $('#topBarCartLink').attr('disabled',true);
        $('#topBarCartLink').addClass('disable');
        $('.cart_info_text').show();
        $('#cart-amount').hide();
        

    }else{
        $('.cart_info_text').hide();
        $('#cart-amount').show();
        $('#topBarCartLink').addClass('green');
        $('#topBarCartLink').attr("disabled", false);
        
    }
}, 1000);
    
    $('.read_more_item').click(function(){
        $('.product-tabs section').hide();
        $('.prod_tabs_button li').removeClass('active');
        $('.description_tab').addClass('active');
        $('#description_panel').show();
        $('html, body').animate({
            scrollTop: $(".description_tab").offset().top-80
        }, 2000);
            
    });

        setTimeout(function(){
            $.ajax({
            type: 'POST',
            url: 'ajax/stock_widget',
            
            success: function( data ) { 
                if(data!="empty"){
                    $(".akcii").show('slow');
                    var arr=JSON.parse(data);
                    $(".akcii").find('img').each( function(){ this.src = arr.image_path } );
                    $("#stock_name").html(arr.name);
                    $(".stock_cost").html(arr.stock_price);
                    $(".stock_curr").html(arr.currency);   
                }
            }
        });
        }, 0);
        setInterval(function(){
            $.ajax({
            type: 'POST',
            url: 'ajax/stock_widget',
            
            success: function( data ) {
                $(".akcii").show();
                var arr=JSON.parse(data);                
                $(".akcii").find('img').each( function(){ this.src = arr.image_path } );
                $("#stock_name").html(arr.name);
                $(".stock_cost").html(arr.stock_price);
                $(".stock_curr").html(arr.currency);
            }
        });
        }, 10000);
        setTimeout(function(){
            $.ajax({
            type: 'POST',
            url: 'ajax/recomend',
            
            success: function( data ) { 
                if(data!="empty"){
                    $(".best").show();
                var arr=JSON.parse(data);                
                $(".best").find('img').each( function(){ this.src = arr.image_path } );
                $("#bs_name").html(arr.name);
                $(".bs_cost").html(arr.stock_price);
                $(".bs_curr").html(arr.currency);   
                }
            }
        });
        }, 0);
        setInterval(function(){
            $.ajax({
            type: 'POST',
            url: 'ajax/recomend',
            
            success: function( data ) {
                $(".best").show();
                var arr=JSON.parse(data);                
                $(".best").find('img').each( function(){ this.src = arr.image_path } );
                $("#bs_name").html(arr.name);
                $(".bs_cost").html(arr.stock_price);
                $(".bs_curr").html(arr.currency);
            }
        });
        }, 10000);
    });