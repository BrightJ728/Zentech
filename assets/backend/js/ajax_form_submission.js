//Form Submition
function ajaxSubmit(e, form, callBackFunction) {

    if (form.valid()) {
        e.preventDefault();

        let action = form.attr('action');
        let form2 = e.target;
        let data = new FormData(form2);
        $.ajax({
            type: "POST",
            url: action,
            processData: false,
            contentType: false,
            dataType: 'json',
            data: data,
            success: function(response) {
                if (response.status) {
                    toastr.success(response.notification);
                    if (form.attr('class') === 'ajaxDeleteForm') {
                        $('#alert-modal').modal('toggle')
                    } else {
                        $('#right-modal').modal('hide');
                    }
                    callBackFunction();
                } else {
                    toastr.error(response.notification);
                }
            }
        });
    } else {
        toastr.error('Please make sure to fill all the necessary fields');
    }
}

function ajaxSubmitWizzard(form, target_id) {
    let action = form.attr('action');
    let form2 = document.getElementById(target_id);
    let data = new FormData(form2);
    $.ajax({
        type: "POST",
        url: action,
        processData: false,
        contentType: false,
        dataType: 'json',
        data: data,
        success: function(response) {
            if (response.status) {
                toastr.success(response.notification);
                if (form.attr('class') === 'ajaxDeleteForm') {
                    $('#alert-modal').modal('toggle')
                } else {
                    $('#right-modal').modal('hide');
                }
                return true;
            } else {
                toastr.error(response.notification);
                return false;
            }
        }
    });

}