<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</head>

<body>
    @include('header')
    <div class="container mt-5">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <form method="post" action="/category/store123" style="border:2px solid black;" class="p-5"
                         enctype="multipart/form-data">
                         @csrf
                        <h3 class="text-center">Add Categories</h3>
                        <div class="mb-3">
                            <label class="form-label">Category Name:</label>
                            <input type="text" name="name"
                                class="form-control  @error('name') is-invalid @enderror" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description:</label>
                            <input type="text" name="description" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Product Name:</label>
                            <input type="text" name="product_name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Product Description:</label>
                            <textarea name="description" id="product_description" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="number" name="price" id="price" class="form-control" step="0.01"
                                min="0" required>
                            <small class="form-text text-muted">Maximum value: 9.99 (as per decimal(3,2) in the
                                database).</small>
                        </div>
                        <div class="form-group">
                            <label for="image">Product Image:</label>
                            <input type="file" name="image" id="image" class="form-control-file">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
