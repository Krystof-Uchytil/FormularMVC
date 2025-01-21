document.addEventListener("DOMContentLoaded", () => {
    const deleteLinks = document.querySelectorAll(".delete-link");

    deleteLinks.forEach(link => {
        link.addEventListener("click", event => {
            if (!confirm("Opravdu chcete tento záznam smazat?")) {
                event.preventDefault();
            }
        });
    });
});