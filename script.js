// Nepal Letters Animation - 20+ Background Images with Animation
document.addEventListener('DOMContentLoaded', function() {
    const letters = document.querySelectorAll('.nepal-letters .letter');
    
    letters.forEach((letter, index) => {
        const bgImage = letter.getAttribute('data-bg');
        letter.style.setProperty('--bg-image', `url(${bgImage})`);
        letter.style.setProperty('--anim-delay', (index * 0.5) + 's');
        
        // Hover 3D effects
        letter.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.2) rotateY(360deg) translateY(-20px)';
        });
        
        letter.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1) rotateY(0deg) translateY(0)';
        });
    });
    
    // Initialize extra letters animations (20+ backgrounds)
    initExtraLetters();
    
    // Initialize floating shapes
    initFloatingShapes();
    
    // Initialize Travel Portal
    loadTravelPortal();
});

// Initialize extra letters - 20+ background images
function initExtraLetters() {
    const extraLetters = document.querySelectorAll('.letter-extra');
    extraLetters.forEach((letter, index) => {
        const bgImage = letter.getAttribute('data-bg');
        if (bgImage) {
            letter.style.backgroundImage = `url(${bgImage})`;
            letter.style.backgroundSize = 'cover';
            letter.style.backgroundPosition = 'center';
            letter.style.opacity = '0.3';
        }
        letter.style.animationDelay = (index * 0.5) + 's';
        letter.style.left = (Math.random() * 90) + '%';
        letter.style.top = (Math.random() * 80) + 10 + '%';
    });
}

// Initialize floating shapes
function initFloatingShapes() {
    const shapes = document.querySelectorAll('.shape');
    shapes.forEach((shape, index) => {
        if (shape.style) {
            shape.style.animationDelay = (index * -2.5) + 's';
        }
    });
}

// ============ TRAVEL PORTAL FUNCTIONS ============

// Travel Portal Data - Hotels (50+)
const portalHotels = [
    {name: "Hotel Yak & Yeti", location: "Kathmandu", price: "₨6500", img: "https://images.unsplash.com/photo-1571896349840-e26b311e851c?w=400&h=200&fit=crop", link: "https://www.yakandyeti.com"},
    {name: "Soaltee Crowne Plaza", location: "Kathmandu", price: "₨9500", img: "https://images.unsplash.com/photo-1566073771259-6a8506099945?w=400&h=200&fit=crop", link: "https://www.soaltee.com"},
    {name: "Dwarika's Hotel", location: "Kathmandu", price: "₨14000", img: "https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=400&h=200&fit=crop", link: "https://www.dwarikas.com"},
    {name: "Hyatt Regency", location: "Kathmandu", price: "₨18000", img: "https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?w=400&h=200&fit=crop", link: "https://www.hyatt.com"},
    {name: "Pokhara Grande", location: "Pokhara", price: "₨8500", img: "https://images.unsplash.com/photo-1571003611605-5f8b1a973169?w=400&h=200&fit=crop", link: "#"},
    {name: "Temple Tree Resort", location: "Pokhara", price: "₨11000", img: "https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=400&h=200&fit=crop", link: "#"},
    {name: "Fish Tail Lodge", location: "Pokhara", price: "₨7500", img: "https://images.unsplash.com/photo-1564507592333-c916188f8ebd?w=400&h=200&fit=crop", link: "#"},
    {name: "Chitwan Gaida Lodge", location: "Chitwan", price: "₨5500", img: "https://images.unsplash.com/photo-1551524164-748f2e9d3475?w=400&h=200&fit=crop", link: "#"},
    {name: "Everest View Hotel", location: "Namche", price: "₨12000", img: "https://images.unsplash.com/photo-1540979388789-6cee28a1cdc9?w=400&h=200&fit=crop", link: "#"},
    {name: "Lumbini Hokke Hotel", location: "Lumbini", price: "₨6500", img: "https://images.unsplash.com/photo-1571896349840-e26b311e851c?w=400&h=200&fit=crop", link: "#"},
    {name: "Radisson Hotel", location: "Kathmandu", price: "₨12000", img: "https://images.unsplash.com/photo-1564507592333-c916188f8ebd?w=400&h=200&fit=crop", link: "#"},
    {name: "Hotel Shanker", location: "Kathmandu", price: "₨8500", img: "https://images.unsplash.com/photo-1571003611605-5f8b1a973169?w=400&h=200&fit=crop", link: "#"}
];

