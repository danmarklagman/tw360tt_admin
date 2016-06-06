/* 
 * Dan Mark P. Lagman
 * Custom Ajax Submit Script
 * 06-02-2016
 */
$.fn.customAdd = function(targetDiv) {
    $(this).ajaxForm({
        target: targetDiv,
        beforeSubmit: function() {
            $(targetDiv).html('<div class="alert alert-warning" role="alert"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Please wait...</div>');
        },
        success: function(responseText, statusText, xhr) {
            result = $.parseJSON(responseText);
            
            if(result.redirect != null) {
                $(targetDiv).html('<div class="alert alert-'+result.alert+'" role="alert"><span class="glyphicon glyphicon-'+result.icon+'"></span> '+result.message+' Click <a href="'+result.redirect+'">here</a> to see list.</div>');
                $("form").get(0).reset();
            } else {
                $(targetDiv).html('<div class="alert alert-'+result.alert+'" role="alert"><span class="glyphicon glyphicon-'+result.icon+'"></span> '+result.message+'</div>');
            }
            
        },
        error: function() {
            $(targetDiv).html('<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-warning-sign"></span> There is an error processing your request.</div>');
        }
    });
}

$.fn.customEdit = function(targetDiv) {
    $(this).ajaxForm({
        target: targetDiv,
        beforeSubmit: function() {
            $(targetDiv).html('<div class="alert alert-warning" role="alert"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Please wait...</div>');
        },
        success: function(responseText, statusText, xhr) {
            result = $.parseJSON(responseText);
            $(targetDiv).html('<div class="alert alert-'+result.alert+'" role="alert"><span class="glyphicon glyphicon-'+result.icon+'"></span> '+result.message+'</div>');
            setTimeout(function(){
                parent.location = result.redirect;
            }, 500);
        },
        error: function() {
            $(targetDiv).html('<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-warning-sign"></span> There is an error processing your request.</div>');
        }
    });
}