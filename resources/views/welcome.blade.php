<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy Management Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    <style>
        .card:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }
        .navbar-custom {
            background-color: #5a67d8;
        }
        .btn-primary {
            background-color: #5a67d8;
            border: none;
        }
        .btn-primary:hover {
            background-color: #434190;
        }
        .feature-icon {
            font-size: 2rem;
            color: #5a67d8;
        }
        .feature-card {
            border-left: 4px solid #5a67d8;
        }
    </style>
</head>
<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom navbar-dark shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Pharmacy Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <header class="text-center mb-5">
            <h1 class="display-4">Welcome to Pharmacy Management</h1>
            <p class="text-muted">Your one-stop solution for efficient pharmacy management</p>
        </header>

        <div id="home" class="row">
            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('img/1.jpg') }}" class="card-img-top" alt="Manage Inventory">
                    <div class="card-body text-center">
                        <h5 class="card-title">Manage Inventory</h5>
                        <p class="card-text">Keep track of all your medicines, supplies, and stock levels efficiently. Easily add, edit, or remove items from your inventory.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('img/2.jpg') }}" class="card-img-top" alt="Manage Orders">
                    <div class="card-body text-center">
                        <h5 class="card-title">Manage Orders</h5>
                        <p class="card-text">Efficiently process orders, manage customer prescriptions, and track sales. Streamline your order fulfillment process and improve customer satisfaction.</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="features" class="my-5 text-center">
            <h2 class="mb-4">Why Choose Us?</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm feature-card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Efficiency</h5>
                            <p class="card-text">Our system helps you manage your pharmacy operations with ease, saving you time and effort.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm feature-card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Accuracy</h5>
                            <p class="card-text">Ensure accurate inventory management, prescription handling, and order processing.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm feature-card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Customer Satisfaction</h5>
                            <p class="card-text">Deliver excellent service to your customers by streamlining your pharmacy workflow.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="contact" class="my-5 text-center shadow">
            <h2 class="mb-4">Contact Information</h2>
            <div class="card">
                <div class="card-body">
                    <p class="lead">For any inquiries or assistance, please contact us:</p>
                    <ul class="list-unstyled">
                        <li class="mb-2">Email: info@spysabbir.com</li>
                        <li>Phone: +880 1953 321402</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} Pharmacy Management. All rights reserved.</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
