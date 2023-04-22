$(document).ready(function(){
    //console.log(jsData);
    let signInTrigger = document.querySelector('.connexion-modal-trigger');

    let signInElement = document.getElementById('signInModal');
    // console.log('modal trigger element', signInTrigger);
    // console.log('modal element', signInElement);
    let signInModal = null;

    if(signInTrigger){
        signInModal = new bootstrap.Modal(signInElement, {focus: true});

        $(signInTrigger).on('click', function(e){
            signInModal.show();
        })
    }

    $modalLoginForm = $('.modal-login-form');

    $modalLoginForm.on('submit', function(e){
        e.preventDefault();
        
        let email = $('.modal-login-form #inputEmail').val();
        let password = $('.modal-login-form #inputPassword').val();
        let csrf = $('.modal-login-form #csrf').val();
        let spinner = $('#signInModal .spinner-border');
        let errorNotificationZone = $('#signInModal .ajax-error-notif');

        // console.log(jsData.urls.login);
        // console.log(email);
        // console.log(password);
        // console.log(csrf);
        // console.log(spinner);
        // console.log(errorNotificationZone);

        spinner.removeClass('d-none');
        errorNotificationZone.addClass('d-none');

        $.ajax({
            method: "POST",
            url: jsData.urls.login,
            data: {
                email: email,
                password: password,
                _csrf_token: csrf,
            },
            dataType: "json",
        })
        .done(function(res){
            // console.log(res);
            if(res.success) {
                spinner.addClass('d-none');
                errorNotificationZone.addClass('d-none');
                window.location.reload();
            } else {
                errorNotificationZone.html(resp.message);
                spinner.addClass('d-none');
                errorNotificationZone.removeClass('d-none');
            }

        })
        .fail(function(jqXHR, textStatus){
            // console.log(jqXHR);
            // console.log(textStatus);
            errorNotificationZone.html('Une erreur inattendue est survenue...');
            spinner.addClass('d-none');
            errorNotificationZone.removeClass('d-none');
        })
    })
})