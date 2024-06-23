document.addEventListener('DOMContentLoaded', () => {
    const tooltips = document.querySelectorAll('[data-tooltip="show"]');
    let activeTooltip = null;

    tooltips.forEach(element => {
        const tooltipSpan = document.createElement('div');
        tooltipSpan.classList.add('tooltip-content');
        tooltipSpan.innerHTML = element.getAttribute('data-tooltip-content');
        document.body.appendChild(tooltipSpan);

        element.addEventListener('click', (event) => {
            event.stopPropagation();

            // Ferme toutes les infobulles ouvertes
            if (activeTooltip) {
                activeTooltip.style.display = 'none';
            }

            // Affiche la nouvelle infobulle
            tooltipSpan.style.display = 'block';
            const rect = element.getBoundingClientRect();
            tooltipSpan.style.top = `${rect.bottom + window.scrollY}px`;
            tooltipSpan.style.left = `${rect.left + window.scrollX}px`;

            activeTooltip = tooltipSpan;
        });

        document.addEventListener('click', (event) => {
            if (activeTooltip && !element.contains(event.target) && !tooltipSpan.contains(event.target)) {
                activeTooltip.style.display = 'none';
                activeTooltip = null;
            }
        });
    });
});
