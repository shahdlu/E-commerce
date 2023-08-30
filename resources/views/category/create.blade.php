<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Create Form</h1>
        <div class="form-container">

            <form action="{{route('category.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Category name</label>
                    <input type="text" class="form-control" name="name"  placeholder="Enter your Category name..." >
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">create</button>
                </div>

            </form>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
