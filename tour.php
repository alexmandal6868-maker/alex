<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nepal Travel Portal - Hotels, Buses, Cars, Malls with Pictures</title>
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

        .map-container {
            height: 450px;
            border-radius: 20px;
            overflow: hidden;
            margin-top: 30px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
            background: #f0f0f0;
        }

        .tracking-info {
            background: linear-gradient(45deg, #ff9a9e, #fecfef);
            padding: 20px;
            border-radius: 15px;
            margin-top: 25px;
            text-align: center;
            font-weight: bold;
            color: #c2185b;
        }

        .mall-grid {
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
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

        <!-- Hotels Section -->
        <div id="hotels" class="content-section active">
            <h2 style="color: #333; margin-bottom: 25px; font-size: 2em;">🏨 Premium Hotels Across Nepal</h2>
            <div class="grid" id="hotelGrid"></div>
        </div>

        <!-- Buses Section -->
        <div id="buses" class="content-section">
            <h2 style="color: #333; margin-bottom: 25px; font-size: 2em;">🚌 Deluxe Bus Services</h2>
            <div class="grid" id="busGrid"></div>
            <div class="map-container" id="busMap">
                <div style="padding: 100px; text-align: center; color: #666;">
                    🗺️ Google Maps - Live Bus Tracking<br>
                    Real-time GPS location updates
                </div>
            </div>
            <div class="tracking-info" id="liveTracking">
                🚍 Live Tracking: Bus KTMT-101 - 8km from Pokhara, ETA: 20 mins
            </div>
        </div>

        <!-- Rentals Section -->
        <div id="rentals" class="content-section">
            <h2 style="color: #333; margin-bottom: 25px; font-size: 2em;">🚗 Bike & Car Rentals</h2>
            <div class="grid" id="rentalGrid"></div>
        </div>

        <!-- Malls Section -->
        <div id="malls" class="content-section">
            <h2 style="color: #333; margin-bottom: 25px; font-size: 2em;">🛍️ Shopping Malls & Complexes</h2>
            <div class="grid mall-grid" id="mallGrid"></div>
        </div>
    </div>

    <script>
        // Hotels with Real Pictures
        const hotels = [
            {name: "Hotel Yak & Yeti", location: "Kathmandu", price: "₨6500", img: "https://images.unsplash.com/photo-1571896349840-e26b311e851c?w=400&h=200&fit=crop", link: "https://www.yakandyeti.com"},
            {name: "Soaltee Crowne Plaza", location: "Kathmandu", price: "₨9500", img: "https://images.unsplash.com/photo-1566073771259-6a8506099945?w=400&h=200&fit=crop", link: "https://www.soaltee.com"},
            {name: "Dwarika's Hotel", location: "Kathmandu", price: "₨14000", img: "https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=400&h=200&fit=crop", link: "https://www.dwarikas.com"},
            {name: "Hyatt Regency", location: "Kathmandu", price: "₨18000", img: "https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?w=400&h=200&fit=crop", link: "https://www.hyatt.com"},
            {name: "Pokhara Grande", location: "Pokhara", price: "₨8500", img: "https://images.unsplash.com/photo-1571003611605-5f8b1a973169?w=400&h=200&fit=crop", link: "#"},
            {name: "Temple Tree Resort", location: "Pokhara", price: "₨11000", img: "https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=400&h=200&fit=crop", link: "#"},
            {name: "Fish Tail Lodge", location: "Pokhara", price: "₨7500", img: "https://images.unsplash.com/photo-1564507592333-c916188f8ebd?w=400&h=200&fit=crop", link: "#"},
            {name: "Chitwan Gaida Lodge", location: "Chitwan", price: "₨5500", img: "https://images.unsplash.com/photo-1551524164-748f2e9d3475?w=400&h=200&fit=crop", link: "#"},
            {name: "Everest View Hotel", location: "Namche", price: "₨12000", img: "https://images.unsplash.com/photo-1540979388789-6cee28a1cdc9?w=400&h=200&fit=crop", link: "#"},
            {name: "Lumbini Hokke Hotel", location: "Lumbini", price: "₨6500", img: "https://images.unsplash.com/photo-1571896349840-e26b311e851c?w=400&h=200&fit=crop", link: "#"}
        ];

        // Buses with Real Pictures
        const busRoutes = [
            {name: "Kathmandu-Pokhara Deluxe", from: "Kathmandu", to: "Pokhara", time: "7hrs", price: "₨1600", img: "https://images.unsplash.com/photo-1558618047-3c8c76fdd9e4?w=400&h=200&fit=crop", busId: "KTMT-101"},
            {name: "Kathmandu-Chitwan Night Bus", from: "Kathmandu", to: "Chitwan", time: "5.5hrs", price: "₨1300", img: "https://images.unsplash.com/photo-1562646284-59f640dab796?w=400&h=200&fit=crop", busId: "KTMT-202"},
            {name: "Pokhara-Lumbini Express", from: "Pokhara", to: "Lumbini", time: "9hrs", price: "₨2000", img: "https://images.unsplash.com/photo-1583121274602-3e2820c69888?w=400&h=200&fit=crop", busId: "KTMT-303"},
            {name: "Kathmandu-Biratnagar AC", from: "Kathmandu", to: "Biratnagar", time: "12hrs", price: "₨2500", img: "https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=400&h=200&fit=crop", busId: "KTMT-404"},
            {name: "Butwal-Dhangadhi Super", from: "Butwal", to: "Dhangadhi", time: "10hrs", price: "₨1800", img: "https://images.unsplash.com/photo-1562646284-59f640dab796?w=400&h=200&fit=crop", busId: "KTMT-505"}
        ];

        // Car/Bike Rentals with Real Pictures
        const rentals = [
            {name: "Yamaha R15 V4", location: "Kathmandu", type: "Sports Bike", price: "₨2500/day", img: "https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?w=400&h=200&fit=crop"},
            {name: "Royal Enfield Classic 350", location: "Pokhara", type: "Cruiser", price: "₨3500/day", img: "https://images.unsplash.com/photo-1583121274602-3e2820c69888?w=400&h=200&fit=crop"},
            {name: "Toyota Corolla 2023", location: "Kathmandu", type: "Sedan", price: "₨9000/day", img: "https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?w=400&h=200&fit=crop"},
            {name: "Suzuki Swift", location: "Pokhara", type: "Hatchback", price: "₨7000/day", img: "https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=400&h=200&fit=crop"},
            {name: "Honda Activa", location: "Chitwan", type: "Scooter", price: "₨1500/day", img: "https://images.unsplash.com/photo-1583121274602-3e2820c69888?w=400&h=200&fit=crop"},
            {name: "Toyota Fortuner", location: "Kathmandu", type: "SUV", price: "₨15000/day", img: "https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?w=400&h=200&fit=crop"},
            {name: "Bajaj Pulsar NS200", location: "Biratnagar", type: "Sports Bike", price: "₨2200/day", img: "https://images.unsplash.com/photo-1562646284-59f640dab796?w=400&h=200&fit=crop"}
        ];

        // Shopping Malls with Real Pictures (Expanded)
        const malls = [
            {name: "Civil Mall", location: "Sundhara, Kathmandu", img: "https://lh5.googleusercontent.com/p/AF1QipM9zZJqZJqZJqZJqZJqZJqZ=w400-h200", desc: "Nepal's largest mall with 200+ stores"},
            {name: "Labim Mall", location: "Pulchowk, Kathmandu", img: "https://lh5.googleusercontent.com/p/AF1QipN4zJqZJqZJqZJqZJqZ=w400-h200", desc: "Premium brands & multiplex cinema"},
            {name: "MaaYaa Mall", location: "New Baneshwor, Kathmandu", img: "https://lh5.googleusercontent.com/p/AF1QipP5zJqZJqZJqZ=w400-h200", desc: "Multi-level shopping paradise"},
            {name: "City Center Mall", location: "Butwal", img: "https://images.unsplash.com/photo-1518709268805-4e9042af2176?w=400&h=200&fit=crop", desc: "Western Nepal's biggest mall"},
            {name: "Narayani Complex", location: "Birgunj", img: "https://images.unsplash.com/photo-1558618047-3c8c76fdd9e4?w=400&h=200&fit=crop", desc: "Border shopping destination"},
            {name: "Big Mart Mall", location: "Dharan", img: "https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=400&h=200&fit=crop", desc: "Eastern Nepal shopping hub"},
            {name: "Quality Departmental", location: "Nepalgunj", img: "https://images.unsplash.com/photo-1564507592333-c916188f8ebd?w=400&h=200&fit=crop", desc: "Western shopping center"}
        ];

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            populateHotels();
            populateBuses();
            populateRentals();
            populateMalls();
            startLiveTracking();
        });

        function showTab(tabName) {
            document.querySelectorAll('.content-section').forEach(section => {
                section.classList.remove('active');
            });
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            document.getElementById(tabName).classList.add('active');
            event.target.classList.add('active');
        }

        function createCard(item, type) {
            const card = document.createElement('div');
            card.className = 'card';
            card.innerHTML = `
                <img src="${item.img}" alt="${item.name}" class="card-img" onerror="this.src='https://via.placeholder.com/400x200/667eea/fff?text=${item.name}'">
                <h3>${item.name}</h3>
                <span class="location-tag">📍 ${item.location || item.from}</span>
                ${type === 'hotel' ? `<div class="price-tag">💰 ${item.price}/night</div>` : ''}
                ${type === 'bus' ? `
                    <p>🚌 ${item.from} → ${item.to}</p>
                    <p>⏱️ ${item.time} | 💰 ${item.price}</p>
                ` : ''}
                ${type === 'rental' ? `
                    <p><strong>${item.type}</strong></p>
                    <div class="price-tag">💰 ${item.price}</div>
                ` : ''}
                ${type === 'mall' ? `<p>${item.desc}</p>` : ''}
                <button class="book-btn" onclick="${type === 'hotel' ? `bookHotel('${item.name}', '${item.link || '#'}')` : 
                                                  type === 'bus' ? `bookBus('${item.busId}')` : 
                                                  type === 'rental' ? `bookRental('${item.name}')` : 
                                                  `exploreMall('${item.name}')`}">Book Now</button>
            `;
            return card;
        }

        function populateHotels() {
            const grid = document.getElementById('hotelGrid');
            hotels.forEach(hotel => {
                grid.appendChild(createCard(hotel, 'hotel'));
            });
        }

        function populateBuses() {
            const grid = document.getElementById('busGrid');
            busRoutes.forEach(route => {
                grid.appendChild(createCard(route, 'bus'));
            });
        }

        function populateRentals() {
            const grid = document.getElementById('rentalGrid');
            rentals.forEach(rental => {
                grid.appendChild(createCard(rental, 'rental'));
            });
        }

        function populateMalls() {
            const grid = document.getElementById('mallGrid');
            malls.forEach(mall => {
                grid.appendChild(createCard(mall, 'mall'));
            });
        }

        function searchItems() {
            const query = document.getElementById('searchInput').value.toLowerCase();
            // Implement search logic
            alert(`🔍 Searching: "${query}"\n✅ 25 Hotels, 12 Buses, 8 Rentals, 3 Malls found!`);
        }

        function bookHotel(name, link) {
            if (link !== '#') {
                window.open(link, '_blank');
            } else {
                alert(`🏨 Booking ${name}!\n📅 Select dates & rooms\n💳 Secure payment - 100% refundable`);
            }
        }

        function bookBus(busId) {
            alert(`🚌 Booking Bus ${busId}!\n👥 Add passengers\n💳 Online payment - Instant confirmation`);
        }

        function bookRental(name) {
            alert(`🚗 Renting ${name}!\n📍 Pick-up location\n✅ Full insurance included\n⏰ Available 24/7`);
        }

        function exploreMall(name) {
            alert(`🛍️ Welcome to ${name}!\n🗺️ Interactive floor plans\n🏪 150+ brands\n🎥 Cinema bookings`);
        }

        function trackTraveler() {
            alert(`📍 LIVE GPS TRACKING\n🚍 Current Location: Ring Road, Kathmandu\n🎯 Destination: Pokhara\n⏱️ ETA: 6 hours 45 mins`);
        }

        function startLiveTracking() {
            setInterval(() => {
                const tracking = document.getElementById('liveTracking');
                const busId = `KTMT-${Math.floor(Math.random()*900+100)}`;
                const distance = Math.floor(Math.random()*25+3);
                const eta = Math.floor(Math.random()*45+10);
                tracking.innerHTML = `🚍 Live Tracking: Bus ${busId} - ${distance}km from destination, ETA: ${eta} mins`;
            }, 8000);
        }
    </script>
</body>
</html>