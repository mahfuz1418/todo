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
                                <div class="card shadow-lg">
                                    <div class="card-body m-3">
                                        <form action="{{ url('/add') }}" method="post">
                                            @csrf
                                            <h5 class="card-title text-center">ToDo Project</h5>
                                            <label for="">Add to list</label>
                                            <input type="text" name="add" class="form-control"
                                                placeholder="Enter a new todo">
                                            @error('add')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <button class="btn btn-info mt-2 btn-sm done">Add</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="card mt-4 shadow-lg">
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Todo list</th>
                                                    <th scope="col">Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($todos as $todo)
                                                    <tr>
                                                        <td>{{ $todos->firstItem() + $loop->index}}</td>
                                                        <td>{{ $todo->add }}</td>
                                                        <td>
                                                            <button value="{{ route('todo.destroy',['id'=>$todo->id]) }}"
                                                                class="btn btn-danger btn-sm delete">Delete</button>
                                                            {{-- <button value="{{ route('todo.edit', ['id'=>$todo->id]) }}" class="btn btn-warning btn-sm">Edit</button> --}}
                                                            <a class="btn btn-warning btn-sm" href="{{ url('todo/edit') }}/{{ $todo->id }}">Edit</a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="50"><p class="text-danger text-center fw-bold">No data</p></td>
                                                    </tr>
                                                @endforelse                                               
                                            </tbody>        
                                        </table>
                                        {{ $todos->links() }}
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

    <script>
        $(document).ready(function() {
            $('.delete').click(function() {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.assign($(this).val());
                    }
                })
            })

        })
    </script>
    @if (session('done'))
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
                title: '{{ session('done') }}'
            })
        </script>
    @elseif (session('delete'))
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
                title: '{{ session('delete') }}'
            })
        </script>
    @endif


</body>

</html>
