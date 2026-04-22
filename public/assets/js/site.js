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

document.addEventListener('DOMContentLoaded', function () {
    const navToggle = document.getElementById('navToggle');
    const siteNav = document.getElementById('siteNav');
    const navOverlay = document.getElementById('navOverlay');

    if (!navToggle || !siteNav || !navOverlay) return;

    function openNav() {
        siteNav.classList.add('show');
        navOverlay.classList.add('show');
        navToggle.classList.add('active');
        navToggle.setAttribute('aria-expanded', 'true');
        document.body.style.overflow = 'hidden';
    }

    function closeNav() {
        siteNav.classList.remove('show');
        navOverlay.classList.remove('show');
        navToggle.classList.remove('active');
        navToggle.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
    }

    navToggle.addEventListener('click', function () {
        if (siteNav.classList.contains('show')) {
            closeNav();
        } else {
            openNav();
        }
    });

    navOverlay.addEventListener('click', closeNav);

    siteNav.querySelectorAll('a').forEach(function (link) {
        link.addEventListener('click', closeNav);
    });

    window.addEventListener('resize', function () {
        if (window.innerWidth > 860) {
            closeNav();
        }
    });
});