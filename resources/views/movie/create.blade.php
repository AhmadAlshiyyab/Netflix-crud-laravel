<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Netiflex</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>

    <div class="bg-dark py-3">
        <div class="container">
            <div class="h4 text-white">CRUD Netiflex</div>
        </div>
    </div>

    <div class="container ">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Movies</div>
            <div>
                <a href="{{ route('movies.index')}}"  class="btn btn-primary">Back</a>
            </div>
        </div>

        <form href="{{ route('movies.store')}}" method="post" enctype="multipart/form-data">
             @csrf
            {{-- {{ method_field('PUT') }} --}}

            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="movie_name" class="form-label">Name</label>
                        <input type="text" name="movie_name" id="movie_name" placeholder="Movie Name" class="form-control @error('movie_name') is-invalid @enderror" value="{{old('movie_name')}}" >
                        @error('movie_name')
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="movie_gener" class="form-label">Gener</label>
                        <input type="text" name="movie_gener" id="movie_gener" placeholder="Movie Gener" class="form-control @error('movie_gener') is-invalid @enderror" value="{{old('movie_gener')}}" >
                        @error('movie_gener')
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="movie_description" class="form-label">Description</label>
                        <textarea name="movie_description" id="movie_description" cols="30" rows="4" placeholder="Movie Description" class="form-control @error('movie_description') is-invalid @enderror" value="{{old('movie_description')}}"></textarea>
                        @error('movie_description')
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="movie_img" class="form-label">Movie Image</label>
                        <input type="file" name="movie_img" id="movie_img" class="form-control @error('movie_img') is-invalid @enderror" value="{{old('movie_img')}}">
                        @error('movie_img')
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <button class="btn btn-primary mt-3">Save Movie</button>
        </form>
    </div>
</body>
</html>

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIMPLE LARAVEL 9 CRUD IN HINDI</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>

    <div class="bg-dark py-3">
        <div class="container">
            <div class="h4 text-white">SIMPLE LARAVEL 9 CRUD IN HINDI</div>
        </div>
    </div>

    <div class="container ">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Employees</div>
            <div>
                <a href="{{ route('employees.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <form action="{{ route('employees.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter Name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('name')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" id="email" placeholder="Enter Email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                        @error('email')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" id="address" cols="30" rows="4" placeholder="Enter Address" class="form-control">{{ old('address') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label"></label>
                        <input type="file" name="image" id="image" class="@error('image') is-invalid @enderror">

                        @error('image')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </div>

            <button class="btn btn-primary mt-3">Save Employee</button>

        </form>
    </div>


</body>
</html> --}}
