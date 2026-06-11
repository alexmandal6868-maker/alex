# Nepal Tourism Website - Complete File Connections & Architecture

## 📊 System Architecture Diagram

```
┌─────────────────────────────────────────────────────────────┐
│                    USER BROWSER / CLIENT                     │
└────────────────────────┬────────────────────────────────────┘
                         │
        ┌────────────────┼────────────────┐
        │                │                │
    ┌───▼────┐      ┌───▼────┐      ┌───▼────┐
    │ Pages  │      │ Assets │      │Scripts │
    └────────┘      └────────┘      └────────┘
        │                │                │
   ┌────┴────────┐      │         ┌──────┴──────┐
   │             │      │         │             │
index.php     tour.php  │     script.js      chatbot.js
park.php    aichatbook  style.css
             .php
             404.php

        │
        └──────────────────────┬──────────────────────┐
                              │                      │
                         ┌────▼──────┐         ┌────▼──────┐
                         │ PHP PAGES │         │ DATABASE  │
                         └────┬──────┘         └────▬──────┘
                              │                      │
              ┌───────────────┼───────────────┐      │
              │               │               │      │
          ┌───▼───┐      ┌───▼────┐     ┌───▼──┐   │
          │config │      │router  │     │login │   │
          └───┬───┘      └────────┘     └──────┘   │
              │                                     │
        ┌─────┴──────────┬──────────────┐           │
        │                │              │           │
   ┌────▼────┐   ┌──────▼────┐  ┌─────▼──┐        │
   │dashboard│   │user_dash  │  │profile │        │
   └────┬────┘   └───────────┘  └────────┘        │
        │                                           │
        └───────────────────┬───────────────────────┘
                            │
                    ┌───────▼────────┐
                    │   MySQL DB     │
                    │ ├─ hotels      │
                    │ ├─ bookings    │
                    │ └─ users       │
                    └────────────────┘
```

---

## 🔗 File Dependencies & Connections

### **Entry Points (First Page Load)**

#### 1. **index.php** (Homepage)
```
index.php
├── INCLUDES:
│   ├── config.php (database setup)
│   ├── header.php (navigation)
│   └── footer.php (footer)
├── REQUIRES:
│   ├── style.css (styling)
│   ├── script.js (animations & functionality)
│   └── particles.js (CDN)
├── LOADS DATA FROM:
│   ├── Database: hotels table
│   └── Unsplash API: 20+ images
└── GENERATES:
    ├── Hotel cards grid
    ├── Festival showcase
    ├── Region tabs
    └── Travel portal
```

#### 2. **tour.php** (Travel Portal)
```
tour.php
├── REQUIRES:
│   ├── style.css
│   └── Script (embedded HTML/JS)
├── DISPLAYS:
│   ├── 🏨 50+ Hotels
│   ├── 🚌 30+ Buses
│   ├── 🚗 40+ Rentals
│   └── 🛍️ 15+ Malls
└── INTEGRATIONS:
    ├── Google Maps
    ├── Live tracking
    └── Real Unsplash images
```

#### 3. **aichatbook.php** (Lakes Explorer)
```
aichatbook.php
├── REQUIRES:
│   └── style.css
├── DISPLAYS:
│   ├── 15+ Lakes with real images
│   ├── Filter system (type, budget)
│   └── Search functionality
└── DATA:
    └── Hardcoded lake database in JS
```

#### 4. **park.php** (Parks & Rivers)
```
park.php
├── REQUIRES:
│   └── style.css
├── DISPLAYS:
│   ├── 20+ National Parks
│   ├── 20+ Rivers
│   ├── Hotels
│   ├── Buses
│   ├── Rentals
│   └── Malls
└── FEATURES:
    ├── Search
    ├── Interactive map
    └── Live tracking
```

---

### **Authentication & Admin**

#### 5. **login.php** (Admin Login)
```
login.php
├── SESSION START
├── CSRF TOKEN GENERATION
├── INCLUDES: config.php
├── VALIDATION:
│   ├── Username: "admin"
│   ├── Password: "nepal123"
│   ├── CSRF token verification
│   └── Password hashing
└── ON SUCCESS:
    └── Redirect to dashboard.php
```

#### 6. **dashboard.php** (Admin Dashboard)
```
dashboard.php
├── SESSION CHECK: Requires $_SESSION['admin']
├── INCLUDES: config.php
├── REQUIRES: style.css
├── DATABASE QUERIES:
│   ├── COUNT(*) FROM bookings
│   ├── SUM(amount) FROM bookings
│   └── SELECT * FROM bookings LIMIT 20
├── DISPLAYS:
│   ├── Total bookings
│   ├── Revenue stats
│   └── Recent bookings table
└── ACTIONS:
    ├── Confirm booking
    ├── Cancel booking
    └── Logout
```

