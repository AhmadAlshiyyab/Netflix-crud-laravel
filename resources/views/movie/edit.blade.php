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
            <div class="h4 text-white">Edit CRUD Netiflex</div>
        </div>
    </div>

    <div class="container ">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Movies</div>
            <div>
                <a href="{{ route('movies.index')}}"  class="btn btn-primary">Back</a>
            </div>
        </div>

        <form action="{{ route('movies.update', $movie->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="movie_name" class="form-label">Name</label>
                        <input type="text" name="movie_name" id="movie_name" placeholder="Movie Name"
                        class="form-control @error('movie_name') is-invalid @enderror" value="{{old('movie_name',$movie->movie_name)}}" >
                        @error('movie_name')
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="movie_gener" class="form-label">Gener</label>
                        <input type="text" name="movie_gener" id="movie_gener" placeholder="Movie Gener" class="form-control @error('movie_gener') is-invalid @enderror" value="{{old('movie_gener',$movie->movie_gener)}}" >
                        @error('movie_gener')
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="movie_description" class="form-label">Description</label>
                        <textarea name="movie_description" id="movie_description" cols="30" rows="4" placeholder="Movie Description" class="form-control @error('movie_description') is-invalid @enderror" value="{{old('movie_description',$movie->movie_description)}}"></textarea>
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

                        <div class="pt-3">
                        @if ($movie->movie_img != '' && file_exists(public_path().'/uploads/movies/'.$movie->movie_img))
                        <img src="{{ url('uploads/movies/'.$movie->movie_img) }}" alt="" width="100" height="100" >
                        @endif
                        </div>

                    </div>
                </div>
            </div>
            <button class="btn btn-primary my-3">Save Movie</button>
        </form>
    </div>
</body>
</html>
{{--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Netflex</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>

    <div class="bg-dark py-3">
        <div class="container">
            <div class="h4 text-white">CRUD Netflex</div>
        </div>
    </div>

    <div class="container ">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Edit Movie</div>
            <div>
                <a href="{{ route('movies.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
action="{{ route('employees.update',$employee->id) }}"
        <form  method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter Name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name',$movie->name) }}">
                        @error('name')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" id="email" placeholder="Enter Email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email',$movie->email) }}">
                        @error('email')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" id="address" cols="30" rows="4" placeholder="Enter Address" class="form-control">{{ old('address',$employee->address) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label"></label>
                        <input type="file" name="image" id="image" class="@error('image') is-invalid @enderror">

                        @error('image')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror

                        <div class="pt-3">
                            @if($employee->image != '' && file_exists(public_path().'/uploads/employees/'.$employee->image))
                            <img src="{{ url('uploads/employees/'.$employee->image) }}" alt="" width="100" height="100">
                        @endif
                        </div>
                    </div>

                </div>
            </div>

            <button class="btn btn-primary my-3">Update Employee</button>

        </form>
    </div>


</body>
</html> --}}
