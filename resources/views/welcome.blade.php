<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Inventory Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .hero {
            text-align: center;
            color: white;
        }
        
        .hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .hero p {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            opacity: 0.95;
        }
        
        .btn-large {
            padding: 15px 40px;
            font-size: 1.1rem;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            margin: 0.5rem;
        }
        
        .btn-primary-custom {
            background-color: white;
            color: #667eea;
            border: none;
        }
        
        .btn-primary-custom:hover {
            background-color: #f0f0f0;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        
        .btn-secondary-custom {
            background-color: transparent;
            color: white;
            border: 2px solid white;
        }
        
        .btn-secondary-custom:hover {
            background-color: rgba(255,255,255,0.1);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-top: 4rem;
        }
        
        .feature-card {
            background: rgba(255,255,255,0.1);
            border-radius: 10px;
            padding: 2rem;
            color: white;
            backdrop-filter: blur(10px);
        }
        
        .feature-card i {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #ffd700;
        }
        
        .feature-card h3 {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="hero">
            <i class="fas fa-boxes" style="font-size: 4rem; margin-bottom: 1rem;"></i>
            <h1>Product Inventory Manager</h1>
            <p>Manage your products efficiently with our simple and powerful inventory system</p>
            
            <div>
                <a href="{{ route('products.index') }}" class="btn btn-large btn-primary-custom">
                    <i class="fas fa-list"></i> View Products
                </a>
                <a href="{{ route('products.create') }}" class="btn btn-large btn-secondary-custom">
                    <i class="fas fa-plus"></i> Add Product
                </a>
            </div>
            
            <div class="features">
                <div class="feature-card">
                    <i class="fas fa-search"></i>
                    <h3>Search</h3>
                    <p>Find products quickly by name or category</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-filter"></i>
                    <h3>Filter</h3>
                    <p>Filter by stock status in seconds</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-plus-circle"></i>
                    <h3>Add</h3>
                    <p>Create new products with detailed info</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-edit"></i>
                    <h3>Edit</h3>
                    <p>Update product information anytime</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-trash"></i>
                    <h3>Delete</h3>
                    <p>Remove products from inventory</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-chart-line"></i>
                    <h3>Track</h3>
                    <p>Monitor stock levels and availability</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