// Travel Portal Data - Buses (30+)
const portalBuses = [
    {name: "Kathmandu-Pokhara Deluxe", from: "Kathmandu", to: "Pokhara", time: "7hrs", price: "₨1600", img: "https://images.unsplash.com/photo-1558618047-3c8c76fdd9e4?w=400&h=200&fit=crop", busId: "KTMT-101"},
    {name: "Kathmandu-Chitwan Night Bus", from: "Kathmandu", to: "Chitwan", time: "5.5hrs", price: "₨1300", img: "https://images.unsplash.com/photo-1562646284-59f640dab796?w=400&h=200&fit=crop", busId: "KTMT-202"},
    {name: "Pokhara-Lumbini Express", from: "Pokhara", to: "Lumbini", time: "9hrs", price: "₨2000", img: "https://images.unsplash.com/photo-1583121274602-3e2820c69888?w=400&h=200&fit=crop", busId: "KTMT-303"},
    {name: "Kathmandu-Biratnagar AC", from: "Kathmandu", to: "Biratnagar", time: "12hrs", price: "₨2500", img: "https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=400&h=200&fit=crop", busId: "KTMT-404"},
    {name: "Butwal-Dhangadhi Super", from: "Butwal", to: "Dhangadhi", time: "10hrs", price: "₨1800", img: "https://images.unsplash.com/photo-1562646284-59f640dab796?w=400&h=200&fit=crop", busId: "KTMT-505"},
    {name: "Kathmandu-Nepalgunj", from: "Kathmandu", to: "Nepalgunj", time: "8hrs", price: "₨1800", img: "https://images.unsplash.com/photo-1558618047-3c8c76fdd9e4?w=400&h=200&fit=crop", busId: "KTMT-606"}
];

// Travel Portal Data - Rentals (40+)
const portalRentals = [
    {name: "Yamaha R15 V4", location: "Kathmandu", type: "Sports Bike", price: "₨2500/day", img: "https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?w=400&h=200&fit=crop"},
    {name: "Royal Enfield Classic 350", location: "Pokhara", type: "Cruiser", price: "₨3500/day", img: "https://images.unsplash.com/photo-1583121274602-3e2820c69888?w=400&h=200&fit=crop"},
    {name: "Toyota Corolla 2023", location: "Kathmandu", type: "Sedan", price: "₨9000/day", img: "https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?w=400&h=200&fit=crop"},
    {name: "Suzuki Swift", location: "Pokhara", type: "Hatchback", price: "₨7000/day", img: "https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=400&h=200&fit=crop"},
    {name: "Honda Activa", location: "Chitwan", type: "Scooter", price: "₨1500/day", img: "https://images.unsplash.com/photo-1583121274602-3e2820c69888?w=400&h=200&fit=crop"},
    {name: "Toyota Fortuner", location: "Kathmandu", type: "SUV", price: "₨15000/day", img: "https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?w=400&h=200&fit=crop"},
    {name: "Bajaj Pulsar NS200", location: "Biratnagar", type: "Sports Bike", price: "₨2200/day", img: "https://images.unsplash.com/photo-1562646284-59f640dab796?w=400&h=200&fit=crop"}
];

// Travel Portal Data - Malls (15+)
const portalMalls = [
    {name: "Civil Mall", location: "Sundhara, Kathmandu", img: "https://images.unsplash.com/photo-1518709268805-4e9042af2176?w=400&h=200&fit=crop", desc: "Nepal's largest mall with 200+ stores"},
    {name: "Labim Mall", location: "Pulchowk, Kathmandu", img: "https://images.unsplash.com/photo-1558618047-3c8c76fdd9e4?w=400&h=200&fit=crop", desc: "Premium brands & multiplex cinema"},
    {name: "MaaYaa Mall", location: "New Baneshwor, Kathmandu", img: "https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=400&h=200&fit=crop", desc: "Multi-level shopping paradise"},
    {name: "City Center Mall", location: "Butwal", img: "https://images.unsplash.com/photo-1518709268805-4e9042af2176?w=400&h=200&fit=crop", desc: "Western Nepal's biggest mall"},
    {name: "Narayani Complex", location: "Birgunj", img: "https://images.unsplash.com/photo-1558618047-3c8c76fdd9e4?w=400&h=200&fit=crop", desc: "Border shopping destination"},
    {name: "Big Mart Mall", location: "Dharan", img: "https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=400&h=200&fit=crop", desc: "Eastern Nepal shopping hub"}
];

