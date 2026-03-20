const btn = document.getElementById("like");

btn.addEventListener("click", async () => {
    const gameId = btn.dataset.gameId;

    const req = await fetch(`index.php?action=like&gameId=${gameId}`);
    const json = await req.json();

    if (json.success) {
        btn.classList.toggle("liked");
    }
});