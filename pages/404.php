<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <link href="https://fonts.googleapis.com/css2?family=Creepster&family=MedievalSharp&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        background-color: #000;
        color: #c00;
        font-family: 'Creepster', cursive;
        overflow: hidden;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
    }

    .container {
        text-align: center;
        position: relative;
        z-index: 1;
    }

    .error-code {
        font-size: 10rem;
        margin: 0;
        text-shadow: 0 0 10px #f00, 0 0 20px #f00;
        animation: flicker 2s infinite alternate;
    }

    .error-message {
        font-size: 2.5rem;
        margin: 0.5rem 0;
        text-shadow: 0 0 5px #f00;
    }

    .error-description {
        font-size: 1.5rem;
        opacity: 0.8;
    }

    .bloody {
        color: #800;
        text-decoration: underline wavy #c00;
    }

    .creepy-btn {
        background: #300;
        color: #f00;
        border: 2px solid #c00;
        padding: 10px 20px;
        font-family: 'MedievalSharp', cursive;
        font-size: 1.2rem;
        cursor: pointer;
        margin-top: 20px;
        transition: all 0.3s;
    }

    .creepy-btn:hover {
        background: #500;
        box-shadow: 0 0 15px #f00;
    }

    .blood-drips {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('blood.png') repeat;
        opacity: 0.3;
        pointer-events: none;
        z-index: -1;
    }

    @keyframes flicker {
        0%, 19%, 21%, 23%, 25%, 54%, 56%, 100% {
            opacity: 1;
        }
        20%, 22%, 24%, 55% {
            opacity: 0.6;
        }
    }
</style>
<body>
    <div class="container">
        <h1 class="error-code">404</h1>
        <h2 class="error-message">APA YANG KAU PENCET BUJANG...</h2>
        <p class="error-description">Halaman ini khusus Orang dalam aja. <a href="?page=home" class="bloody">Balek kau</a>.</p>
        <button id="scream-btn" class="creepy-btn">HUBUNNGI ADMIN</button>
        <div class="blood-drips"></div>
        <audio id="scream-sound" src="scream.mp3" preload="auto"></audio>
    </div>
    <!-- <script src="script.js"></script> -->
    <script>
        document.getElementById('scream-btn').addEventListener('click', function() {
            const scream = document.getElementById('scream-sound');
            scream.play();
            
            // Tambah efek darah mengalir
            const container = document.querySelector('.container');
            const blood = document.createElement('div');
            blood.style.position = 'absolute';
            blood.style.top = '0';
            blood.style.left = Math.random() * 100 + '%';
            blood.style.width = '2px';
            blood.style.height = '100%';
            blood.style.background = 'linear-gradient(to bottom, #c00, #300)';
            blood.style.animation = 'drip 3s linear';
            container.appendChild(blood);
            
            setTimeout(() => {
                blood.remove();
            }, 3000);
        });

        // Tambahkan CSS darah menetes via JS
        const style = document.createElement('style');
        style.innerHTML = `
            @keyframes drip {
                0% { height: 0; opacity: 1; }
                100% { height: 100%; opacity: 0; }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>