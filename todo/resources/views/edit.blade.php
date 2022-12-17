<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <title>Todo Project</title>

</head>

<body>
    <div class="container ">
        <div class="row py-5 my-5 ">
            <div class="col-md-12">
                <div class="card  shadow-lg rounded-3" style="background-image: url('{{ asset('image') }}/bgs.png'); background-repeat:no-repeat; background-size:cover; background-position:center">
                    <div class="card-body p-5 my-5 ">
                        <div class="row justify-content-center">
                            <div class="col-md-6 ">
                                <div class="card shadow">
                                    <div class="card-body m-3">
                                        <form action="{{ url('/todo/edit') }}/{{ $todo_data['id'] }}" method="post">
                                            @csrf
                                            <h5 class="card-title text-center">Update ToDo</h5>
                                            <label for="">Add to list</label>
                                            <input type="text" name="edit" class="form-control" value="{{ $todo_data['add'] }}">
                                            @error('edit')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <button class="btn btn-info mt-2 btn-sm done">Update</button>
                                            <a href="{{ url('/') }}" class="btn btn-warning btn-sm mt-2">Go back</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>


    @if (session('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}'
            })
        </script>
    @endif


</body>

</html>
