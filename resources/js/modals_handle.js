function clearAllModals() {
    $('#modal-opacifier').fadeOut('fast');
    $('.modal').fadeOut('fast');
}

function showModal(modal) {
    $('#modal-opacifier').fadeIn('fast');
    switch(modal) {
        case 'general':
            $('#general-modal').fadeIn();
            break;
        case 'lang':
            $('#lang-modal').fadeIn();
            break;
        case 'side':
            $('#side-modal').fadeIn();
            break;
        default:
            $('#general-modal').fadeIn();
    }
}

$(function() {
    let modalStatus = 'off';

    $('#lang-selector').on('click', function() {
        showModal('lang');
        modalStatus = 'on';
    });

    $('#modal-opacifier').on('click', function() {
        clearAllModals();
    })

    $(document).on('keyup',function(e) {
        if (e.keyCode == 27) {
           if (modalStatus == 'on') {
                clearAllModals();
                modalStatus = 'off';
            }
        }
    });
});