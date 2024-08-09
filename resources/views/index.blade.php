<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/style.min.css" rel="stylesheet">
    <style>
        .bg-slate {
            background-color: rgb(241 245 249);
        }

        .btn-red {
            background-color: rgb(254 226 226);
            color: rgb(220 38 38);
        }

        .btn-green {
            background-color: #049C4F;
            color: white;
        }

        .btn-green:hover {
            background-color: rgb(20 83 45);
            color: white;
        }

        .btn-red:hover {
            background-color: rgb(252 165 165);
            color: rgb(153 27 27);
        }

        .swal2-styled.swal2-confirm {
            background-color: #049C4F;
        }
    </style>
</head>

<body class="bg-slate">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-md-12 col-lg-9">

                <div class="d-flex justify-content-center my-5">
                    <img src="image/energeek.png" alt="">
                </div>
                <form id="FormToDo">
                    @csrf
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="p-2">
                                <div class="row">
                                    <input hidden type="text" class="form-control form-control-user" id="index"
                                        name="index" value=" @if ($i->index == null) 1 @endif ">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="name-user">Nama</label>
                                            <input type="text" class="form-control form-control-user" id="name-user"
                                                name="name-user" placeholder="Nama">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control form-control-user" id="username"
                                                name="username" placeholder="Username">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control form-control-user" id="email"
                                                name="email" aria-describedby="emailHelp" placeholder="Email">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="justify-content-center">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3>To Do List</h3>
                            </div>
                            <div class="d-flex col-lg-6 justify-content-end">
                                <button type="button" class="btn btn-red" onclick="addToDo()">
                                    <i class="fa-solid fa-plus"></i>
                                    Tambah To Do
                                </button>
                            </div>
                        </div>

                        <div id="parent-To-Do">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="form-group">
                                        <label for="title-To-Do-1">Judul To Do</label>
                                        <input type="text" class="form-control form-control-user" id="title-To-Do-1"
                                            name="title-To-Do[]" placeholder="Contoh : Perbaikan API Master">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <label for="category-1">Kategori</label>
                                    <select class="form-select" name="category[]" id="category-1">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-1">
                                    <br>
                                    <div class="btn btn-red mt-2">
                                        <i class="fa-solid fa-trash"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-lg-12 d-grid">
                                <button type="button" class="btn btn-green" onclick="submitToDo()">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let i = 2;

        function addToDo() {
            let newElement = document.createElement('div');
            newElement.innerHTML = `<div class="row">
                            <div class="col-lg-9">
                                <div class="form-group">
                                    <label for="title-To-Do-${i}">Judul To Do</label>
                                    <input type="text" class="form-control form-control-user" id="title-To-Do-${i}"
                                        name="title-To-Do[]" placeholder="Contoh : Perbaikan API Master">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <label for="category-${i}">Kategori</label>
                                <select class="form-select" name="category[]" id="category-${i}">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-1">
                                <br>
                                <div class="btn btn-red mt-2">
                                    <i class="fa-solid fa-trash"></i>
                                </div>
                            </div>
                        </div>`;

            // Append the new element to the container
            document.getElementById('parent-To-Do').appendChild(newElement);
            i++;
        }

        function submitToDo() {
            let formData = new FormData(document.getElementById('FormToDo'));

            // Prepare data to send
            let Iuser = document.getElementById('index').value;
            let nickname = document.getElementById('name-user').value;
            let username = document.getElementById('username').value;
            let email = document.getElementById('email').value;

            let todos = [];
            let titles = formData.getAll('title-To-Do[]');
            let categories = formData.getAll('category[]');

            for (let i = 0; i < titles.length; i++) {
                todos.push({
                    description: titles[i],
                    category_id: categories[i],
                    user_id: Iuser,

                });
            }

            // Send AJAX request
            fetch('/', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        nickname: nickname,
                        username: username,
                        email: email,
                        todos: todos
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        // Check if the response is an error
                        return response.json().then(data => {
                            throw new Error(JSON.stringify(data.errors));
                        });
                    }
                    return response.json(); // Successful response
                })
                .then(data => {
                    // Handle success
                    Swal.fire({
                        title: "Berhasil!",
                        text: "To do berhasil disimpan",
                        icon: "success",
                        confirmButtonText: "Selesai"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });
                })
                .catch(error => {
                    // Handle validation errors
                    if (error.message) {
                        const errors = JSON.parse(error.message);
                        // Create an error message string
                        let errorMessage = "Terjadi kesalahan:\n";
                        for (const [field, messages] of Object.entries(errors)) {
                            errorMessage += `${messages.join(' ')}\n`;
                        }

                        Swal.fire({
                            title: "Gagal!",
                            text: errorMessage,
                            icon: "error",
                            confirmButtonText: "Tutup"
                        });
                    } else {
                        console.error('Error:', error);
                    }
                });
        }
    </script>
    <!-- Bootstrap core JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>


</html>
