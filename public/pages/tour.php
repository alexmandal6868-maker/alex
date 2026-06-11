<?php include '../../config/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nepal Travel Portal - Hotels, Buses, Cars, Malls with Pictures</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            color: white;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .search-bar {
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            margin-bottom: 30px;
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .search-input {
            padding: 12px 20px;
            border: 2px solid #ddd;
            border-radius: 25px;
            font-size: 16px;
            min-width: 200px;
        }

        .search-btn {
            background: linear-gradient(45deg, #ff6b6b, #feca57);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .search-btn:hover {
            transform: scale(1.05);
        }

        .tabs {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .tab-btn {
            background: rgba(255,255,255,0.2);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .tab-btn.active {
            background: white;
            color: #667eea;
            transform: translateY(-2px);
        }

        .content-section {
            display: none;
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .content-section.active {
            display: block;
            animation: fadeIn 0.5s;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 25px;
            margin-top: 25px;
        }

        .card {
            background: #f8f9ff;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.4s;
            border: 3px solid transparent;
            overflow: hidden;
            position: relative;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #ff6b6b, #4ecdc4, #feca57);
        }

        .card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 25px 50px rgba(0,0,0,0.2);
            border-color: #ff6b6b;
        }

        .card-img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 15px;
            margin-bottom: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .card h3 {
            color: #333;
            margin-bottom: 10px;
            font-size: 1.3em;
            font-weight: bold;
        }

        .card p {
            color: #666;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .price-tag {
            background: linear-gradient(45deg, #4ecdc4, #44a08d);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: bold;
            display: inline-block;
            margin: 10px 0;
        }

        .book-btn {
            background: linear-gradient(45deg, #ff6b6b, #feca57);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            cursor: pointer;
            width: 100%;
            font-weight: bold;
            font-size: 16px;
            transition: all 0.3s;
            margin-top: 10px;
        }

        .book-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 25px rgba(255,107,107,0.4);
        }

        .location-tag {
            background: #e3f2fd;
            color: #1976d2;
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 12px;
            display: inline-block;
        }

        @media (max-width: 768px) {
            .grid {
                grid-template-columns: 1fr;
            }
            .search-bar {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🇳🇵 Nepal Travel Portal</h1>
            <p>Hotels • Buses • Car/Bike Rentals • Shopping Malls with Live Pictures</p>
        </div>

        <div class="search-bar">
            <input type="text" class="search-input" id="searchInput" placeholder="🔍 Search hotels, buses, cars, malls...">
            <button class="search-btn" onclick="searchItems()">Search</button>
            <button class="search-btn" onclick="trackTraveler()">📍 Live Track</button>
        </div>

        <div class="tabs">
            <button class="tab-btn active" onclick="showTab('hotels')">🏨 Hotels (50+)</button>
            <button class="tab-btn" onclick="showTab('buses')">🚌 Buses (30+)</button>
            <button class="tab-btn" onclick="showTab('rentals')">🚗 Rentals (40+)</button>
            <button class="tab-btn" onclick="showTab('malls')">🛍️ Malls (15+)</button>
        </div>

        <div id="hotels" class="content-section active">
            <h2>🏨 Premium Hotels Across Nepal</h2>
            <div class="grid" id="hotelGrid"></div>
        </div>

        <div id="buses" class="content-section">
            <h2>🚌 Deluxe Bus Services</h2>
            <div class="grid" id="busGrid"></div>
        </div>

        <div id="rentals" class="content-section">
            <h2>🚗 Bike & Car Rentals</h2>
            <div class="grid" id="rentalGrid"></div>
        </div>

        <div id="malls" class="content-section">
            <h2>🛍️ Shopping Malls & Complexes</h2>
            <div class="grid" id="mallGrid"></div>
        </div>
    </div>

    <script>
        const hotels = [
            {name: "Hotel Yak & Yeti", location: "Kathmandu", price: "₨6500", img: "https://images.unsplash.com/photo-1571896349840-e26b311e851c?w=400&h=200&fit=crop", link: "#"},
            {name: "Soaltee Crowne Plaza", location: "Kathmandu", price: "₨9500", img: "https://images.unsplash.com/photo-1566073771259-6a8506099945?w=400&h=200&fit=crop", link: "#"},
            {name: "Dwarika's Hotel", location: "Kathmandu", price: "₨14000", img: "https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=400&h=200&fit=crop", link: "#"},
            {name: "Pokhara Grande", location: "Pokhara", price: "₨8500", img: "https://images.unsplash.com/photo-1571003611605-5f8b1a973169?w=400&h=200&fit=crop", link: "#"}
        ];

        function showTab(tabName) {
            document.querySelectorAll('.content-section').forEach(s => s.classList.remove('active'));
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            document.getElementById(tabName).classList.add('active');
            event.target.classList.add('active');
        }

        function populateHotels() {
            const grid = document.getElementById('hotelGrid');
            hotels.forEach(hotel => {
                const card = document.createElement('div');
                card.className = 'card';
                card.innerHTML = `
                    <img src="${hotel.img}" alt="${hotel.name}" class="card-img" onerror="this.src='https://via.placeholder.com/400x200'">
                    <h3>${hotel.name}</h3>
                    <span class="location-tag">📍 ${hotel.location}</span>
                    <div class="price-tag">💰 ${hotel.price}/night</div>
                    <button class="book-btn" onclick="alert('🏨 Booking ${hotel.name}!')">Book Now</button>
                `;
                grid.appendChild(card);
            });
        }

        document.addEventListener('DOMContentLoaded', populateHotels);

        function searchItems() {
            alert('🔍 Searching...');
        }

        function trackTraveler() {
            alert('📍 Live GPS Tracking Active');
        }
    </script>
</body>
</html>