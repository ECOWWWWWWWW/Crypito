<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>⚠️ SYSTEM BREACH ⚠️</title>
    <style>
        body {
            background-color: black;
            color: red;
            font-family: 'Courier New', monospace;
            text-align: center;
            padding-top: 100px;
        }
        .alert {
            font-size: 2rem;
            animation: blink 1s infinite;
        }
        @keyframes blink {
            0% { opacity: 1; }
            50% { opacity: 0; }
            100% { opacity: 1; }
        }
        .glitch {
            font-size: 3rem;
            text-shadow: 2px 2px red, -2px -2px black;
        }
    </style>
</head>
<body>
    <div class="glitch">⚠️ YOU HAVE BEEN BREACHED ⚠️</div>
    <div class="alert">Uh-Oh</div>

    <script>
        setTimeout(function() {
            window.location.href = "{{ route('dashboard') }}";
        }, 3000); // redirect after 3 seconds
    </script>
</body>
</html>
