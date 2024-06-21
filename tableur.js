// Récupère tous les éléments <td> avec l'attribut data-tooltip="show"
const tooltips = document.querySelectorAll('td[data-tooltip="show"]');

tooltips.forEach(td => {
    // Crée le contenu de la pop-up
    const tooltipContent = `
        <div class="tooltip-content">
            <p>Importance de l’impact négatif sur les personnes ou l’environnement :</p>
            <ul>
                <li>🟩 Peu ou pas d’impact</li>
                <li>🟨 Impact visible mais modéré sur les ressources naturelles</li>
                <li>🟧 Impact significatif sur la qualité/quantité des ressources naturelles affectées</li>
                <li>🟥 Forte dégradation des ressources naturelles</li>
            </ul>
        </div>
    `;

    // Crée un élément span pour la pop-up
    const tooltipSpan = document.createElement('span');
    tooltipSpan.classList.add('tooltip');
    tooltipSpan.innerHTML = tooltipContent;

    // Ajoute la pop-up à chaque élément <td>
    td.appendChild(tooltipSpan);

    // Affiche la pop-up lorsque l'utilisateur clique sur le <td>
    td.addEventListener('click', () => {
        tooltipSpan.style.display = 'block';
    });

    // Masque la pop-up lorsque l'utilisateur clique en dehors du <td>
    document.addEventListener('click', (event) => {
        if (!td.contains(event.target)) {
            tooltipSpan.style.display = 'none';
        }
    });
});