---

### **User Management**

#### 7. **user_dashboard.php** (User Bookings)
```
user_dashboard.php
├── LOCATION: /user/ subdirectory
├── SESSION CHECK: Requires $_SESSION['user_id']
├── INCLUDES: ../config.php
├── DATABASE QUERIES:
│   ├── COUNT(*) FROM bookings WHERE user_id = ?
│   ├── SUM(amount) FROM bookings WHERE user_id = ?
│   └── SELECT * FROM bookings WHERE user_id = ?
├── DISPLAYS:
│   ├── Total bookings
│   ├── Total spent
│   ├── Bookings table
│   └── Quick action buttons
└── LINKS TO:
    ├── index.php (home)
    ├── user_profile.php (profile)
    └── tour.php (find hotels)
    └── park.php (national parks)
    └── aichatbook.php (lakes)
```

#### 8. **user_profile.php** (Profile Management)
```
user_profile.php
├── LOCATION: /user/ subdirectory
├── SESSION CHECK: Requires $_SESSION['user_id']
├── INCLUDES: ../config.php
├── FORM FIELDS:
│   ├── Username
│   ├── Email
│   ├── New password
│   └── Confirm password
├── VALIDATION:
│   ├── Email format check
│   ├── Password length (min 6)
│   └── Password match check
└── ON UPDATE:
    └── UPDATE users SET username, email, password WHERE id
```

---

### **Core System Files**

#### 9. **config.php** (Database & Setup)
```
config.php (THE HEART OF THE SYSTEM)
├── DATABASE CONNECTION
│   ├── Host: localhost
│   ├── Username: root
│   ├── Password: (empty)
│   └── Database: nepal_tourism
├── AUTO-CREATE TABLES:
│   ├── hotels (id, name, place, price, link, image)
│   ├── bookings (id, user_name, place, hotel, date, amount, status)
│   └── users (id, username, password, email, role)
├── SAMPLE DATA INSERTION
│   └── 4 sample hotels if table is empty
├── SECURITY FUNCTIONS:
│   ├── sanitizeInput()
│   ├── isAdmin()
│   └── checkSessionTimeout()
└── ERROR HANDLING:
    ├── E_ALL error reporting
    ├── Try/catch for PDO exceptions
    └── Demo mode fallback
```

#### 10. **router.php** (Central Routing)
```
router.php
├── SESSION START
├── INCLUDES: config.php
├── PAGE MAPPING:
│   ├── 'home' → index.php
│   ├── 'tour' → tour.php
│   ├── 'lakes' → aichatbook.php
│   ├── 'parks' → park.php
│   ├── 'login' → login.php
│   ├── 'dashboard' → dashboard.php
│   ├── 'user' → user_dashboard.php
│   └── 'profile' → user_profile.php
├── INCLUDES: header.php
├── LOADS: Appropriate page based on URL ?page=
└── INCLUDES: footer.php
```

---

### **Layout Components**

#### 11. **header.php** (Navigation)
```
header.php
├── NAVBAR STRUCTURE
│   ├── Logo: Nepal Tourism
│   ├── Nav Links
│   ├── User Session Check
│   └── Theme Toggle
├── CONDITIONAL DISPLAY:
│   ├── IF logged in:
│   │   ├── Dashboard link
│   │   └── Profile link
│   └── IF NOT logged in:
│       └── Login button
└── STYLING: Integrated in style.css
```

#### 12. **footer.php** (Footer)
```
footer.php
├── SECTIONS:
│   ├── About Nepal Tourism
│   ├── Quick Links:
│   │   ├── Home → index.php
│   │   ├── Hotels → tour.php
│   │   ├── Parks → park.php
│   │   └── Lakes → aichatbook.php
│   ├── Contact Info
│   └── Newsletter signup
├── STYLING: Premium gradient
└── SOCIAL LINKS: Facebook, Instagram, Twitter, YouTube
```

---

### **Styling & Scripts**