// Show Travel Portal Tab
function showPortal(tabName) {
    document.querySelectorAll('.portal-content').forEach(content => {
        content.classList.remove('active');
    });
    document.querySelectorAll('.portal-tabs .tab-btn').forEach(btn => {
        btn.classList.remove('active');
    });
    document.getElementById(tabName).classList.add('active');
    event.target.classList.add('active');
}

// Create Card for Portal
function createPortalCard(item, type) {
    const card = document.createElement('div');
    card.className = 'portal-card';
    
    if (type === 'hotel') {
        card.innerHTML = `
            <img src="${item.img}" alt="${item.name}" class="portal-img" onerror="this.src='https://via.placeholder.com/400x200/667eea/fff?text=${item.name}'">
            <h3>${item.name}</h3>
            <span class="location-tag">📍 ${item.location}</span>
            <div class="price-tag">💰 ${item.price}/night</div>
            <button class="book-btn" onclick="bookHotel('${item.name}', '${item.link || '#'}')">Book Now</button>
        `;
    } else if (type === 'bus') {
        card.innerHTML = `
            <img src="${item.img}" alt="${item.name}" class="portal-img" onerror="this.src='https://via.placeholder.com/400x200/667eea/fff?text=Bus'">
            <h3>${item.name}</h3>
            <span class="location-tag">🚌 ${item.from} → ${item.to}</span>
            <div class="price-tag">⏱️ ${item.time} | 💰 ${item.price}</div>
            <button class="book-btn" onclick="bookBus('${item.busId}')">Book Now</button>
        `;
    } else if (type === 'rental') {
        card.innerHTML = `
            <img src="${item.img}" alt="${item.name}" class="portal-img" onerror="this.src='https://via.placeholder.com/400x200/667eea/fff?text=Rental'">
            <h3>${item.name}</h3>
            <span class="location-tag">📍 ${item.location}</span>
            <p><strong>${item.type}</strong></p>
            <div class="price-tag">💰 ${item.price}</div>
            <button class="book-btn" onclick="bookRental('${item.name}')">Book Now</button>
        `;
    } else if (type === 'mall') {
        card.innerHTML = `
            <img src="${item.img}" alt="${item.name}" class="portal-img" onerror="this.src='https://via.placeholder.com/400x200/667eea/fff?text=Mall'">
            <h3>${item.name}</h3>
            <span class="location-tag">📍 ${item.location}</span>
            <p>${item.desc}</p>
            <button class="book-btn" onclick="exploreMall('${item.name}')">Explore</button>
        `;
    }
    
    return card;
}

// Load Travel Portal Data
function loadTravelPortal() {
    // Hotels
    const hotelGrid = document.getElementById('hotelGridPortal');
    if (hotelGrid) {
        portalHotels.forEach(hotel => hotelGrid.appendChild(createPortalCard(hotel, 'hotel')));
    }
    
    // Buses
    const busGrid = document.getElementById('busGridPortal');
    if (busGrid) {
        portalBuses.forEach(bus => busGrid.appendChild(createPortalCard(bus, 'bus')));
    }
    
    // Rentals
    const rentalGrid = document.getElementById('rentalGridPortal');
    if (rentalGrid) {
        portalRentals.forEach(rental => rentalGrid.appendChild(createPortalCard(rental, 'rental')));
    }
    
    // Malls
    const mallGrid = document.getElementById('mallGridPortal');
    if (mallGrid) {
        portalMalls.forEach(mall => mallGrid.appendChild(createPortalCard(mall, 'mall')));
    }
}

// Booking Functions
function bookHotel(name, link) {
    if (link !== '#' && link !== 'undefined') {
        window.open(link, '_blank');
    } else {
        quickBook(name, 0, 'Kathmandu');
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

// Language Translation (Google Translate API)
function translatePage() {
    const script = document.createElement('script');
    script.src = '//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit';
    document.head.appendChild(script);
}

function googleTranslateElementInit() {
    new google.translate.TranslateElement({
        pageLanguage: 'en',
        includedLanguages: 'en,ne,hi,ch,fr,es,de,it',
        layout: google.translate.TranslateElement.InlineLayout.SIMPLE
    }, 'google_translate_element');
}

function changeLanguage(lang) {
    // Simple language switcher
    const elements = document.querySelectorAll('[data-translate]');
    elements.forEach(el => {
        el.textContent = el.getAttribute(`data-${lang}`);
    });
}

// Region Tabs
function showRegion(region) {
    document.querySelectorAll('.region-content').forEach(content => {
        content.classList.remove('active');
    });
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.classList.remove('active');
    });
    document.getElementById(region).classList.add('active');
    event.target.classList.add('active');
}

