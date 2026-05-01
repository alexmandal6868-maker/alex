<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found | Nepal Tourism</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #333;
        }
        .container {
            text-align: center;
            background: white;
            padding: 60px;
            border-radius: 30px;
            box-shadow: 0 30px 80px rgba(0,0,0,0.3);
            max-width: 600px;
            margin: 20px;
        }
        h1 {
            font-size: 8rem;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 20px;
        }
        h2 {
            color: #2c3e50;
            margin-bottom: 20px;
            font-size: 2rem;
        }
        p {
            color: #666;
            margin-bottom: 30px;
            font-size: 1.1rem;
            line-height: 1.7;
        }
        .links {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            justify-content: center;
        }
        .btn {
            padding: 15px 30px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: bold;
            transition: all 0.3s;
        }
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(102,126,234,0.4);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>404</h1>
        <h2>Page Not Found</h2>
        <p>Sorry, the page you're looking for doesn't exist.<br>It may have been moved or deleted.</p>
        
        <div class="links">
            <a href="index.php" class="btn">🏠 Home</a>
            <a href="tour.php" class="btn">🏨 Hotels</a>
            <a href="park.php" class="btn">🌳 Parks</a>
            <a href="aichatbook.php" class="btn">🏞️ Lakes</a>
        </div>
    </div>
</body>
</html>
