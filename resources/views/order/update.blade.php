<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Update Form</h1>
        <div class="form-container">

            <form action="{{route('order.edit', $order->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="price">Order price</label>
                    <input type="text" class="form-control" name="price" value= "{{ $order->price }}" placeholder="Enter your Order price..." >
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>

            </form>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
