<div>
    <canvas id="orderStatusPieChart"></canvas>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('orderStatusPieChart').getContext('2d');
            const data = @json($this->getStatuses());

            const labels = ['New', 'Processing', 'Shipped', 'Delivered', 'Canceled'];
            const counts = [10, 20, 30, 25, 15];

            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        data: counts,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function (tooltipItem) {
                                    return `${tooltipItem.label}: ${tooltipItem.raw} orders`;
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
    @endpush
</div>
