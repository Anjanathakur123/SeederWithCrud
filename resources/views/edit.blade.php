<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                    <form action="{{route('update', $users->id)}}" style="border:2px solid black;" class="p-5" method="POST">
                        <h3 class="text-center">User Data</h3>
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">User Name:</label>
                            <input type="text" name="name" class="form-control" value="{{$users->name}}"  required>

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email:</label>
                            <input type="text" name="email" class="form-control"  value="{{$users->email}}" required>
                            @error('email')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">City:</label>
                            <input type="text" name="city" class="form-control"  value="{{$users->city}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="roleSelect" class="form-label">Select Role</label>
                            <select class="form-select" id="roleSelect" name="role_id">
                                <option value="">Select role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ $role->id == $users->role_id ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
