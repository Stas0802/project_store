import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

/**
 * Search on for name
 */
document.querySelector('#product-search').addEventListener('input', function () {
    const query = this.value.toLowerCase();
    const rows = document.querySelectorAll('tbody tr');

    rows.forEach(function (row) {
        const name = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
        row.style.display = name.includes(query) ? '' : 'none';
    });
});

/**
 * Show messages 3 second
 */
setTimeout(function (){
    const alert = document.querySelector('.alert-success')
    if(alert){
        alert.style.display = 'none';
    }
}, 3000)
