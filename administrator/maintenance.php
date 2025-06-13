<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Situs Dalam Pemeliharaan - [Nama Perusahaan]</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
    :root {
        --primary-color: #3498db;
        --secondary-color: #e74c3c;
        --dark-color: #2c3e50;
        --light-color: #ecf0f1;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        color: var(--dark-color);
        text-align: center;
        margin: 0;
        padding: 0;
        line-height: 1.6;
        overflow-x: hidden;
        min-height: 100vh;
    }

    .floating-tools {
        position: absolute;
        font-size: 24px;
        opacity: 0.6;
        animation: floating 3s infinite ease-in-out;
    }

    @keyframes floating {

        0%,
        100% {
            transform: translateY(0) rotate(0deg);
        }

        50% {
            transform: translateY(-20px) rotate(5deg);
        }
    }

    .maintenance-container {
        max-width: 800px;
        margin: 50px auto;
        padding: 40px;
        background-color: rgba(255, 255, 255, 0.95);
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        position: relative;
        z-index: 1;
        /* backdrop-filter: blur(5px); */
        border: 1px solid rgba(255, 255, 255, 0.3);
        transform-style: preserve-3d;
        transform: perspective(1000px);
        transition: all 0.5s ease;
    }

    .maintenance-container:hover {
        transform: perspective(1000px) rotateY(5deg) rotateX(5deg);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
    }

    h1 {
        color: var(--primary-color);
        font-size: 2.8em;
        margin-bottom: 20px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    p {
        font-size: 1.2em;
        margin-bottom: 30px;
    }

    .main-icon {
        font-size: 80px;
        margin-bottom: 20px;
        display: inline-block;
        animation: bounce 2s infinite, colorChange 5s infinite alternate;
    }

    @keyframes bounce {

        0%,
        20%,
        50%,
        80%,
        100% {
            transform: translateY(0);
        }

        40% {
            transform: translateY(-30px);
        }

        60% {
            transform: translateY(-15px);
        }
    }

    @keyframes colorChange {
        0% {
            color: var(--primary-color);
        }

        50% {
            color: var(--secondary-color);
        }

        100% {
            color: var(--primary-color);
        }
    }

    .countdown {
        font-size: 1.8em;
        margin: 30px 0;
        padding: 20px;
        background: rgba(52, 152, 219, 0.1);
        border-radius: 10px;
        display: inline-block;
        box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1);
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.03);
        }

        100% {
            transform: scale(1);
        }
    }

    .progress-container {
        width: 80%;
        height: 20px;
        background: #e0e0e0;
        border-radius: 10px;
        margin: 30px auto;
        overflow: hidden;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.2);
    }

    .progress-bar {
        height: 100%;
        width: 65%;
        background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
        border-radius: 10px;
        animation: progressAnimation 2s ease-in-out infinite alternate;
        position: relative;
    }

    @keyframes progressAnimation {
        0% {
            width: 65%;
        }

        100% {
            width: 68%;
        }
    }

    .progress-bar::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(90deg,
                transparent,
                rgba(255, 255, 255, 0.8),
                transparent);
        animation: shine 2s infinite;
    }

    @keyframes shine {
        0% {
            transform: translateX(-100%);
        }

        100% {
            transform: translateX(100%);
        }
    }

    .contact {
        margin-top: 30px;
        font-size: 1.1em;
        color: #7f8c8d;
        animation: fadeIn 2s;
    }

    .social-links {
        margin-top: 30px;
    }

    .social-links a {
        display: inline-block;
        width: 50px;
        height: 50px;
        line-height: 50px;
        margin: 0 10px;
        color: white;
        background: var(--primary-color);
        border-radius: 50%;
        font-size: 1.5em;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
    }

    .social-links a:hover {
        transform: translateY(-5px) rotate(10deg);
        box-shadow: 0 8px 20px rgba(52, 152, 219, 0.6);
        background: var(--secondary-color);
    }

    .worker {
        position: absolute;
        bottom: -50px;
        right: -50px;
        font-size: 150px;
        opacity: 0.1;
        z-index: -1;
        animation: workerMove 20s linear infinite;
    }

    @keyframes workerMove {
        0% {
            transform: translateX(0) rotate(0deg);
        }

        100% {
            transform: translateX(-100px) rotate(360deg);
        }
    }

    @media (max-width: 768px) {
        .maintenance-container {
            margin: 20px;
            padding: 20px;
        }

        h1 {
            font-size: 2em;
        }

        .worker {
            display: none;
        }
    }
    </style>
