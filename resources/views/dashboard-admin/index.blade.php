@extends('layouts.main')

@section('container')
<div class="container mt-5">
    <h3 class="fw-semibold text-custom">Dashboard Admin</h3>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="fw-bold">Status Kamar</h3>
                </div>
                <div class="card-body">
                    <canvas id="roomStatusChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="fw-bold">Pemasukan Bulanan</h6>
                </div>
                <div class="card-body">
                    <canvas id="incomeChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const roomStatusData = {
        labels: ['Kamar Kosong', 'Kamar Terisi'],
        datasets: [{
            label: 'Status Kamar',
            data: [12, 8],
            backgroundColor: [
                'rgba(75, 192, 192, 0.6)',
                'rgba(255, 99, 132, 0.6)',
            ],
            borderColor: [
                'rgba(75, 192, 192, 1)',
                'rgba(255, 99, 132, 1)',
            ],
            borderWidth: 1
        }]
    };

    const roomStatusConfig = {
        type: 'pie',
        data: roomStatusData,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Status Kamar'
                }
            }
        },
    };

    const roomStatusChart = new Chart(
        document.getElementById('roomStatusChart'),
        roomStatusConfig
    );

    const incomeData = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: 'Pemasukan',
            data: [1500000, 2000000, 1750000, 2200000, 1900000, 2300000, 2500000, 2800000, 3000000, 2700000, 3200000, 3500000], // Replace with your actual data
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    };

    const incomeConfig = {
        type: 'bar',
        data: incomeData,
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Jumlah (Rp)'
                    }
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Pemasukan Bulanan'
                }
            }
        },
    };

    const incomeChart = new Chart(
        document.getElementById('incomeChart'),
        incomeConfig
    );
</script>
@endsection
