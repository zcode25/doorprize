<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doorprize</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('/img/bg.png'); /* Ganti dengan path gambar Anda */
            background-size: cover; /* Menutupi seluruh area body */
            background-position: center; /* Menjaga posisi tengah gambar */
            background-repeat: no-repeat; /* Tidak mengulang gambar */
            height: 100vh; /* Menyesuaikan tinggi body dengan viewport */
            font-family: 'Poppins', sans-serif;
        }

        #winner-name {
            font-size: 70px;
            font-weight: bold;
            color: #031447;
        }
        #winner-department {
            font-size: 1.5rem;
            color: #333333;
        }
        #start-button {
            display: block;
            font-size: 30px;
            /* font-weight: bold; */
        }
        #congratulations-button {
            display: none;
            font-size: 30px;
            /* font-weight: bold; */
        }

        @keyframes fall {
            0% {
                transform: translateY(-100vh) rotate(0deg);
            }
            100% {
                transform: translateY(100vh) rotate(720deg);
            }
        }

        .confetti {
            position: fixed;
            width: 10px;
            height: 30px;
            background-color: var(--color, #FF00FF);
            top: 0;
            animation: fall linear infinite;
        }

        .confetti:nth-child(2n) {
            --color: #00FF00;
        }

        .confetti:nth-child(3n) {
            --color: #FFFF00;
        }

        .confetti:nth-child(4n) {
            --color: #FF0000;
        }

        .confetti:nth-child(5n) {
            --color: #0000FF;
        }
    </style>
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="text-center">
        <div class="row mb-5">
            <div class="col text-end">
                <img src="/img/cdp.png" class="img-fluid" width="200px">
            </div>
            <div class="col text-start">
                <img src="/img/aniv2.png" class="img-fluid" width="250px">
            </div>
        </div>
        <h1 class="text-white mb-5" style="font-size: 80px">NAMA PEMENANG DOORPRIZE</h1>
        <div class="bg-white rounded-3 shadow-sm p-3 mb-5">
            <div id="winner-name" class="mb-1">Siapa yang Beruntung?</div>
            <div id="winner-department" class="pb-4"></div>
        </div>
        <div class="d-flex justify-content-center">
            <button id="start-button" class="btn btn-primary btn-lg px-5">Mulai Pengacakan</button>
        </div>

        <div class="d-flex justify-content-center">
            <form action="/doorprize" method="POST" id="congratulations-form">
                @csrf
                <input type="hidden" name="winner_id" id="winner-id-input">
                <button type="submit" id="congratulations-button" class="btn btn-primary btn-lg px-5">Selamat Kepada Pemenang</button>
            </form>
        </div>

        <div class="row mt-5">
            <div class="col text-white">
                <p>Developed by</p>
                <p class="fw-bold mb-1">Adam Zein</p>
                <p>IT CDP</p>
            </div>
        </div>
    </div>

    <script>
        function shuffleArray(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]];
            }
            return array;
        }

        // Data karyawan dikirim sebagai JSON ke JavaScript
        const employeesData = @json($employees);

        // Acak urutan array karyawan
        const employees = shuffleArray(employeesData);

        // Log data untuk memastikan data karyawan
        console.log('Employees Data:', employees);

        const winnerNameElement = document.getElementById('winner-name');
        const winnerDepartmentElement = document.getElementById('winner-department');
        const startButton = document.getElementById('start-button');
        const congratulationsButton = document.getElementById('congratulations-button');
        const winnerIdInput = document.getElementById('winner-id-input');

        let winnerId = null;

        startButton.addEventListener('click', () => {
            const interval = 100; // Kecepatan pengacakan tetap
            const totalDuration = 10000; // Durasi total 10 detik
            let elapsedTime = 0;

            // Sembunyikan tombol mulai pengacakan
            startButton.style.display = 'none';

            const intervalId = setInterval(() => {
                const randomIndex = Math.floor(Math.random() * employees.length);
                const randomEmployee = employees[randomIndex];

                // Debugging: Log untuk memeriksa objek karyawan yang dipilih
                console.log('randomIndex:', randomIndex);
                console.log('Random Employee:', randomEmployee);

                winnerNameElement.textContent = randomEmployee.name;
                winnerDepartmentElement.textContent = randomEmployee.department;

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

                    for (let i = 0; i < 100; i++) {
                        let confetti = document.createElement("div");
                        confetti.classList.add("confetti");
                        confetti.style.left = Math.random() * 100 + "vw";
                        confetti.style.animationDuration = Math.random() * 3 + 2 + "s";
                        document.body.appendChild(confetti);
                    }
                }
            }, interval);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
