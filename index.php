<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEPAL TOURISM - Explore Beautiful Nepal</title>
<link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>
<!-- Animated Nepal Letters Header - 20+ Background Images -->
    <header class="hero-header" id="heroSection">
        <div class="nepal-letters">
            <div class="letter" data-letter="N" data-bg="https://picsum.photos/seed/everest1/400/400" style="--anim-delay:0s">
                <span>N</span>
            </div>
            <div class="letter" data-letter="E" data-bg="https://picsum.photos/seed/everest2/400/400" style="--anim-delay:0.5s">
                <span>E</span>
            </div>
            <div class="letter" data-letter="P" data-bg="https://picsum.photos/seed/pokhara3/400/400" style="--anim-delay:1s">
                <span>P</span>
            </div>
            <div class="letter" data-letter="A" data-bg="https://picsum.photos/seed/lakes4/400/400" style="--anim-delay:1.5s">
                <span>A</span>
            </div>
            <div class="letter" data-letter="L" data-bg="https://picsum.photos/seed/mountain5/400/400" style="--anim-delay:2s">
                <span>L</span>
            </div>
        </div>
        
        <!-- Additional animated letters for MORE images (20+ total) -->
        <div class="extra-letters">
            <div class="letter letter-extra" data-bg="https://picsum.photos/seed/dashain6/400/400"></div>
            <div class="letter letter-extra" data-bg="https://picsum.photos/seed/tihar7/400/400"></div>
            <div class="letter letter-extra" data-bg="https://picsum.photos/seed/ Kathmandu8/400/400"></div>
            <div class="letter letter-extra" data-bg="https://picsum.photos/seed/patan9/400/400"></div>
            <div class="letter letter-extra" data-bg="https://picsum.photos/seed/bhaktapur10/400/400"></div>
            <div class="letter letter-extra" data-bg="https://picsum.photos/seed/chitwan11/400/400"></div>
            <div class="letter letter-extra" data-bg="https://picsum.photos/seed/lumbini12/400/400"></div>
            <div class="letter letter-extra" data-bg="https://picsum.photos/seed/annapurna13/400/400"></div>
            <div class="letter letter-extra" data-bg="https://picsum.photos/seed/mansalu14/400/400"></div>
            <div class="letter letter-extra" data-bg="https://picsum.photos/seed/namche15/400/400"></div>
            <div class="letter letter-extra" data-bg="https://picsum.photos/seed/ Langtang16/400/400"></div>
            <div class="letter letter-extra" data-bg="https://picsum.photos/seed/mustang17/400/400"></div>
            <div class="letter letter-extra" data-bg="https://picsum.photos/seed/annapurnatrail18/400/400"></div>
            <div class="letter letter-extra" data-bg="https://picsum.photos/seed/poonhill19/400/400"></div>
            <div class="letter letter-extra" data-bg="https://picsum.photos/seed/gurungvillage20/400/400"></div>
        </div>
        
        <div class="header-content">
            <h1>NEPAL TOURISM</h1>
            <p>Discover the Roof of the World</p>
            <div class="scroll-indicator">
                <span>↓</span>
            </div>
        </div>
        
        <!-- Floating decorative elements -->
        <div class="floating-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
            <div class="shape shape-4"></div>
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
                    <img src="https://picsum.photos/seed/dashain/400/300" alt="Dashain">
                    <h3>Dashain</h3>
                    <p>Oct 2024</p>
                </div>
                <div class="festival-card">
                    <img src="https://picsum.photos/seed/tihar/400/300" alt="Tihar">
                    <h3>Tihar</h3>
                    <p>Nov 2024</p>
                </div>
                <div class="festival-card">
                    <img src="https://picsum.photos/seed/holi/400/300" alt="Holi">
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
                    <img src="https://picsum.photos/seed/everest/400/300" alt="Everest">
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
                // Check if database is available
                if($pdo !== null) {
                    $stmt = $pdo->query("SELECT * FROM hotels ORDER BY price ASC");
                    while($row = $stmt->fetch()) {
                        $imgUrl = 'https://picsum.photos/seed/' . strtolower(str_replace(' ', '', $row['name'])) . '/400/300';
                        echo "
                        <div class='hotel-card' data-price='{$row['price']}' data-place='{$row['place']}'>
                            <img src='$imgUrl' alt='{$row['name']}'>
                            <h3>".htmlspecialchars($row['name'])."</h3>
                            <p>₹".number_format($row['price'])."/night</p>
                            <p><strong>".htmlspecialchars($row['place'])."</strong></p>
                            <a href='{$row['link']}' target='_blank' class='book-btn'>Book Now</a>
                            <button class='quick-book' onclick='quickBook(\"".htmlspecialchars($row['name'])."\", {$row['price']}, \"".htmlspecialchars($row['place'])."\")'>Quick Book</button>
                        </div>
                        ";
                    }
                } else {
                    // Demo mode hotels with online images
                    $demoHotels = [
                        ['Everest View Hotel', 'Upper Hill', 50000, 'everest', 'https://booking.com'],
                        ['Annapurna Hotel', 'Lower Hill', 25000, 'annapurna', 'https://booking.com'],
                        ['Pokhara Lakeside', 'Normal Cold', 15000, 'pokhara', 'https://booking.com'],
                        ['Chitwan Jungle Lodge', 'Terai', 8000, 'chitwan', 'https://booking.com']
                    ];
                    foreach($demoHotels as $hotel) {
                        $imgUrl = 'https://picsum.photos/seed/' . $hotel[3] . '/400/300';
                        echo "
                        <div class='hotel-card' data-price='{$hotel[2]}' data-place='{$hotel[1]}'>
                            <img src='$imgUrl' alt='{$hotel[0]}'>
                            <h3>".htmlspecialchars($hotel[0])."</h3>
                            <p>₹".number_format($hotel[2])."/night</p>
                            <p><strong>".htmlspecialchars($hotel[1])."</strong></p>
                            <a href='{$hotel[4]}' target='_blank' class='book-btn'>Book Now</a>
                            <button class='quick-book' onclick='quickBook(\"".htmlspecialchars($hotel[0])."\", {$hotel[2]}, \"".htmlspecialchars($hotel[1])."\")'>Quick Book</button>
                        </div>
                        ";
                    }
                }
                ?>
            </div>
        </section>

