$(function() {

    $('#side-menu').metisMenu();

});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        var topOffset = 50;
        var width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        var height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    // var element = $('ul.nav a').filter(function() {
    //     return this.href == url;
    // }).addClass('active').parent().parent().addClass('in').parent();
    var element = $('ul.nav a').filter(function() {
     return this.href == url;
    }).addClass('active').parent();

    while(true){
        if (element.is('li')){
            element = element.parent().addClass('in').parent();
        } else {
            break;
        }
    }

    //shirt type
    $('#shirtType').change(function() {
        if($(this).val() == '-1'){
            //alert('NEW SHIRTS');
            $('.newType').slideDown();
        }
    });

    //shirt type
    $('#brand').change(function() {
        if($(this).val() == '-1'){
            //alert('NEW SHIRTS');
            $('.newType').slideDown();
        }
    });

    //new size
    $('#size').change(function() {
        if($(this).val() == 'NEW'){
            //alert('NEW SHIRTS');
            $('.newSize').slideDown();
        }
    });

    //new colour
    $('#colour').change(function() {
        if($(this).val() == '-1'){
            //alert('NEW COLOUR');
            $('.newColour').slideDown();
        }
    });

    //shirt-input submit
    $('#shirt-input').submit( function(){
         var myData= $('#shirt-input').serialize();
         //console.log(myData);
         $.ajax({
            url : "../includes/shirt_input.php",
            type: "POST",
            data : myData
         }).done(function(data,status,xhr) {
            //if success
            console.log('the log',status);
            if(status == 'success'){
                //alert('We did it!');
                $('.success').show().delay(3000).fadeOut("slow");
                $('#shirt-input')[0].reset();
                $('.newType').slideUp();
                $('.newSize').slideUp();
                $('.newColour').slideUp();
            }
        });
    });

    $('#check-inventory').submit( function(){

         $('.theFiltered').hide();
         $('.theFiltered table tbody').empty();

         var myData = $('#check-inventory').serialize();
         var theContent = '';

         $.ajax({
            url : "../includes/checkInventory.php",
            type: "GET",
            data : myData
         }).done(function(data,status,xhr) {
            //if success
            $.each(data.payload, function($k,$v){
                //console.log($v.brand_name);
                theContent = '<tr><td>' + $v.quantity + '</td><td>' + $v.brand_name + '</td><td>' + $v.shirt_type + '</td><td>' + $v.gender + '</td><td>' + $v.size + '</td><td>' + $v.colour + '</td></tr>';
                $('.theFiltered table tbody').append(theContent);
            });
            $('.theFiltered').slideDown();
        });
    });

});
