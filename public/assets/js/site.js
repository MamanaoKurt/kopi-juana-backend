function toggleVideoSound() {
    const video = document.getElementById('shop-video');
    if (!video) return;
    video.muted = !video.muted;
}

function openImagePreview(src) {
    const modal = document.getElementById('imagePreviewModal');
    const target = document.getElementById('imagePreviewTarget');

    if (!modal || !target) return;

    target.src = src;
    modal.classList.add('show');
    document.body.style.overflow = 'hidden';
}

function closeImagePreview(event) {
    if (event) {
        event.stopPropagation();
    }

    const modal = document.getElementById('imagePreviewModal');
    const target = document.getElementById('imagePreviewTarget');

    if (!modal || !target) return;

    modal.classList.remove('show');
    target.src = '';
    document.body.style.overflow = '';
}

document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape') {
        closeImagePreview();
    }
});