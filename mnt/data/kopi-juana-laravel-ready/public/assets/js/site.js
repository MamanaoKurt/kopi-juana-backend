document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.sound-toggle').forEach((button) => {
    const videoId = button.dataset.video;
    const video = document.getElementById(videoId);
    if (!video) return;

    const updateLabel = () => {
      button.textContent = video.muted ? 'Turn sound on' : 'Mute sound';
    };

    button.addEventListener('click', () => {
      video.muted = !video.muted;
      if (!video.paused) {
        video.play().catch(() => {});
      }
      updateLabel();
    });

    updateLabel();
  });
});