#### 13. **style.css** (Main Stylesheet - 800+ lines)
```
style.css
├── BASE STYLES
│   ├── * { margin, padding, box-sizing }
│   └── body { font-family, colors, overflow }
├── COMPONENT STYLES
│   ├── .nepal-letters { 3D animations }
│   ├── .letter { Float animations }
│   ├── .card { Hover effects }
│   └── .modal { Booking modals }
├── ANIMATIONS (@keyframes)
│   ├── float
│   ├── letterPulse
│   ├── floatShape
│   ├── bounceDown
│   └── slideIn
├── RESPONSIVE DESIGN
│   └── @media (max-width: 768px)
└── CSS VARIABLES
    ├── --primary-gradient
    ├── --secondary-gradient
    ├── --glass-bg
    └── --shadow-glow
```

#### 14. **script.js** (Main JavaScript - 22+ KB)
```
script.js
├── INITIALIZATION
│   ├── DOMContentLoaded events
│   ├── Extra letters animation
│   └── Floating shapes
├── TRAVEL PORTAL DATA
│   ├── portalHotels[] (12+ hotels)
│   ├── portalBuses[] (6+ buses)
│   ├── portalRentals[] (7+ rentals)
│   └── portalMalls[] (6+ malls)
├── FUNCTIONS
│   ├── showTab(tabName)
│   ├── createPortalCard(item, type)
│   ├── loadTravelPortal()
│   ├── filterHotels(type)
│   ├── quickBook()
│   ├── closeModal()
│   └── openAdminLogin()
├── GSAP ANIMATIONS
│   ├── letter animations
│   ├── feature cards
│   ├── hotel cards
│   └── parallax effects
├── EVENT LISTENERS
│   └── Modal close on outside click
└── GOOGLE TRANSLATE API
```

#### 15. **chatbot.js** (Chatbot - 1.2 KB)
```
chatbot.js
├── toggleChatbot()
├── sendMessage()
├── addMessage(sender, text)
├── AI RESPONSES
│   ├── If "pokhara" → hotel suggestion
│   ├── If "booking" → booking help
│   └── Default → general help
└── DISPLAYS: Scrollable message thread
```

---

### **Utilities**

#### 16. **generate_images.php** (Image Generator)
```
generate_images.php
├── PURPOSE: Generate placeholder images
├── CREATES: Nepal letters backgrounds
├── COLOR MAPPING:
│   ├── N → Purple/Blue
│   ├── E → Pink/Red
│   ├── P → Blue/Cyan
│   ├── A → Pink/Yellow
│   └── L → Dark
├── OUTPUT: /images/ directory
└── DIMENSIONS: 800x800 JPEG
```

#### 17. **image_generator.php** (Dynamic Images)
```
image_generator.php
├── QUERY PARAMETERS:
│   ├── ?name=nepal1
│   └── ?size=800
├── RETURNS: JPEG image
├── COLORS: Based on query name
├── GRADIENT: Custom for each image type
└── WATERMARK: "NEPAL TOURISM"
```

#### 18. **simple_test.php** (Database Test)
```
simple_test.php
├── CONNECTION TEST
├── DATABASE CREATION
├── TABLE LISTING
├── ERROR REPORTING
└── SUCCESS/FAIL MESSAGE
```

#### 19. **wheather.php** (Weather API - TYPO: weather.php)
```
wheather.php
├── QUERY PARAMETER:
│   └── ?city=Kathmandu
├── DATA ARRAY:
│   ├── Kathmandu: 24°C, Sunny
│   ├── Pokhara: 26°C, Cloudy
│   └── Everest: 5°C, Snowy
├── RETURNS: JSON
│   {
│     "temp": 24,
│     "city": "Kathmandu",
│     "condition": "Sunny"
│   }
└── USAGE: Called by script.js updateWeather()
```

---

### **Error Handling**

#### 20. **404.php** (Error Page)
```
404.php
├── STATUS: 404 Page Not Found
├── STYLING: Premium gradient background
├── MESSAGE: "Page Not Found"
├── NAVIGATION BUTTONS:
│   ├── 🏠 Home → index.php
│   ├── 🏨 Hotels → tour.php
│   ├── 🌳 Parks → park.php
│   └── 🏞️ Lakes → aichatbook.php
└── RESPONSIVENESS: Mobile-friendly
```

---

### **Documentation**

#### 21. **README.md** (Project Info)
```
README.md
├── Title: alex
├── Description: hello this is my first time
└── Links: Commit history
```

#### 22. **TODO.md** (Project Status)
```
TODO.md
├── PROJECT STATUS: FULLY FUNCTIONAL
├── COMPLETED FEATURES ✅
│   ├── Phase 1: File fixes
│   ├── Phase 2: Path issues
│   ├── Phase 3: Link fixes
│   └── Phase 4: Files complete
├── WORKING FILES ✅ (15+ pages)
├── NEEDS RENAMING 🔧 (park .php)
├── MISSING FILES ❌ (dash board alternate)
└── QUICK FIXES REFERENCE
```

