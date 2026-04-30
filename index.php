<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEPAL TOURISM - Explore Beautiful Nepal</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Animated Nepal Letters Header -->
    <header class="hero-header">
        <div class="nepal-letters">
            <div class="letter" data-letter="N" data-bg="images/nepal1.jpg">
                <span>N</span>
            </div>
            <div class="letter" data-letter="E" data-bg="images/nepal2.jpg">
                <span>E</span>
            </div>
            <div class="letter" data-letter="P" data-bg="images/nepal3.jpg">
                <span>P</span>
            </div>
            <div class="letter" data-letter="A" data-bg="images/nepal4.jpg">
                <span>A</span>
            </div>
            <div class="letter" data-letter="L" data-bg="images/nepal5.jpg">
                <span>L</span>
            </div>
        </div>
        <div class="header-content">
            <h1>NEPAL TOURISM</h1>
            <p>Discover the Roof of the World</p>
        </div>
    </header>

    <!-- Language Navbar -->
    <nav class="language-nav">
        <div class="nav-container">
            <button class="translate-btn" onclick="translatePage()">
                <i class="fas fa-globe"></i> Translate (50+ Languages)
            </button>
            <select id="languageSelect" onchange="changeLanguage(this.value)">
                <option value="en">English</option>
                <option value="ne">Nepali (नेपाली)</option>
                <option value="hi">Hindi (हिंदी)</option>
                <option value="ch">Chinese (中文)</option>
            </select>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Festivals Section -->
        <section class="festivals">
            <h2>Nepal Festivals <i class="fas fa-calendar-alt"></i></h2>
            <div class="festival-grid">
                <div class="festival-card">
                    <img src="images/dashain.jpg" alt="Dashain">
                    <h3>Dashain</h3>
                    <p>Oct 2024</p>
                </div>
                <div class="festival-card">
                    <img src="images/tihar.jpg" alt="Tihar">
                    <h3>Tihar</h3>
                    <p>Nov 2024</p>
                </div>
                <div class="festival-card">
                    <img src="images/holi.jpg" alt="Holi">
                    <h3>Holi</h3>
                    <p>Mar 2025</p>
                </div>
            </div>
        </section>

        <!-- Regions Section -->
        <section class="regions">
            <h2>Explore Nepal Regions</h2>
            <div class="region-tabs">
                <button class="tab-btn active" onclick="showRegion('upper')">Upper Hills (8+)</button>
                <button class="tab-btn" onclick="showRegion('lower')">Lower Hills (10+)</button>
                <button class="tab-btn" onclick="showRegion('cold')">Very Cold (7+)</button>
                <button class="tab-btn" onclick="showRegion('normal')">Normal Cold (5+)</button>
                <button class="tab-btn" onclick="showRegion('terai')">Terai (5+)</button>
            </div>
            <div id="upper" class="region-content active">
                <div class="place-card">
                    <img src="images/everest.jpg" alt="">
                    <h3>Everest Region</h3>
                    <p>World's Highest Peak</p>
                </div>
            </div>
        </section>

        <!-- Hotels & Booking -->
        <section class="hotels">
            <h2>Best Hotels & Deals</h2>
            <div class="price-filter">
                <button onclick="filterHotels('all')">All</button>
                <button onclick="filterHotels('cheapest')">Cheapest</button>
                <button onclick="filterHotels('expensive')">Most Expensive</button>
            </div>
            <div class="hotels-grid" id="hotelsGrid">
                <?php
                $stmt = $pdo->query("SELECT * FROM hotels ORDER BY price ASC");
                while($row = $stmt->fetch()) {
                    echo "
                    <div class='hotel-card' data-price='{$row['price']}' data-place='{$row['place']}'>
                        <img src='images/{$row['image']}' alt='{$row['name']}'>
                        <h3>{$row['name']}</h3>
                        <p>₹{$row['price']}/night</p>
                        <p><strong>{$row['place']}</strong></p>
                        <a href='{$row['link']}' target='_blank' class='book-btn'>Book Now</a>
                        <button class='quick-book' onclick='quickBook(\"{$row['name']}\", {$row['price']}, \"{$row['place']}\")'>Quick Book</button>
                    </div>
                    ";
                }
                ?>
            </div>
        </section>

        <!-- Culture Section -->
        <section class="culture">
            <h2>Nepal Culture & Religion</h2>
            <div class="culture-grid">
                <div class="culture-item">
                    <i class="fas fa-mosque"></i>
                    <h3>Hinduism</h3>
                </div>
                <div class="culture-item">
                    <i class="fas fa-pray"></i>
                    <h3>Buddhism</h3>
                </div>
            </div>
        </section>

        <!-- Transport Section -->
        <section class="transport">
            <h2>Transport Options</h2>
            <div class="transport-grid">
                <div class="transport-card">
                    <i class="fas fa-plane"></i>
                    <h3>Flight</h3>
                    <p>Fastest - Kathmandu to anywhere</p>
                </div>
                <div class="transport-card">
                    <i class="fas fa-bus"></i>
                    <h3>Bus</h3>
                    <p>Cheapest option</p>
                </div>
            </div>
        </section>
    </main>

    <!-- Booking Modal -->
    <div id="bookingModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Quick Booking</h2>
            <form id="bookingForm" method="POST" action="">
                <input type="hidden" id="hotelName" name="hotel_name">
                <input type="hidden" id="hotelPrice" name="price">
                <input type="hidden" id="hotelPlace" name="place">
                <input type="text" id="userName" name="user_name" placeholder="Your Name" required>
                <input type="date" name="date" required>
                <button type="submit" name="book">Book Now - Pay Online</button>
            </form>
        </div>
    </div>

    <!-- Admin Login Button -->
    <div class="admin-panel">
        <button onclick="openAdminLogin()">Admin Login</button>
    </div>

    <script src="js/script.js"></script>
</body>
</html>

<?php
if(isset($_POST['book'])) {
    $stmt = $pdo->prepare("INSERT INTO bookings (user_name, place, hotel, date, amount) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST['user_name'],
        $_POST['place'],
        $_POST['hotel_name'],
        $_POST['date'],
        $_POST['price']
    ]);
    echo "<script>alert('Booking Confirmed!');</script>";
}
?>
<!-- Premium Libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<!-- AOS Animations -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>