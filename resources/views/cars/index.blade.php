<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Listing - AutoShow</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #e3f2fd 0%, #f3e5f5 100%);
            min-height: 100vh;
        }
        .car-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            background: white;
            overflow: hidden;
            margin-bottom: 25px;
        }
        .car-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.15);
        }
        .car-image {
            height: 180px;
            background: linear-gradient(45deg, #2196F3 0%, #21CBF3 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 48px;
            position: relative;
            overflow: hidden;
        }
        .car-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: 0.5s;
        }
        .car-card:hover .car-image::before {
            left: 100%;
        }
        .car-brand {
            color: #666;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }
        .car-price {
            color: #e91e63;
            font-size: 22px;
            font-weight: bold;
        }
        .car-features {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 12px;
            margin: 12px 0;
        }
        .feature-icon {
            color: #2196F3;
            font-size: 14px;
        }
        .btn-order {
            background: linear-gradient(45deg, #2196F3, #21CBF3);
            border: none;
            border-radius: 20px;
            padding: 10px 25px;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
        }
        .btn-order:hover {
            transform: scale(1.02);
            color: white;
            box-shadow: 0 5px 15px rgba(33, 150, 243, 0.3);
        }
        .header-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px 0;
            border-radius: 0 0 30px 30px;
            margin-bottom: 40px;
        }
        .car-icon {
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header-section">
        <div class="container">
            <div class="text-center">
                <div class="car-icon">
                    <i class="fas fa-car fa-2x"></i>
                </div>
                <h1 class="display-5 fw-bold">AutoShow Car Dealership</h1>
                <p class="lead">Find your perfect car from our premium collection</p>
            </div>
        </div>
    </div>

    <!-- Cars Listing -->
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row mb-4">
            <div class="col-12 text-center">
                <h2 class="mb-3">Available Cars</h2>
                <p class="text-muted">Choose from our wide selection of quality vehicles</p>
            </div>
        </div>

        <div class="row">
            @foreach($cars as $car)
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="car-card">
                    <div class="car-image">
                        <i class="fas fa-car"></i>
                    </div>
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div>
                                <span class="car-brand">{{ $car->brand }}</span>
                                <h5 class="card-title mt-1 mb-0">{{ $car->name }}</h5>
                            </div>
                            <span class="car-price">₱{{ number_format($car->price, 2) }}</span>
                        </div>
                        
                        <div class="car-features">
                            <div class="row text-center">
                                <div class="col-4">
                                    <div class="feature-icon">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                    <small class="text-muted">2023</small>
                                </div>
                                <div class="col-4">
                                    <div class="feature-icon">
                                        <i class="fas fa-cog"></i>
                                    </div>
                                    <small class="text-muted">Auto</small>
                                </div>
                                <div class="col-4">
                                    <div class="feature-icon">
                                        <i class="fas fa-gas-pump"></i>
                                    </div>
                                    <small class="text-muted">Petrol</small>
                                </div>
                            </div>
                        </div>

                        <p class="card-text text-muted small mb-3">{{ Str::limit($car->description, 100) }}</p>
                        
                        <div class="d-grid">
                            <a href="{{ route('cars.show', $car->id) }}" class="btn btn-order">
                                <i class="fas fa-shopping-cart me-2"></i>Order Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-light mt-5 py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5><i class="fas fa-car me-2"></i>AutoShow</h5>
                    <p class="mb-0">Your trusted car dealership since 2024</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0">
                        <i class="fas fa-phone me-2"></i>+63 912 345 6789
                    </p>
                </div>
            </div>
            <hr class="my-3">
            <div class="text-center">
                <p class="mb-0">&copy; 2024 AutoShow. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>