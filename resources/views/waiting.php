<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Waiting for Access</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @keyframes gradientShift {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .animated-gradient {
      background: linear-gradient(-45deg, #0f172a, #1e3a8a, #f59e0b, #fef3c7);
      background-size: 400% 400%;
      animation: gradientShift 15s ease infinite;
    }

    @keyframes bounceLoader {
      0% { transform: translateX(0); }
      100% { transform: translateX(20px); }
    }

    .bounce-loader {
      animation: bounceLoader 0.6s ease-in-out infinite alternate;
    }

    @keyframes floatAndFade {
      0%   { transform: translateY(0); opacity: 1; }
      50%  { transform: translateY(-5px); opacity: 0.6; }
      100% { transform: translateY(0); opacity: 1; }
    }

    .floating-text {
      animation: floatAndFade 2.5s ease-in-out infinite;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .fade-in {
      animation: fadeIn 0.6s ease-in-out both;
    }
  </style>
</head>
<body class="animated-gradient flex flex-col justify-center items-center h-screen text-white">

  <!-- Loader -->
  <div class="text-center fade-in space-y-6 mb-10">
    <div class="flex justify-center items-center gap-6">
      <div class="w-6 h-6 bg-white rounded-full bounce-loader shadow-md"></div>
      <div class="text-5xl font-extrabold drop-shadow-md" id="percent">0%</div>
    </div>
  </div>

  <!-- Floating Text -->
  <div class="floating-text text-lg font-medium text-white drop-shadow text-center px-6 leading-relaxed opacity-90">
    <p>Please wait a moment,</p>
    <p>your access is being prepared by the admin...</p>
  </div>

  <script>
    let percent = 0;
    const percentEl = document.getElementById("percent");

    const interval = setInterval(() => {
      if (percent < 100) {
        percent++;
        percentEl.textContent = percent + "%";
      } else {
        clearInterval(interval);
        window.location.href = "/dashboard";
      }
    }, 80);
  </script>
    
</body>
</html>
