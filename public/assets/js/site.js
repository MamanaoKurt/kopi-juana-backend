function toggleVideoSound() {
    const video = document.getElementById('shop-video');
    if (!video) return;

    video.muted = !video.muted;
}