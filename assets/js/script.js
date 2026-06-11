// Nepal Tourism Website - Main JavaScript
// Animations and interactive features

document.addEventListener('DOMContentLoaded', function() {
    initializeAnimations();
    setupEventListeners();
});

function initializeAnimations() {
    // Letter animations
    const letters = document.querySelectorAll('.letter');
    letters.forEach((letter, index) => {
        letter.style.animationDelay = (index * 0.1) + 's';
    });
}

function setupEventListeners() {
    // Search functionality
    const searchBtn = document.querySelector('.search-btn');
    if(searchBtn) {
        searchBtn.addEventListener('click', () => {
            alert('🔍 Search functionality active');
        });
    }
}

function closeModal() {
    const modal = document.getElementById('bookingModal');
    if(modal) modal.style.display = 'none';
}

function openAdminLogin() {
    window.open('admin/login.php', 'admin', 'width=600,height=400');
}

function filterHotels(type) {
    alert('Filtering hotels by: ' + type);
}

function quickBook(hotelName) {
    alert('🏨 Booking ' + hotelName);
}

function showTab(tabName) {
    const sections = document.querySelectorAll('.content-section');
    sections.forEach(s => s.classList.remove('active'));
    const activeSection = document.getElementById(tabName);
    if(activeSection) activeSection.classList.add('active');
}

// Smooth scroll
window.addEventListener('scroll', function() {
    const header = document.querySelector('.hero-header');
    if(header && window.scrollY > 100) {
        header.style.opacity = 0.8;
    }
});
