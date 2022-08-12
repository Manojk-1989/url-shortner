jQuery(document).ready(function(){
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
  });  

  $(document).on('click', '#url_generate_btn', function() {
    // if ($("#personal_information_form").valid() == false) {
    //     true
    // } else {
        $.ajax({
            url: $(this).attr('data-url'),
            method: 'post',
            data: $('#url_generater_form').serialize(),
            success: function(response) {
                if ((response.results['status'] == true) && (response.results['status_code'] == 200)) {
                    bootbox.confirm(response.results['message'], function (confirmed) {
                        if (confirmed) {
                            location.reload(true);
                        }
                    });
                }   else {alert();
                    bootbox.confirm(response.results['message'], function (confirmed) {
                        if (confirmed) {
                            location.reload(true);
                        }
                    });
                }  
            },
            error: function(jqXHR, textStatus, errorThrown) {
                var errors = $.parseJSON(jqXHR.responseText);
                $.each(errors.errors, function (key, val) {
                    $("#" + key + "_msg").text(val[0]);
                });
            }
        });
        
    // }
    
});