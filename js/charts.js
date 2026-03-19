const platformLabels = [];
const platformValues = [];

platformsData.forEach(p => {
    platformLabels.push(p.console);
    platformValues.push(p.total);
});

new Chart(document.getElementById("ChartPlatforms"), {
    type: 'pie',
    data: {
        labels: platformLabels,
        datasets: [{
            data: platformValues
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                labels: {
                    color: '#ffffff',
                    font: {
                        size: 14
                    }
                }
            }
        }
    }
});


const genreLabels = [];
const genreValues = [];

genresData.forEach(g => {
    genreLabels.push(g.type);
    genreValues.push(g.total);
});

new Chart(document.getElementById("ChartGenres"), {
    type: 'pie',
    data: {
        labels: genreLabels,
        datasets: [{
            data: genreValues
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                labels: {
                    color: '#ffffff',
                    font: {
                        size: 14
                    }
                }
            }
        }
    }
});