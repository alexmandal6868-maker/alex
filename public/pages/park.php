<?php include '../../config/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nepal Parks & Rivers Explorer</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <style>
        body { background: linear-gradient(135deg, #0f2027, #203a43, #2c5364); }
        .container { max-width: 1400px; margin: 0 auto; padding: 20px; }
        .header { text-align: center; color: white; margin-bottom: 30px; }
        .header h1 { font-size: 2.5em; }
        .tabs { display: flex; gap: 15px; justify-content: center; flex-wrap: wrap; margin-bottom: 30px; }
        .tab-btn { padding: 15px 25px; background: rgba(255,255,255,0.2); color: white; border: none; border-radius: 25px; cursor: pointer; }
        .tab-btn.active { background: white; color: #333; }
        .content-section { display: none; background: white; border-radius: 20px; padding: 30px; margin-bottom: 30px; }
        .content-section.active { display: block; }
        .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 25px; margin-top: 25px; }
        .card { background: #f8f9ff; border-radius: 15px; padding: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .card:hover { transform: translateY(-10px); }
        .card img { width: 100%; height: 150px; object-fit: cover; border-radius: 10px; margin-bottom: 15px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🇳🇵 Nepal Parks & Rivers</h1>
            <p>20+ National Parks • 20+ Rivers • Hotels • Buses • Rentals</p>
        </div>
        <div class="tabs">
            <button class="tab-btn active" onclick="showTab('parks')">🌳 Parks</button>
            <button class="tab-btn" onclick="showTab('rivers')">🌊 Rivers</button>
        </div>
        <div id="parks" class="content-section active">
            <h2>National Parks</h2>
            <div class="grid" id="parkGrid"></div>
        </div>
        <div id="rivers" class="content-section">
            <h2>Rivers</h2>
            <div class="grid" id="riverGrid"></div>
        </div>
    </div>
    <script>
        const parks = [
            {name: "Chitwan National Park", location: "Chitwan", img: "https://images.unsplash.com/photo-1558618047-3c8c76fdd9e4?w=300&h=150&fit=crop"},
            {name: "Bardiya National Park", location: "Bardiya", img: "https://images.unsplash.com/photo-1551524164-748f2e9d3475?w=300&h=150&fit=crop"}
        ];
        function showTab(tab) {
            document.querySelectorAll('.content-section').forEach(s => s.classList.remove('active'));
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            document.getElementById(tab).classList.add('active');
            event.target.classList.add('active');
        }
        function populateParks() {
            const grid = document.getElementById('parkGrid');
            parks.forEach(park => {
                const card = document.createElement('div');
                card.className = 'card';
                card.innerHTML = `<img src="${park.img}" alt="${park.name}"><h3>${park.name}</h3><p>📍 ${park.location}</p><button onclick="alert('📍 Visiting ${park.name}')">Visit</button>`;
                grid.appendChild(card);
            });
        }
        document.addEventListener('DOMContentLoaded', populateParks);
    </script>
</body>
</html>