import Chart from 'chart.js/auto';

const ctx = document.getElementById('departmentChart');

if (ctx) {

    new Chart(ctx, {

        type: 'bar',

        data: {

            labels: JSON.parse(ctx.dataset.labels),

            datasets: [{

                label: 'Employees',

                data: JSON.parse(ctx.dataset.values),

                borderWidth: 1

            }]

        }

    });

}