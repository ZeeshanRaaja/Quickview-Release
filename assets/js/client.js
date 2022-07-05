jQuery(document).ready(function($)
{

    $(".dashicons-visibility").on("click",function()
    {
        console.log(ajax_object.ajaxurl);
        var selected_prod = $(this).attr("data-product_id");
        $.ajax({
            url:   ajax_object.ajaxurl,
            type: "POST",
            data: { 
                action: 'quickview_data_fetch',  
                product_id: selected_prod 
            },
            success: function(data) 
            {
                console.log(data);
                jQuery('#view_modal').html(data);
            }
        });

    });
});