</head>

<body>
    <!-- Floating tools in background -->
    <div class="floating-tools" style="top:10%; left:10%;">🔨</div>
    <div class="floating-tools" style="top:20%; left:80%; animation-delay:0.5s;">🛠️</div>
    <div class="floating-tools" style="top:70%; left:15%; animation-delay:1s;">⚙️</div>
    <div class="floating-tools" style="top:80%; left:75%; animation-delay:1.5s;">🔧</div>

    <div class="maintenance-container animate__animated animate__fadeIn">
        <div class="main-icon animate__animated animate__bounce animate__infinite">
            <i class="fas fa-tools"></i>
        </div>
        <h1 class="animate__animated animate__fadeInDown">Sedang Dalam Pemeliharaan</h1>
        <p class="animate__animated animate__fadeIn animate__delay-1s">
            Kami sedang melakukan upgrade sistem untuk memberikan pengalaman yang lebih baik bagi Anda.
            Mohon maaf atas ketidaknyamanan ini.
        </p>

        <div class="countdown">
            <div>Situs akan kembali online dalam:</div>
            <div id="timer" style="font-weight:bold; font-size:1.5em;">00:00:00</div>
        </div>

        <div class="progress-container">
            <div class="progress-bar"></div>
        </div>

        <p class="animate__animated animate__fadeIn animate__delay-2s">
            Proses pemeliharaan sedang berjalan dengan lancar. Kami berusaha menyelesaikannya secepat mungkin.
        </p>

        <a href="?page=admin" class="animate__animated animate__fadeIn animate__delay-2s">
            back to admin
        </a>

        <div class="contact animate__animated animate__fadeIn animate__delay-3s">
            Jika Anda membutuhkan bantuan segera, hubungi kami:<br>
            <strong><i class="fas fa-envelope"></i> bramwelltambunan@gmail.com</strong><br>
            <strong><i class="fas fa-phone"></i> +62 813 6116 3339</strong>
        </div>

        <!-- <div class="social-links animate__animated animate__fadeIn animate__delay-4s">
            Tetap terhubung dengan kami:
            <a href="#" class="animate__animated animate__bounce animate__delay-5s"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="animate__animated animate__bounce animate__delay-5s"><i class="fab fa-twitter"></i></a>
            <a href="#" class="animate__animated animate__bounce animate__delay-5s"><i class="fab fa-instagram"></i></a>
            <a href="#" class="animate__animated animate__bounce animate__delay-5s"><i class="fab fa-linkedin-in"></i></a>
        </div> -->

        <div class="worker">👷</div>
    </div>

    <script>
    // Countdown timer (24 jam dari waktu sekarang)
    function startTimer(duration, display) {
        var timer = duration,
            hours, minutes, seconds;
        var interval = setInterval(function() {
            hours = parseInt(timer / 3600, 10);
            minutes = parseInt((timer % 3600) / 60, 10);
            seconds = parseInt(timer % 60, 10);

            hours = hours < 10 ? "0" + hours : hours;
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = hours + ":" + minutes + ":" + seconds;

            if (--timer < 0) {
                clearInterval(interval);
                display.textContent = "Segera!";
                document.querySelector('.countdown').classList.add('animate__animated', 'animate__pulse',
                    'animate__infinite');
            }
        }, 1000);
    }

    window.onload = function() {
        var twentyFourHours = 24 * 60 * 60,
            display = document.querySelector('#timer');
        startTimer(twentyFourHours, display);

        // Animate progress bar width randomly
        setInterval(function() {
            var progress = document.querySelector('.progress-bar');
            var currentWidth = parseInt(progress.style.width) || 65;
            var newWidth = currentWidth + (Math.random() * 2 - 1);
            newWidth = Math.max(60, Math.min(70, newWidth));
            progress.style.width = newWidth + '%';
        }, 2000);
    };
    </script>
</body>

</html>