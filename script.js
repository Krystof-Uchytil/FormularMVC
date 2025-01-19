document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');
    const emailInput = document.getElementById('email');
    const phoneInput = document.getElementById('telefon');

    form.addEventListener('submit', (event) => {
        // Validace emailu
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(emailInput.value)) {
            alert('Zadejte platnou emailovou adresu.');
            event.preventDefault();
        }

        // Validace telefonu
        const phonePattern = /^\+?[0-9]{9,15}$/;
        if (!phonePattern.test(phoneInput.value)) {
            alert('Zadejte platné telefonní číslo.');
            event.preventDefault();
        }
    });
});