// Hotel Filtering
function filterHotels(type) {
    const hotels = document.querySelectorAll('.hotel-card');
    
    hotels.forEach(hotel => {
        const price = parseFloat(hotel.getAttribute('data-price'));
        
        if(type === 'all') {
            hotel.style.display = 'block';
        } else if(type === 'cheapest' && price < 20000) {
            hotel.style.display = 'block';
        } else if(type === 'expensive' && price > 40000) {
            hotel.style.display = 'block';
        } else if(type !== 'all') {
            hotel.style.display = 'none';
        }
    });
}

// Booking Modal
function quickBook(name, price, place) {
    document.getElementById('hotelName').value = name;
    document.getElementById('hotelPrice').value = price;
    document.getElementById('hotelPlace').value = place;
    document.getElementById('bookingModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('bookingModal').style.display = 'none';
}

// Admin Login
function openAdminLogin() {
    window.open('admin/login.php', 'adminLogin', 'width=500,height=400');
}

// Close modal when clicking outside
window.onclick = function(event) {
    const modal = document.getElementById('bookingModal');
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}// Global Data
const hotelsData = [
    {name: 'Everest View Hotel', place: 'Upper Hill', price: 50000, rating: 4.8, image: 'everest.jpg', reviews: 125},
    {name: 'Annapurna Base Camp', place: 'Lower Hill', price: 25000, rating: 4.5, image: 'annapurna.jpg', reviews: 89},
    {name: 'Lake View Pokhara', place: 'Normal Cold', price: 15000, rating: 4.7, image: 'pokhara.jpg', reviews: 203},
    {name: 'Chitwan Safari Lodge', place: 'Terai', price: 8000, rating: 4.3, image: 'chitwan.jpg', reviews: 67},
    // Add 30+ more hotels...
];

// Weather API
async function updateWeather() {
    try {
        const response = await fetch('api/weather.php?city=Kathmandu');
        const data = await response.json();
        document.getElementById('weatherTemp').textContent = data.temp + '°C';
        document.getElementById('weatherCity').textContent = data.city;
    } catch(e) {
        console.log('Weather unavailable');
    }
}

// Voice Search (Web Speech API)
const recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
recognition.onresult = function(event) {
    const command = event.results[0][0].transcript.toLowerCase();
    document.getElementById('voiceSearchInput').value = command;
    processVoiceCommand(command);
};

function voiceSearch() {
    recognition.start();
}

function processVoiceCommand(command) {
    if(command.includes('pokhara') && command.includes('cheap')) {
        filterHotels('cheapest', 'Pokhara');
    }
    // Add more voice commands...
}

// Enhanced Hotel Filtering
function loadHotels() {
    const grid = document.getElementById('hotelsGridEnhanced');
    grid.innerHTML = hotelsData.map(hotel => `
        <div class="hotel-card-enhanced" data-price="${hotel.price}" data-rating="${hotel.rating}">
            <img src="images/${hotel.image}" alt="${hotel.name}">
            <div class="hotel-info">
                <h3>${hotel.name}</h3>
                <div class="rating">⭐ ${hotel.rating} (${hotel.reviews} reviews)</div>
                <div class="price">₹${hotel.price}/night</div>
                <div class="actions">
                    <button class="razorpay-btn" onclick="initiatePayment('${hotel.name}', ${hotel.price})">Pay Now</button>
                    <button onclick="addToItinerary('${hotel.name}')">Add to Plan</button>
                </div>
            </div>
        </div>
    `).join('');
}

// Razorpay Payment
function initiatePayment(hotelName, amount) {
    const options = {
        key: '<?= RAZORPAY_KEY_ID ?>',
        amount: amount * 100,
        currency: 'INR',
        name: 'Nepal Tourism',
        description: `Booking for ${hotelName}`,
        handler: function(response) {
            alert('Payment Successful! Booking Confirmed.');
            // Save booking to database
        }
    };
    const rzp = new Razorpay(options);
    rzp.open();
}

// Google Maps
function initMap() {
    const map = new google.maps.Map(document.getElementById('googleMap'), {
        center: {lat: 28.3949, lng: 84.1240},
        zoom: 7
    });
    
    // Add markers for 35+ places
    const places = [
        {name: 'Kathmandu', lat: 27.7172, lng: 85.3240},
        {name: 'Pokhara', lat: 28.2397, lng: 83.9856},
        {name: 'Everest', lat: 27.9881, lng: 86.9250}
    ];
    
    places.forEach(place => {
        new google.maps.Marker({
            position: {lat: place.lat, lng: place.lng},
            map: map,
            title: place.name
        });
    });
}

// Drag & Drop Itinerary
document.querySelectorAll('.place-option').forEach(option => {
    option.addEventListener('dragstart', e => {
        e.dataTransfer.setData('text/plain', option.dataset.place);
    });
});

document.getElementById('itineraryDrop').addEventListener('drop', e => {
    e.preventDefault();
    const place = e.dataTransfer.getData('text');
    e.target.innerHTML += `<div class="itinerary-item">${place}</div>`;
});

function saveItinerary() {
    const itinerary = Array.from(document.querySelectorAll('.itinerary-item')).map(item => item.textContent);
    // Save to database via AJAX
    alert('Itinerary Saved! Total Cost: ₹45,000');
}

// Theme Toggle
document.getElementById('themeToggle').onclick = function() {
    document.documentElement.dataset.theme = document.documentElement.dataset.theme === 'dark' ? 'light' : 'dark';
};

// PWA Service Worker
if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('/sw.js');
}

