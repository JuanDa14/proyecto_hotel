const labels = [
    "Enero",
    "Febrero",
    "Marzo",
    "Abril",
    "Mayo",
    "Junio",
    "Julio",
    "Agosto",
    "Septiembre",
    "Octubre",
    "Noviembre",
    "Diciembre",
];
let arrayData = [];
if (localStorage.getItem("data")) {
    arrayData = JSON.parse(localStorage.getItem("data"));
}

const data = {
    labels: labels,
    datasets: [
        {
            label: "Reservas realizadas por mes - 2023",
            backgroundColor: "rgb(255, 99, 132)",
            borderColor: "rgb(255, 99, 132)",
            data: arrayData,
        },
    ],
};

const config = {
    type: "line",
    data: data,
    options: {},
};

const myChart = new Chart(document.getElementById("myChart"), config);