<!-- Travel Portal Section - Hotels, Buses, Rentals -->
        <section class="travel-portal">
            <h2>🛣️ Travel Portal</h2>
            <div class="portal-tabs">
                <button class="tab-btn active" onclick="showPortal('hotelstab')">🏨 Hotels (50+)</button>
                <button class="tab-btn" onclick="showPortal('busstab')">🚌 Buses (30+)</button>
                <button class="tab-btn" onclick="showPortal('rentalstab')">🚗 Rentals (40+)</button>
                <button class="tab-btn" onclick="showPortal('mallstab')">🛍️ Malls (15+)</button>
            </div>
            
            <div id="hotelstab" class="portal-content active">
                <div class="grid" id="hotelGridPortal"></div>
            </div>
            <div id="busstab" class="portal-content">
                <div class="grid" id="busGridPortal"></div>
            </div>
            <div id="rentalstab" class="portal-content">
                <div class="grid" id="rentalGridPortal"></div>
            </div>
            <div id="mallstab" class="portal-content">
                <div class="grid" id="mallGridPortal"></div>
            </div>
        </section>

        <!-- Culture Section -->
        <section class="culture">
            <h2>Nepal Culture & Religion</h2>
            <div class="culture-grid">
                <div class="culture-item">
                    <i class="fas fa-pray"></i>
                    <h3>Hinduism</h3>
                </div>
                <div class="culture-item">
                    <i class="fas fa-om"></i>
                    <h3>Buddhism</h3>
                </div>
                <div class="culture-item">
                    <i class="fas fa-mosque"></i>
                    <h3>Islam</h3>
                </div>
                <div class="culture-item">
                    <i class="fas fa-church"></i>
                    <h3>Christianity</h3>
                </div>
            </div>
        </section>

        <!-- Transport Options -->
        <section class="transport">
            <h2>✈️ Transport Options</h2>
            <div class="transport-grid">
                <div class="transport-card">
                    <i class="fas fa-plane"></i>
                    <h3>Flight</h3>
                    <p>Fastest - Kathmandu to worldwide</p>
                </div>
                <div class="transport-card">
                    <i class="fas fa-bus"></i>
                    <h3>Bus</h3>
                    <p>Cheapest - Inter-city travel</p>
                </div>
                <div class="transport-card">
                    <i class="fas fa-car"></i>
                    <h3>Car Rental</h3>
                    <p>Flexible - Self drive</p>
                </div>
                <div class="transport-card">
                    <i class="fas fa-taxi"></i>
                    <h3>Taxi</h3>
                    <p>Local - Quick rides</p>
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

<script src="script.js"></script>
</body>
</html>

<?php
if(isset($_POST['book']) && $pdo !== null) {
    $stmt = $pdo->prepare("INSERT INTO bookings (user_name, place, hotel, date, amount) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([
        sanitizeInput($_POST['user_name']),
        sanitizeInput($_POST['place']),
        sanitizeInput($_POST['hotel_name']),
        $_POST['date'],
        $_POST['price']
    ]);
    echo "<script>alert('Booking Confirmed!');</script>";
} elseif(isset($_POST['book'])) {
    echo "<script>alert('Demo Mode: Booking saved! (Database not connected)');</script>";
}
?>
<!-- Premium Libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<!-- AOS Animations -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>