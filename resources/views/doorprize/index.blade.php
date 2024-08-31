<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengacakan Nama Pemenang Doorprize</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #winner-name {
            font-size: 3rem;
            font-weight: bold;
            color: #0d6efd;
        }
        #winner-department {
            font-size: 1.5rem;
            color: #6c757d;
        }
        /* #winner-id {
            font-size: 1.25rem;
            color: #d9534f;
        } */
        #start-button {
            display: block;
        }
        #congratulations-button {
            display: none;
        }
    </style>
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="text-center">
        <h1 class="display-4 text-primary mb-5">Pengacakan Nama Pemenang Doorprize</h1>
        <div id="winner-name" class="p-3 bg-white rounded-3 shadow-sm">Siapa yang Beruntung?</div>
        <div id="winner-department" class="pb-4"></div>
        {{-- <div id="winner-id" class="pb-4"></div> --}}
        <button id="start-button" class="btn btn-success btn-lg">Mulai Pengacakan</button>

        <form action="/doorprize" method="POST" class="d-inline" id="congratulations-form">
            @csrf
            <input type="hidden" name="winner_id" id="winner-id-input">
            <button type="submit" id="congratulations-button" class="btn btn-primary btn-lg mt-4">Selamat</button>
        </form>
    </div>

    <script>
        // Data karyawan dikirim sebagai JSON ke JavaScript
        const employees = @json($employees);

        // Log data untuk memastikan data karyawan
        // console.log('Employees Data:', employees);

        const winnerNameElement = document.getElementById('winner-name');
        const winnerDepartmentElement = document.getElementById('winner-department');
        // const winnerIdElement = document.getElementById('winner-id');
        const startButton = document.getElementById('start-button');
        const congratulationsButton = document.getElementById('congratulations-button');
        const winnerIdInput = document.getElementById('winner-id-input');

        let winnerId = null;

        startButton.addEventListener('click', () => {
            const interval = 100; // Kecepatan pengacakan tetap
            const totalDuration = 10000; // Durasi total 30 detik
            let elapsedTime = 0;

            // Sembunyikan tombol mulai pengacakan
            startButton.style.display = 'none';

            const intervalId = setInterval(() => {
                const randomIndex = Math.floor(Math.random() * employees.length);
                const randomEmployee = employees[randomIndex];

                // Debugging: Log untuk memeriksa objek karyawan yang dipilih
                // console.log('Random Employee:', randomEmployee);

                winnerNameElement.textContent = randomEmployee.name;
                winnerDepartmentElement.textContent = randomEmployee.department;
                // winnerIdElement.textContent = `ID: ${randomEmployee.employeeId}`;

                // Simpan ID karyawan yang ditampilkan
                winnerId = randomEmployee.employeeId;

                elapsedTime += interval;

                if (elapsedTime >= totalDuration) {
                    clearInterval(intervalId);
                    // Tampilkan tombol selamat
                    congratulationsButton.style.display = 'block';
                    // Isi input hidden dengan ID pemenang
                    winnerIdInput.value = winnerId;

                    // Debugging: Tampilkan nilai input hidden di konsol
                    // console.log('Winner ID Input Value:', winnerIdInput.value);
                }
            }, interval);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
