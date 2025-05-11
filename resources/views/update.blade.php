<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update User Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1>Update User Data</h1>

                <form action="{{ route('update.user', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <label for="name" class="form-label">Name:</label>
                        <input type="name" class="form-control" id="name" value="{{ $data->name }}"
                            name="name">
                    </div><br>
                    <div class="col-md-6">
                        <label for="age" class="form-label">Age:</label>
                        <input type="age" class="form-control" id="age" value="{{ $data->age }}"
                            name="age">
                    </div><br>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" value="{{ $data->email }}"
                            name="email">
                    </div><br>
                    <div class="col-md-6">
                        <label for="city" class="form-label">City:</label>
                        <input type="text" class="form-control" id="city" value="{{ $data->city }}"
                            name="city">
                    </div><br>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
</body>

</html>