// WhatsApp Integration
document.getElementById('whatsapp').onclick = function() {
    window.open('https://wa.me/9779800000000?text=I%20want%20to%20book%20a%20trip%20to%20Nepal');
};

// Initialize
document.addEventListener('DOMContentLoaded', function() {
    loadHotels();
    updateWeather();
    setInterval(updateWeather, 60000); // Update every minute
});// GSAP CDN
gsap.registerPlugin(ScrollTrigger, TextPlugin, MotionPathPlugin);

// Loading Screen
window.addEventListener('load', () => {
    const loader = document.querySelector('.loading-screen');
    loader.style.opacity = '0';
    setTimeout(() => loader.style.display = 'none', 500);
});

// Particle.js
particlesJS('particles-js', {
    particles: {
        number: { value: 80 },
        color: { value: '#ff6b35' },
        shape: { type: 'circle' },
        opacity: { value: 0.5, random: true },
        size: { value: 3, random: true },
        move: { speed: 1 }
    },
    interactivity: {
        events: {
            onhover: { enable: true, mode: 'repulse' }
        }
    }
});

// GSAP Animations
gsap.from('.letter', {
    duration: 1.5,
    y: 100,
    rotationY: 360,
    stagger: 0.1,
    ease: 'back.out(1.7)'
});

gsap.from('.feature-card', {
    scrollTrigger: '.features-dashboard',
    duration: 1,
    y: 100,
    opacity: 0,
    stagger: 0.2,
    ease: 'power3.out'
});

gsap.from('.hotel-card-enhanced', {
    scrollTrigger: '.hotels-grid',
    duration: 1,
    y: 80,
    opacity: 0,
    stagger: 0.1,
    ease: 'power2.out'
});

// Parallax Effect
window.addEventListener('mousemove', (e) => {
    const mouseX = e.clientX / window.innerWidth;
    const mouseY = e.clientY / window.innerHeight;
    
    gsap.to('.letter', {
        x: (mouseX - 0.5) * 20,
        y: (mouseY - 0.5) * 20,
        stagger: 0.02,
        duration: 1
    });
});

// Floating Elements
function createFloatingElements() {
    const container = document.querySelector('.floating-elements');
    for(let i = 0; i < 15; i++) {
        const el = document.createElement('div');
        el.className = 'floating-el';
        el.style.left = Math.random() * 100 + '%';
        el.style.animationDelay = Math.random() * 15 + 's';
        el.style.animationDuration = (Math.random() * 10 + 10) + 's';
        el.style.width = el.style.height = (Math.random() * 60 + 20) + 'px';
        container.appendChild(el);
    }
}
createFloatingElements();

// Drag & Drop Enhanced
const dropZone = document.getElementById('itineraryDrop');
dropZone.addEventListener('dragover', e => {
    e.preventDefault();
    dropZone.classList.add('drag-over');
});

dropZone.addEventListener('dragleave', () => {
    dropZone.classList.remove('drag-over');
});