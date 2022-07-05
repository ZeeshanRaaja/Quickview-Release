
jQuery(document).ready(function($)
{
    $('#enable_title').parent().hide();
    $('#enable_price').parent().hide();
    $('#enable_sku').parent().hide();
    $('#enable_image').parent().hide();
    $('#enable_description').parent().hide();
    $('#enable_categories').parent().hide();
    $('#enable_tags').parent().hide();
    $('#description_range').parent().hide();
    
    if($('#enable_chkbox').prop('checked'))
    {
        $('#enable_title').parent().show();
        $('#enable_price').parent().show();
        $('#enable_sku').parent().show();
        $('#enable_image').parent().show();
        $('#enable_description').parent().show();
        $('#enable_categories').parent().show();
        $('#enable_tags').parent().show();
        //$('#description_range').parent().show();
    }

    $('#enable_chkbox').click(function()
    {
        var a=document.getElementById('enable_chkbox')
        if(a.checked){
        $('#enable_title').parent().show();
        $('#enable_price').parent().show();
        $('#enable_sku').parent().show();
        $('#enable_image').parent().show();
        $('#enable_description').parent().show();
        $('#enable_categories').parent().show();
        $('#enable_tags').parent().show();
    }
    else
    {
        //Hiding all checks
        $('#enable_title').parent().hide();
        $('#enable_price').parent().hide();
        $('#enable_sku').parent().hide();
        $('#enable_image').parent().hide();
        $('#enable_description').parent().hide();
        $('#enable_categories').parent().hide();
        $('#enable_tags').parent().hide();

        //Destroying all values
        $('#enable_title').prop('checked', false);
        $('#enable_price').prop('checked', false);
        $('#enable_sku').prop('checked', false);
        $('#enable_image').prop('checked', false);
        $('#enable_description').prop('checked', false);
        $('#enable_categories').prop('checked', false);
        $('#enable_tags').prop('checked', false);
    }

    if($('#enable_chkbox').prop('checked'))
    {
        $('#enable_title').parent().show();
        $('#enable_price').parent().show();
        $('#enable_sku').parent().show();
        $('#enable_image').parent().show();
        $('#enable_description').parent().show();
        $('#enable_categories').parent().show();
        $('#enable_tags').parent().show();
        // $('#description_range').parent().show();
    }

    $('#enable_description').click(function()
    {
        if( $('#enable_description').prop('checked'))
        {
            $('#description_range').parent().show();
        }
        else{
            $('#description_range').parent().hide();
        }
    });
        
    $('.ast-footer-copyright').click(function()
    {
        alert('fwfwefwefwef');
    });

  
});



});
    

// jQuery(document).ready(function($) {
//     var modal = document.getElementById('myModal');
//     var span = document.getElementsByClassName("close")[0];
    
//     span.onclick = function() {
//         modal.style.display = "none";
//     }
//     window.onclick = function(event) {
//         if (event.target == modal) {
//             modal.style.display = "none";
//         }
//     }
//     // Let's do the magic
//         // make sure to change #myBtn to read more button selector
//         $(document).on("click","#myBtn",function(e) {
//         e.stopImmediatePropagation();
//         e.preventDefault();
//         // get url
//             var url = $(this).attr('href');
//             var container = $('#myModal').find('.content-left');
//             var data = {
//                 action: 'show_product',
//                 url: url,
    
//             };
//             $.post('<?php echo esc_url( home_url() ); ?>/wp-admin/admin-ajax.php', data, function(response) {
//                // display the response
//             console.log(response);
//             $(container).empty();       
//             $(container).html(response);
//             modal.style.display = "block";
//             });
//         });
//     });