---

### **Static Files**

#### 23. **index.html** (Static Fallback)
```
index.html (DEPRECATED - Use index.php)
├── Basic HTML structure
├── Language selector
├── Navigation menu
└── Destination cards
```

---

## 📋 Database Relationships

```sql
┌─────────────────────────────────────────────────────────────┐
│                      MYSQL DATABASE                         │
│                   nepal_tourism                             │
├─────────────────────────────────────────────────────────────┤
│                                                               │
│  ┌──────────────────────┐  ┌──────────────────────┐         │
│  │     HOTELS           │  │     BOOKINGS         │         │
│  ├──────────────────────┤  ├──────────────────────┤         │
│  │ id (PK)              │  │ id (PK)              │         │
│  │ name                 │  │ user_name            │         │
│  │ place                │  │ place                │         │
│  │ price                │  │ hotel (FK to hotels) │         │
│  │ link                 │  │ date                 │         │
│  │ image                │  │ amount               │         │
│  │ created_at           │  │ status (enum)        │         │
│  │                      │  │ created_at           │         │
│  └──────────────────────┘  └──────────────────────┘         │
│                                                               │
│  ┌──────────────────────────────────┐                        │
│  │          USERS                   │                        │
│  ├──────────────────────────────────┤                        │
│  │ id (PK)                          │                        │
│  │ username (UNIQUE)                │                        │
│  │ password (hashed)                │                        │
│  │ email                            │                        │
│  │ role (enum: user/admin)          │                        │
│  │ created_at                       │                        │
│  └──────────────────────────────────┘                        │
│                                                               │
└─────────────────────────────────────────────────────────────┘
```

---

## 🔄 Data Flow Examples

### **Hotel Booking Flow**
```
1. User visits index.php
   ↓
2. Script loads hotel data via SQL/DB
   ↓
3. jQuery/JS creates hotel cards
   ↓
4. User clicks "Quick Book"
   ↓
5. quickBook() modal opens
   ↓
6. Form submission to index.php POST
   ↓
7. config.php INSERT into bookings
   ↓
8. Confirmation alert shown
```

### **Admin View Flow**
```
1. User clicks "Admin Login"
   ↓
2. login.php popup opens
   ↓
3. Form submission validates credentials
   ↓
4. Password verified against hashed "nepal123"
   ↓
5. SESSION['admin'] = true set
   ↓
6. Redirect to dashboard.php
   ↓
7. dashboard.php queries booking stats
   ↓
8. Admin sees real-time data
```

---

## ⚠️ Current Issues & Fixes Needed

### **Priority 1 (HIGH)**
1. **Path Issues**: `user_dashboard.php` uses `../config.php` (only works if in subdirectory)
2. **Typo File**: `dasnboard.php` - duplicate dashboard (DELETE or rename)

### **Priority 2 (MEDIUM)**
1. **Directory Structure**: Files should be organized into subdirectories
2. **Typo**: `wheather.php` → should be `weather.php`

### **Priority 3 (LOW)**
1. **Deprecated**: `index.html` can be removed (use index.php)
2. **API Consolidation**: Combine `generate_images.php` and `image_generator.php`

---

## 📂 Recommended Directory Structure

```
/alex
├── index.php (router or homepage)
├── config.php
├── 404.php
│
├── /admin
│   ├── login.php
│   └── dashboard.php
│
├── /user
│   ├── dashboard.php (user_dashboard.php)
│   └── profile.php (user_profile.php)
│
├── /pages
│   ├── tour.php
│   ├── park.php
│   ├── aichatbook.php
│   └── header.php
│   └── footer.php
│
├── /assets
│   ├── style.css
│   ├── script.js
│   └── chatbot.js
│
├── /utilities
│   ├── generate_images.php
│   ├── image_generator.php
│   ├── weather.php
│   └── simple_test.php
│
├── /docs
│   ├── README.md
│   ├── TODO.md
│   └── manifest.json
│
└── /images (auto-generated)
```

---

## ✅ Quick Start Guide

1. **Start XAMPP** (Apache + MySQL)
2. **Place repo** in `htdocs/alex/`
3. **Access**: `http://localhost/alex/`
4. **Database**: Auto-creates on first load (config.php)
5. **Admin**: Username: `admin` | Password: `nepal123`

---

Generated: 2026-06-11
Last Updated: Complete file connection mapping
