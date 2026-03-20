const filters = {
    keyword: "",
    platform: "all",
    genre: "all",
    status: "all",
    favorite: 0
};

const container = document.querySelector(".grid-collection");

const fetchGames = async () => {
    const query = new URLSearchParams(filters).toString();
    const req = await fetch(`index.php?action=search&${query}`);
    const json = await req.json();

    container.innerHTML = "";

    if (json.length === 0) {
        container.innerHTML = "<p>Aucun jeu trouvé</p>";
        return;
    }

    json.forEach(game => {
        let platformsHTML = "";
        game.platforms.forEach(p => 
            platformsHTML += `<p class="cyan">${p}</p>`
        );

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
                    <div class="badges-flex">${platformsHTML}</div>
                    <div class="footer-content">
                        <div class="time">
                            <i class="fa-regular fa-clock"></i>
                            <p>${game.duration}h de jeu</p>
                        </div>
                    </div>
                </div>
            </article>
        </a>`;
    });
};


document.querySelector("#myKeyword").addEventListener("input", e => {
    filters.keyword = e.target.value;
    fetchGames();
});


document.querySelector("#platform-select").addEventListener("change", e => {
    filters.platform = e.target.value;
    fetchGames();
});


document.querySelector("#genre-select").addEventListener("change", e => {
    filters.genre = e.target.value;
    fetchGames();
});


const btns = document.querySelectorAll(".btn-filters");
btns.forEach(btn => {
    btn.addEventListener("click", () => {
        btns.forEach(b => b.classList.remove("filters-checked"));
        btn.classList.add("filters-checked");
        const status = btn.dataset.status;
        filters.status = status;

        if (status === "favorite") {
            filters.favorite = 1;
            filters.status = "all";
        } else {
            filters.favorite = 0;
        }

        fetchGames();
    });
});