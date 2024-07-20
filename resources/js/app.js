import './bootstrap';

document.addEventListener('DOMContentLoaded', function() {
    const userMenuButton = document.getElementById('userMenuButton');
    const userMenu = document.getElementById('userMenu');

    userMenuButton.addEventListener('click', function() {
        userMenu.classList.toggle('hidden');
    });

    // Close the dropdown if clicked outside
    window.addEventListener('click', function(e) {
        if (!userMenuButton.contains(e.target)) {
            userMenu.classList.add('hidden');
        }
    });
});
