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
        case 'search':
            $('#search-modal').fadeIn();
            break;
        case 'connect':
            $('#connect-modal').fadeIn();
            break;
        // case 'side':
        //     $('#side-modal').fadeIn();
        //     break;
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

    $('#general-search-btn').on('click', function() {
        showModal('search');
        $('.search-modal input[type=text]').focus();
        modalStatus = 'on';
    });

    $('#connect-btn').on('click', function() {
        showModal('connect');
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

    Livewire.on('activateGiftModal', article_id => {
        showModal('general');
        modalStatus = 'on';
    });

    Livewire.on('closeModal', function() {
        clearAllModals();
    })
});