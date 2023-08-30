<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Product Details</h1>
        <div class="card">
            <div class="card-body">
                <img src="{{ asset('images/' . $product->product_image) }}" alt="Product Image" class="img-fluid w-100" style="max-width: 333px; height: auto;">
                <p><strong>Product Name:</strong> {{ $product->product_name }}</p>
                <p><strong>Product Price:</strong> {{ $product->product_price }}</p>
                <p><strong>Product Availability:</strong> {{ $product->product_availability }}</p>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>

