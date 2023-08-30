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

            <form action="{{route('product.edit', $product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="product_name">Product name</label>
                    <input type="text" class="form-control" name="product_name" value= "{{ $product->product_name }}" placeholder="Enter your Product name..." required >
                </div>

                <div class="form-group">
                    <label for="product_price">Product price</label>
                    <input type="text" class="form-control" value= "{{ $product->product_price }}" name="product_price" placeholder="Enter your Product price..." required>
                </div>

                <div class="form-group">
                    <label for="product_availability">Product availability</label>
                    <input type="text" class="form-control" name="product_availability" value= "{{ $product->product_availability }}" placeholder="Enter your Product availability..." required>
                </div>

                <div class="form-group">
                    <label for="category_id">Category name</label>
                    <select name="category_id" value="{{ $product->category_id }}">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="product_image">Product image</label>
                    <input type="file" class="form-control-file" name="product_image" value="{{ $product->product_image }}">
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
