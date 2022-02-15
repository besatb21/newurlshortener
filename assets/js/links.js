
// Loads a QR via the API
const loadQr = (short) => {
    return fetch(
        `api/shorts/get.php?short=${short}&qr=true`
    ).then(r => r.json())
    .then(response => {
        return response.Result.QR;
    });
};

function showQrModal(img) {
    let modal = $('#qrModal');
    document.querySelector('#qrModal .qr').src = img;

    modal.modal();
}

function qrButtonHandler(event) {
    let shortcode = event.target.dataset.short;
    loadQr(shortcode).then(
        showQrModal
    );
}

const load = function() {
    document.querySelectorAll('.qr-button').forEach((btn) => {
        btn.addEventListener('click', qrButtonHandler);
    })
}

window.addEventListener('load', load);