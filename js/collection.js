const searchKeyword = async () => {
    const container = document.querySelector(".grid-collection");
    container.innerHTML = "";
    let keyword = document.querySelector("#myKeyword").value;
    if (keyword.length > 2) {
        const req = await fetch(`index.php?action=search&keyword=${keyword}`);
        const json = await req.json();
        if (json.length > 0) {
            json.forEach((game) => {
                let platformsHTML = "";
                game.platforms.forEach((p) => {
                    platformsHTML += `<p class="cyan">${p}</p>`;
                });
                container.innerHTML += `
                <a href="index.php?action=game-details&id=${game.id}">
                    <article class="card-colection">

                        <div class="card-img">
                            <div class="note">
                                <i class="fa-solid fa-star"></i>
                                <p>${game.note} / 10</p>
                            </div>
                            <img src="images/${game.image}" alt="${game.title}">
                        </div>

                        <div class="card-content">
                            <h2>${game.title}</h2>

                            <div class="badge-line">
                                ${platformsHTML}
                            </div>

                            <div class="footer-content">
                                <div class="time">
                                    <i class="fa-regular fa-clock"></i>
                                    <p>${game.duration}h de jeu</p>
                                </div>
                            </div>

                        </article>
                </a>
                `;
            });
        } else {
            container.innerHTML = "<p>Aucun jeu trouvé</p>";
        }
    }
}