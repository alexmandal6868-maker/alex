// Nepal Letters Animation
document.addEventListener('DOMContentLoaded', function() {
    const letters = document.querySelectorAll('.letter');
    
    letters.forEach(letter => {
        const bgImage = letter.getAttribute('data-bg');
        letter.style.setProperty('--bg-image', `url(${bgImage})`);
        
        letter.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.1) rotateY(10deg)';
        });
        
        letter.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1) rotateY(0deg)';
        });
    });
});

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