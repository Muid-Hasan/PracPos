function showLoader() {
    const loader = document.getElementById('loader');
    if (loader) {
        loader.classList.remove('d-none');
    }
}

function hideLoader() {
    const loader = document.getElementById('loader');
    if (loader) {
        loader.classList.add('d-none');
    }
}
