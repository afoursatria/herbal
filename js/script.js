$(document).ready(function(){
    /*==============scroll up=================*/
    // hide #scrollup first
    $("#scrollup").hide();
    
    // fade in #scrollup http://webdesignerwall.com/tutorials/animated-scroll-to-top
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('#scrollup').fadeIn();
            } else {
                $('#scrollup').fadeOut();
            }
        });

        // scroll body to 0px on click
        $('#scrollup').click(function () {
            $('html,body').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });

    /*==============dynamic field===============*/

    var next = 1;
    $(".add-more").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        // $("body").children().each(function() {
        // $(this).html($(this).html().replace(/field[0-9]*/g,"field2"+next));
        // });
        var newIn = '<input type="text" data-provide="typeahead" id="field'+next+'" name="ref_id'+next+'" />';
        // '<input autocomplete="off" class="input form-control" id="field' + next + '" name="field' + next + '" type="text">'
        var newInput = $(newIn);
        var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >-</button></div><div id="field">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        // $("#field" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);  
        
            $('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#field" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
    });
});