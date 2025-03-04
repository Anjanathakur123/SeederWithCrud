<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

</head>

<body>
    @include('header')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 ms-auto me-auto">
                <table class="table table-hover mt-2 table-bordered text-center">
                    <h2 class="text-center pt-5">Users All Data</h2>
                    <thead>

                        <tr>
                            <th scope="col">S.No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">City</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $userData)
                            <tr>

                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $userData->name }}</td>
                                <td>{{ $userData->email }}</td>
                                <td>{{ $userData->city }}</td>
                                <td>{{$userData->role->name}}</td>

                                <td><a href="{{ route('edit', $userData->id) }}" class="btn btn-primary">Edit</a>
                                    <form method="POST" action="{{ route('delete', $userData->id) }}"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn delete-btn btn-danger">Delete</button>
                                    </form>
                                </td>
                         </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-3">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {

            $('.delete-btn').on('click', function() {
                const form = $(this).closest('form');


                $.confirm({
                    title: 'Confirm Delete',
                    content: 'Are you sure you want to delete this User data?',
                    buttons: {
                        confirm: {
                            text: 'Delete',
                            btnClass: 'btn-danger',
                            action: function() {

                                form.submit();
                            }
                        },
                        cancel: {
                            text: 'Cancel',
                            btnClass: 'btn-secondary',
                            action: function() {

                                $.alert('Deletion canceled!');
                            }
                        }
                    }
                });
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
</body>

</html>
