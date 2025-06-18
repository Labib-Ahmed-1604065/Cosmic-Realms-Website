import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

// DARK MODE INIT
// Check localStorage on page load
if (
    localStorage.getItem('theme') === 'dark' ||
    (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)
) {
    document.documentElement.classList.add('dark');
} else {
    document.documentElement.classList.remove('dark');
}

Alpine.start();

// Light/Dark Mode Toggle
document.addEventListener('DOMContentLoaded', () => {
    const themeToggle = document.getElementById('themeToggle');
    const lightIcon = document.getElementById('lightIcon');
    const darkIcon = document.getElementById('darkIcon');

    // Set icon on load
    if (document.documentElement.classList.contains('dark')) {
        darkIcon?.classList.remove('hidden');
        lightIcon?.classList.add('hidden');
    } else {
        lightIcon?.classList.remove('hidden');
        darkIcon?.classList.add('hidden');
    }

    themeToggle?.addEventListener('click', () => {
        const html = document.documentElement;
        html.classList.toggle('dark');
        lightIcon?.classList.toggle('hidden');
        darkIcon?.classList.toggle('hidden');
    });
});

// Mobile Menu Toggle
document.addEventListener('DOMContentLoaded', () => {
    const menuBtn = document.getElementById('mobileMenuBtn');
    const menu = document.getElementById('mobileMenu');

    menuBtn?.addEventListener('click', () => {
        menu?.classList.toggle('hidden');
    });
});

//copy IP to clipboard
window.copyIP = function(ip) {
    navigator.clipboard.writeText(ip).then(() => {
        alert("Server IP copied to clipboard!");
    }).catch(err => {
        console.error('Failed to copy IP:', err);
    });
};