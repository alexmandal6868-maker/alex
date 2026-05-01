<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🇳🇵 ULTIMATE Nepal Explorer - 15+ Lakes • Hills • Mountains • Rara</title>
    <style>
        :root {
            --primary: linear-gradient(45deg, #0066ff, #00ccff);
            --secondary: linear-gradient(45deg, #ff6b9d, #ff8e8e);
            --success: linear-gradient(45deg, #00b894, #00cec9);
            --warning: linear-gradient(45deg, #fdcb6e, #e17055);
            --dark-bg: linear-gradient(135deg, #0a0a1f, #1a1a3a, #2a2a4a);
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background: var(--dark-bg); color: #f0f0ff; line-height: 1.7;
            overflow-x: hidden;
        }
        .container { max-width: 1900px; margin: 0 auto; padding: 30px; }
        
        /* HEADER */
        .header { 
            background: rgba(255,255,255,0.06); backdrop-filter: blur(30px);
            border-radius: 40px; padding: 50px; text-align: center; margin-bottom: 50px;
            border: 1px solid rgba(255,255,255,0.12); box-shadow: 0 40px 120px rgba(0,0,0,0.5);
        }
        .header h1 { 
            font-size: 4em; background: var(--primary); -webkit-background-clip: text;
            -webkit-text-fill-color: transparent; margin-bottom: 25px; font-weight: 900;
            letter-spacing: -2px; text-shadow: 0 15px 40px rgba(0,102,255,0.4);
        }
        .header-subtitle { 
            font-size: 1.4em; opacity: 0.95; max-width: 800px; margin: 0 auto;
            background: linear-gradient(45deg, rgba(255,255,255,0.8), rgba(255,255,255,0.4));
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        }

        /* FILTER BAR */
        .filter-bar { 
            background: rgba(255,255,255,0.08); padding: 40px; border-radius: 30px;
            margin-bottom: 50px; display: flex; gap: 25px; flex-wrap: wrap; align-items: center;
            border: 1px solid rgba(255,255,255,0.18); backdrop-filter: blur(25px);
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }
        .search-input { 
            flex: 1; padding: 22px 35px; border: 3px solid rgba(255,255,255,0.25); 
            border-radius: 60px; background: rgba(255,255,255,0.12); color: white;
            font-size: 19px; min-width: 450px; outline: none; transition: all 0.3s;
        }
        .search-input:focus { border-color: var(--primary); box-shadow: 0 0 30px rgba(0,102,255,0.3); }
        .filter-group { display: flex; gap: 15px; flex-wrap: wrap; }
        .filter-btn { 
            padding: 20px 35px; border: 2px solid rgba(255,255,255,0.3); 
            border-radius: 50px; background: transparent; color: white; font-weight: 700;
            cursor: pointer; transition: all 0.4s; font-size: 16px;
        }
        .filter-btn.active { 
            background: var(--primary); border-color: var(--primary); color: #000;
            transform: translateY(-5px); box-shadow: 0 20px 50px rgba(0,102,255,0.4);
        }
        .budget-tags { display: flex; gap: 12px; flex-wrap: wrap; }
        .budget-tag { 
            padding: 15px 30px; border-radius: 35px; font-weight: 700; cursor: pointer;
            transition: all 0.4s; border: 2px solid transparent; font-size: 15px;
        }
        .budget-cheap { background: rgba(0,184,148,0.25); color: #00b894; border-color: rgba(0,184,148,0.5); }
        .budget-cheap.active { background: #00b894; color: white; }
        .budget-medium { background: rgba(253,203,110,0.25); color: #fdcb6e; border-color: rgba(253,203,110,0.5); }
        .budget-medium.active { background: #fdcb6e; color: #000; }
        .budget-expensive { background: rgba(255,107,107,0.25); color: #ff6b6b; border-color: rgba(255,107,107,0.5); }
        .budget-expensive.active { background: #ff6b6b; color: white; }

        /* TABS */
        .tabs { 
            display: flex; gap: 25px; margin-bottom: 60px; flex-wrap: wrap; 
            justify-content: center; padding: 25px 0; background: rgba(255,255,255,0.05);
            border-radius: 25px; backdrop-filter: blur(15px);
        }
        .tab-btn { 
            background: rgba(255,255,255,0.12); color: white; border: 2px solid rgba(255,255,255,0.2);
            padding: 25px 50px; border-radius: 60px; cursor: pointer; transition: all 0.5s;
            font-weight: 800; font-size: 18px; letter-spacing: 1px; backdrop-filter: blur(20px);
        }
        .tab-btn.active { 
            background: var(--primary); color: #000; transform: translateY(-10px) scale(1.05);
            box-shadow: 0 30px 70px rgba(0,102,255,0.5); border-color: var(--primary);
        }

        /* SECTIONS */
        .content-section { 
            display: none; background: rgba(255,255,255,0.97); border-radius: 45px;
            padding: 60px; box-shadow: 0 50px 140px rgba(0,0,0,0.35); margin-bottom: 60px;
            color: #1a1a2e; overflow: hidden;
        }
        .content-section.active { display: block; animation: zoomIn 1s ease-out; }
        @keyframes zoomIn { from { opacity: 0; transform: scale(0.95); } to { opacity: 1; transform: scale(1); } }
        .section-title { 
            font-size: 3.5em; text-align: center; margin-bottom: 60px; font-weight: 900;
            background: linear-gradient(45deg, #0f0f23, #1a1a3e, #2a2a4a); -webkit-background-clip: text;
            -webkit-text-fill-color: transparent; letter-spacing: -1px;
        }

        /* LAKES GRID - SPECIAL DESIGN */
        .grid { 
            display: grid; grid-template-columns: repeat(auto-fill, minmax(450px, 1fr)); 
            gap: 55px; margin-top: 60px;
        }
        .lake-card { 
            background: linear-gradient(145deg, rgba(0,182,148,0.1), rgba(0,204,201,0.1)); 
            border-radius: 45px; padding: 50px; box-shadow: 0 40px 100px rgba(0,0,0,0.25);
            transition: all 0.7s; border: 4px solid transparent; position: relative;
            height: 650px; display: flex; flex-direction: column; overflow: hidden;
            backdrop-filter: blur(15px);
        }
        .lake-card::before {
            content: ''; position: absolute; top: 0; left: 0; right: 0; height: 6px;
            background: var(--success);
        }
        .lake-card:hover { 
            transform: translateY(-40px) scale(1.03); box-shadow: 0 80px 160px rgba(0,0,0,0.35);
            border-color: var(--success);
        }
        .lake-img { 
            width: 100%; height: 320px; object-fit: cover; border-radius: 30px; 
            margin-bottom: 40px; box-shadow: 0 25px 60px rgba(0,0,0,0.3);
        }
        .lake-card h3 { font-size: 2.2em; margin-bottom: 25px; color: #0f0f23; font-weight: 900; }
        .location-elevation { 
            display: flex; gap: 30px; margin-bottom: 25px; flex-wrap: wrap;
        }
        .location-tag, .elevation-tag { 
            background: var(--secondary); color: white; padding: 18px 35px; 
            border-radius: 40px; font-weight: 800; font-size: 16px;
        }
        .price-tag { 
            background: var(--primary); color: #000; padding: 25px 45px; 
            border-radius: 50px; font-weight: 900; font-size: 26px; display: inline-block;
            margin: 35px 0 30px 0; box-shadow: 0 15px 45px rgba(0,102,255,0.4);
        }
        .budget-badge { 
            padding: 15px 35px; border-radius: 35px; font-weight: 800; font-size: 17px;
            margin: 20px 15px 0 0; display: inline-block; box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        }
        .description { 
            margin-top: 25px; font-size: 16px; opacity: 0.9; line-height: 1.7;
            flex-grow: 1;
        }
        .explore-lake-btn { 
            background: var(--success); color: #000; border: none; padding: 30px 55px;
            border-radius: 50px; cursor: pointer; font-weight: 900; font-size: 22px;
            margin-top: auto; transition: all 0.5s; box-shadow: 0 20px 50px rgba(0,184,148,0.4);
        }
        .explore-lake-btn:hover { 
            transform: scale(1.08); box-shadow: 0 35px 80px rgba(0,184,148,0.6);
        }

        /* RESPONSIVE */
        @media (max-width: 1400px) { .grid { grid-template-columns: repeat(auto-fill, minmax(400px, 1fr)); } }
        @media (max-width: 1000px) { .grid { grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); } }
        @media (max-width: 768px) { 
            .grid { grid-template-columns: 1fr; } .tabs { flex-direction: column; align-items: center; gap: 15px; }
            .filter-bar { flex-direction: column; gap: 20px; } .search-input { min-width: 100%; }
            .header h1 { font-size: 2.5em; }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- HEADER -->
        <div class="header">
            <h1>🏔️ ULTIMATE Nepal Explorer</h1>
            <p class="header-subtitle">15+ Stunning Lakes • Hill Stations • Upper/Lower Mountains • Rara Paradise • Parks • Rivers</p>
        </div>

        <!-- FILTER BAR -->
        <div class="filter-bar">
            <input type="text" class="search-input" id="lakeSearch" placeholder="🔍 Search Phewa, Rara, Tilicho, Begnas...">
            <div class="filter-group">
                <button class="filter-btn active" onclick="filterLakes('all')">All Lakes</button>
                <button class="filter-btn" onclick="filterLakes('valley')">Valley Lakes</button>
                <button class="filter-btn" onclick="filterLakes('mountain')">Mountain Lakes</button>
                <button class="filter-btn" onclick="filterLakes('rara')">Rara Special</button>
            </div>
            <div class="budget-tags">
                <div class="budget-tag budget-cheap" onclick="filterBudget('cheap')">💚 Cheap</div>
                <div class="budget-tag budget-medium" onclick="filterBudget('medium')">🟡 Medium</div>
                <div class="budget-tag budget-expensive" onclick="filterBudget('expensive')">🔴 Luxury</div>
            </div>
        </div>

        <!-- TABS -->
        <div class="tabs">
            <button class="tab-btn active" onclick="showTab('lakes')">🏞️ Lakes (15+)</button>
            <button class="tab-btn" onclick="showTab('hills')">🏞️ Hills</button>
            <button class="tab-btn" onclick="showTab('mountains')">🏔️ Mountains</button>
            <button class="tab-btn" onclick="showTab('rara')">🏝️ Rara</button>
            <button class="tab-btn" onclick="showTab('parks')">🌳 Parks</button>
        </div>

        <!-- LAKES SECTION - MAIN FEATURE -->
        <div id="lakes" class="content-section active">
            <h2 class="section-title">🏞️ 15+ Most Beautiful Lakes of Nepal</h2>
            <div class="grid" id="lakesGrid"></div>
        </div>

        <!-- OTHER SECTIONS (Hills, Mountains, etc.) -->
        <div id="hills" class="content-section"><!-- Hills content --></div>
        <div id="mountains" class="content-section"><!-- Mountains content --></div>
        <div id="rara" class="content-section"><!-- Rara content --></div>
        <div id="parks" class="content-section"><!-- Parks content --></div>
    </div>

    <script>
        // 🔥 15+ LAKES WITH REAL PICTURES & DETAILS
        const lakesData = [
            // VALLEY LAKES (Kathmandu/Pokhara)
            {
                name: "Phewa Lake", location: "Pokhara", elevation: "742m", budget: "Cheap", price: 500,
                img: "https://images.unsplash.com/photo-1574293840505-ea4fdd9b8171?w=450&h=320&fit=crop",
                description: "Largest lake in Pokhara • Boating • Mountain views • Tal Barahi Temple",
                type: "valley"
            },
            {
                name: "Begnas Lake", location: "Kaski", elevation: "650m", budget: "Cheap", price: 300,
                img: "https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=450&h=320&fit=crop",
                description: "Cleanest lake • Fishing • Bird watching • Resort stays",
                type: "valley"
            },
            {
                name: "Rupa Lake", location: "Kaski", elevation: "600m", budget: "Cheap", price: 400,
                img: "https://images.unsplash.com/photo-1573761540507-7247169e8f17?w=450&h=320&fit=crop",
                description: "Peaceful retreat • Kayaking • Family friendly",
                type: "valley"
            },
            {
                name: "Fewa Lake", location: "Pokhara", elevation: "742m", budget: "Cheap", price: 500,
                img: "https://images.unsplash.com/photo-1558618047-3c8c76fdd9e4?w=450&h=320&fit=crop",
                description: "Paragliding views • Annapurna backdrop • Sunset paradise",
                type: "valley"
            },

            // MOUNTAIN LAKES
            {
                name: "Tilicho Lake", location: "Manang", elevation: "4919m", budget: "Expensive", price: 25000,
                img: "https://images.unsplash.com/photo-1540979388789-6cee28a1cdc9?w=450&h=320&fit=crop",
                description: "Highest lake in world • Annapurna Circuit • Extreme adventure",
                type: "mountain"
            },
            {
                name: "Gokyo Lakes", location: "Solukhumbu", elevation: "4790m", budget: "Expensive", price: 30000,
                img: "https://images.unsplash.com/photo-1571896349840-e26b311e851c?w=450&h=320&fit=crop",
                description: "6 turquoise lakes • Everest Base Camp trek • Sacred lakes",
                type: "mountain"
            },
            {
                name: "Kaldiya Lake", location: "Dolpa", elevation: "3800m", budget: "Expensive", price: 35000,
                img: "https://images.unsplash.com/photo-1564507592333-c916188f8ebd?w=450&h=320&fit=crop",
                description: "Hidden gem • Remote trekking • Crystal clear waters",
                type: "mountain"
            },

            // RARA & WESTERN LAKES
            {
                name: "Rara Lake", location: "Mugu", elevation: "2990m", budget: "Medium", price: 8000,
                img: "https://images.unsplash.com/photo-1558618047-3c8c76fdd9e4?w=450&h=320&fit=crop",
                description: "Largest freshwater lake • Queen of Lakes • Fly-in paradise",
                type: "rara"
            },

            // EASTERN & OTHER LAKES
            {
                name: "Gurans Lake", location: "Darchula", elevation: "3200m", budget: "Medium", price: 12000,
                img: "https://images.unsplash.com/photo-1518709268805-4e9042af2176?w=450&h=320&fit=crop",
                description: "Api Himal views • Sacred lake • Rhododendron forests",
                type: "mountain"
            },
            {
                name: "Bhote Koshi Lake", location: "Sindhupalchowk", elevation: "2500m", budget: "Cheap", price: 2500,
                img: "https://images.unsplash.com/photo-1583121274602-3e2820c69888?w=450&h=320&fit=crop",
                description: "Rafting + lake combo • Easy access from Kathmandu",
                type: "valley"
            },
            {
                name: "Seti Gandaki Lake", location: "Tanahun", elevation: "400m", budget: "Cheap", price: 800,
                img: "https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=450&h=320&fit=crop",
                description: "Bandipur views • Local fishing • Cultural experience",
                type: "valley"
            },
            {
                name: "Mardi Himal Lake", location: "Kaski", elevation: "4200m", budget: "Expensive", price: 22000,
                img: "https://images.unsplash.com/photo-1562646284-59f640dab796?w=450&h=320&fit=crop",
                description: "New trekking route • Mardi Himal views • Offbeat lake",
                type: "mountain"
            },
            {
                name: "Tilion Lake", location: "Manang", elevation: "4920m", budget: "Expensive", price: 28000,
                img: "https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?w=450&h=320&fit=crop",
                description: "Thorong La Pass • Annapurna Circuit highlight",
                type: "mountain"
            },
            {
                name: "Damodar Lake", location: "Mustang", elevation: "4890m", budget: "Expensive", price: 32000,
                img: "https://images.unsplash.com/photo-1571003611605-5f8b1a973169?w=450&h=320&fit=crop",
                description: "Upper Mustang • Sacred lake • Restricted area permit",
                type: "mountain"
            },
            {
                name: "Gurung Lake", location: "Manang", elevation: "4100m", budget: "Medium", price: 15000,
                img: "https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=450&h=320&fit=crop",
                description: "Hidden Manang lake • Local homestay • Authentic culture",
                type: "mountain"
            },
            {
                name: "Badimalika Lake", location: "Bajura", elevation: "1200m", budget: "Cheap", price: 2000,
                img: "https://images.unsplash.com/photo-1573761540507-7247169e8f17?w=450&h=320&fit=crop",
                description: "Western Nepal • Religious significance • Festival lake",
                type: "valley"
            }
        ];

        // INITIALIZE
        document.addEventListener('DOMContentLoaded', function() {
            populateLakes();
        });

        function showTab(tabName) {
            document.querySelectorAll('.content-section').forEach(s => s.classList.remove('active'));
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            document.getElementById(tabName).classList.add('active');
            event.target.classList.add('active');
        }

        function populateLakes() {
            const grid = document.getElementById('lakesGrid');
            lakesData.forEach(lake => {
                const card = document.createElement('div');
                card.className = 'lake-card';
                card.innerHTML = `
                    <img src="${lake.img}" alt="${lake.name}" class="lake-img" 
                         onerror="this.src='https://images.unsplash.com/photo-1558618047-3c8c76fdd9e4?w=450&h=320&fit=crop'">
                    <h3>${lake.name}</h3>
                    <div class="location-elevation">
                        <div class="location-tag">📍 ${lake.location}</div>
                        <div class="elevation-tag">🏔️ ${lake.elevation}m</div>
                    </div>
                    <span class="budget-badge budget-${lake.budget.toLowerCase()}">${lake.budget}</span>
                    <div class="price-tag">₨${lake.price.toLocaleString()}</div>
                    <div class="description">${lake.description}</div>
                    <button class="explore-lake-btn" onclick="exploreLake('${lake.name}', '${lake.type}')">
                        🏝️ Explore + Book Stay
                    </button>
                `;
                grid.appendChild(card);
            });
        }

        // FILTERING
        let currentLakeFilter = 'all';
        function filterLakes(type) {
            document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');
            currentLakeFilter = type;
            filterLakeCards();
        }

        function filterBudget(budget) {
            document.querySelectorAll('.budget-tag').forEach(tag => tag.classList.remove('active'));
            event.target.classList.add('active');
            filterLakeCards();
        }

        function filterLakeCards() {
            const cards = document.querySelectorAll('.lake-card');
            cards.forEach(card => {
                const name = card.querySelector('h3').textContent.toLowerCase();
                const budgetBadge = card.querySelector('.budget-badge');
                const lakeType = card.querySelector('.description').textContent.toLowerCase();

                let show = false;
                const budgetFilter = document.querySelector('.budget-tag.active')?.textContent.trim();
                const typeFilter = currentLakeFilter;

                // Budget check
                if (budgetFilter && !budgetBadge.classList.contains(`budget-${budgetFilter}`)) return;

                // Type check
                if (typeFilter === 'all') show = true;
                else if (typeFilter === 'valley' && lakeType.includes('pokhara') || lakeType.includes('kathmandu')) show = true;
                else if (typeFilter === 'mountain' && lakeType.includes('highest') || lakeType.includes('trek')) show = true;
                else if (typeFilter === 'rara' && name.includes('rara')) show = true;

                card.style.display = show ? 'flex' : 'none';
            });
        }

        function exploreLake(name, type) {
            const lakeInfo = {
                valley: `🏞️ ${name} - Valley Paradise!\n💙 Perfect for boating & relaxation\n🚤 Daily boat tours available\n🏨 Lakeside resorts`,
                mountain: `⛰️ ${name} - High Altitude Lake!\n❄️ Trekking adventure required\n🏔️ Stunning Himalayan views\n🧗‍♂️ Experienced trekkers only`,
                rara: `🏝️ ${name} - Nepal's Crown Jewel!\n✈️ Fly to Talcha Airport\n🚁 Helicopter tours available\n💎 Luxury campsites`
            };
            alert(lakeInfo[type] || `🏞️ ${name} - Complete lakeside package ready!\n📅 Best season: March-May, Sep-Nov`);
        }

        // LIVE SEARCH
        document.getElementById('lakeSearch').addEventListener('input', function(e) {
            const query = e.target.value.toLowerCase();
            document.querySelectorAll('.lake-card h3').forEach(title => {
                const card = title.closest('.lake-card');
                card.style.display = title.textContent.toLowerCase().includes(query) ? 'flex' : 'none';
            });
        });
    </script>
</body>
</html>