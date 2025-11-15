<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $car->name }} - AutoShow</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #e3f2fd 0%, #f3e5f5 100%);
            min-height: 100vh;
        }
        .car-detail-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            background: white;
            overflow: hidden;
        }
        .car-detail-image {
            height: 250px;
            background: linear-gradient(45deg, #2196F3 0%, #21CBF3 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 80px;
        }
        .car-price-large {
            color: #e91e63;
            font-size: 28px;
            font-weight: bold;
        }
        .feature-box {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            margin: 10px 0;
        }
        .feature-icon {
            color: #2196F3;
            font-size: 24px;
            margin-bottom: 10px;
        }
        .btn-order-large {
            background: linear-gradient(45deg, #2196F3, #21CBF3);
            border: none;
            border-radius: 25px;
            padding: 15px 40px;
            color: white;
            font-weight: 600;
            font-size: 18px;
            transition: all 0.3s ease;
        }
        .btn-order-large:hover {
            transform: scale(1.05);
            color: white;
            box-shadow: 0 8px 20px rgba(33, 150, 243, 0.3);
        }
        .back-btn {
            background: #6c757d;
            border: none;
            border-radius: 20px;
            padding: 10px 25px;
            color: white;
            transition: all 0.3s ease;
        }
        .back-btn:hover {
            background: #5a6268;
            color: white;
        }
        .nav-link {
            color: white !important;
            font-weight: 500;
        }
        .login-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            background: white;
        }
        .btn-login {
            background: linear-gradient(45deg, #ff6b6b, #ee5a24);
            border: none;
            border-radius: 20px;
            padding: 10px 30px;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/cars') }}">
                <i class="fas fa-car me-2"></i>AutoShow
            </a>
            
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">
                    <i class="fas fa-sign-in-alt me-1"></i>Login
                </a>
            </div>
        </div>
    </nav>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content login-card">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="loginModalLabel">
                        <i class="fas fa-sign-in-alt me-2"></i>Login to Your Account
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form id="loginForm">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter your password" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-login">
                                <i class="fas fa-sign-in-alt me-2"></i>Login
                            </button>
                        </div>
                    </form>
                    <div class="text-center mt-3">
                        <small class="text-muted">
                            Don't have an account? <a href="#" class="text-decoration-none">Sign up</a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <!-- Back Button -->
        <div class="mb-4">
            <a href="{{ url('/cars') }}" class="back-btn">
                <i class="fas fa-arrow-left me-2"></i>Back to Cars
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row">
            <!-- Car Details -->
            <div class="col-lg-6 mb-4">
                <div class="car-detail-card">
                    <div class="car-detail-image">
                        <i class="fas fa-car"></i>
                    </div>
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <span class="text-muted text-uppercase small">{{ $car->brand }}</span>
                                <h2 class="card-title mt-1">{{ $car->name }}</h2>
                            </div>
                            <span class="car-price-large">₱{{ number_format($car->price, 2) }}</span>
                        </div>

                        <div class="row mb-4">
                            <div class="col-4">
                                <div class="feature-box">
                                    <div class="feature-icon">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                    <div class="small">2023 Model</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="feature-box">
                                    <div class="feature-icon">
                                        <i class="fas fa-cog"></i>
                                    </div>
                                    <div class="small">Automatic</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="feature-box">
                                    <div class="feature-icon">
                                        <i class="fas fa-gas-pump"></i>
                                    </div>
                                    <div class="small">Petrol</div>
                                </div>
                            </div>
                        </div>

                        <h5>Description</h5>
                        <p class="card-text text-muted">{{ $car->description }}</p>
                    </div>
                </div>
            </div>

            <!-- Order Form -->
            <div class="col-lg-6">
                <div class="car-detail-card">
                    <div class="card-body p-4">
                        <h3 class="card-title mb-4">
                            <i class="fas fa-shopping-cart me-2"></i>Order This Car
                        </h3>

                        <form action="{{ route('orders.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="car_id" value="{{ $car->id }}">
                            
                            <div class="mb-3">
                                <label for="customer_name" class="form-label">Full Name *</label>
                                <input type="text" class="form-control" id="customer_name" name="customer_name" 
                                       placeholder="Enter your full name" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="customer_email" class="form-label">Email Address *</label>
                                <input type="email" class="form-control" id="customer_email" name="customer_email" 
                                       placeholder="Enter your email" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="customer_phone" class="form-label">Phone Number *</label>
                                <input type="text" class="form-control" id="customer_phone" name="customer_phone" 
                                       placeholder="Enter your phone number" required>
                            </div>
                            
                            <div class="mb-4">
                                <label for="message" class="form-label">Additional Message</label>
                                <textarea class="form-control" id="message" name="message" rows="4" 
                                          placeholder="Any special requests or questions about this car..."></textarea>
                            </div>
                            
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-order-large">
                                    <i class="fas fa-paper-plane me-2"></i>Submit Order
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simple login form handler
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            
            // Simple validation
            if (email && password) {
                alert('Login successful! Welcome back.');
                // Close modal
                var loginModal = bootstrap.Modal.getInstance(document.getElementById('loginModal'));
                loginModal.hide();
                
                // Clear form
                document.getElementById('loginForm').reset();
            } else {
                alert('Please fill in all fields.');
            }
        });
    </script>
</body>
</html>