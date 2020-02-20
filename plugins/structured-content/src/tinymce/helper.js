window.bindImageButtons = function () {
    const imageButtons = document.querySelectorAll('.mce-select_image');
    for (let i = 0; i < imageButtons.length; i++) {
        imageButtons[i].addEventListener('click', wpsc_upload_image);
    }
}

window.wpsc_upload_image = function (e) {
    e.preventDefault();
    let idTarget;
    let val = true;
    if (typeof e.target.dataset.target === 'undefined') {
        idTarget = document.querySelector('.mce-image');
    } else {
        idTarget = document.getElementById(`${e.target.dataset.target}`);
        val = !val;
    }
    const customUploader = (
        wp.media.frames.file_frame = wp.media(
            {
                title   : 'Add Image',
                button  : {
                    text: 'Add Image',
                },
                multiple: false,
            }
        )
    );
    customUploader.on('select', () => {
        const attachment = customUploader
            .state()
            .get('selection')
            .first()
            .toJSON();

        val ? idTarget.value = attachment.id : idTarget.innerHTML = attachment.id;
    });
    customUploader.open();
}

window.datetimeLocalSupported = function () {
    let input = document.createElement('input');
    input.setAttribute('type', 'datetime-local');
    return input.type === 'datetime-local';
};

window.dateSupported = function () {
    let input = document.createElement('input');
    input.setAttribute('type', 'date');
    return input.type === 'date';
};

window.setHeight = function (el, val) {
    if (typeof val === 'function') val = val();
    if (typeof val === 'string') el.style.height = val;
    else el.style.height = val + 'px';
};

window.insertAfter = function (el, referenceNode) {
    referenceNode.parentNode.insertBefore(el, referenceNode.nextSibling);
};

window.createElementFromHTML = function (htmlString) {
    let div = document.createElement('div');
    div.innerHTML = htmlString.trim();

    // Change this to div.childNodes to support multiple top-level nodes
    return div.firstChild;
}