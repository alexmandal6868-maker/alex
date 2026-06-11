<?php include '../../config/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nepal Lakes Explorer</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <style>
        body { background: linear-gradient(135deg, #0a0a1f, #1a1a3a, #2a2a4a); color: white; }
        .container { max-width: 1400px; margin: 0 auto; padding: 20px; }
        .header { text-align: center; margin-bottom: 30px; }
        .header h1 { font-size: 2.5em; background: linear-gradient(45deg, #0066ff, #00ccff); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .content-section { display: none; background: rgba(255,255,255,0.97); border-radius: 20px; padding: 30px; margin-bottom: 30px; color: #333; }
        .content-section.active { display: block; }
        .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 25px; margin-top: 25px; }
        .card { background: white; border-radius: 15px; padding: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .card img { width: 100%; height: 150px; object-fit: cover; border-radius: 10px; margin-bottom: 15px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🏞️ Nepal Lakes Explorer</h1>
            <p>15+ Stunning Lakes • Mountains • Hidden Gems</p>
        </div>
        <div id="lakes" class="content-section active">
            <h2 style="color: #333; text-align: center;">Beautiful Lakes of Nepal</h2>
            <div class="grid" id="lakeGrid"></div>
        </div>
    </div>
    <script>
        const lakes = [
            {name: "Phewa Lake", location: "Pokhara", img: "https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=300&h=150&fit=crop"},
            {name: "Rara Lake", location: "Mugu", img: "https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=300&h=150&fit=crop"}
        ];
        function populateLakes() {
            const grid = document.getElementById('lakeGrid');
            lakes.forEach(lake => {
                const card = document.createElement('div');
                card.className = 'card';
                card.innerHTML = `<img src="${lake.img}" alt="${lake.name}"><h3>${lake.name}</h3><p>📍 ${lake.location}</p><button onclick="alert('🏞️ Exploring ${lake.name}')">Explore</button>`;
                grid.appendChild(card);
            });
        }
        document.addEventListener('DOMContentLoaded', populateLakes);
    </script>
</body>
</html>