<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 800px;
            margin-top: 50px;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-text {
            color: red;
        }

        .btn-submit {
            background-color: #007bff;
            color: white;
            width: 100%;
        }
    </style>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <!-- Brand Name -->
        <a class="navbar-brand" href="#">WsCube Tech</a>

        <!-- Toggler for small screens -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}" style="color: white">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/register')}}" style="color: white">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/customer')}}" style="color: white">Customer</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<body>
    <div class="container">
        <h2 class="form-title">{{$title}}</h2>

        {{-- Success Message --}}
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        {{-- Display Validation Errors --}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{$url}}" method="post">

            @csrf
            <div class="row mb-3">
                <div class="col">
                    <label for="name" class="form-label">Name: <span class="form-text">*</span></label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $customer->name ?? '' }}" >
                </div>
                <div class="col">
                    <label for="email" class="form-label">Email: <span class="form-text">*</span></label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ $customer->email ?? '' }}" >
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="password" class="form-label">Password: <span class="form-text">*</span></label>
                    <input type="password" class="form-control" name="password" id="password"  required>
                </div>
                <div class="col">
                    <label for="confirm-password" class="form-label">Confirm Password: <span class="form-text">*</span></label>
                    <input type="password" class="form-control" name="confirm_password" id="confirm-password" required>
                </div>
            </div>
            <div class="row mb-3">
            <div class="col">
                    <label for="country" class="form-label">Country:</label>
                    <input type="text" class="form-control" name="country" id="country" value="{{ $customer->country ?? '' }}">
                
            </div>
                <div class="col">
                    <label for="state" class="form-label">State:</label>
                    <input type="text" class="form-control" name="state" id="state" value=>
                
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" class="form-control" name="address" id="address" value ="{{ $customer->address ?? '' }}">
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Gender:</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="M" 
                       
                        
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="F" 
                       
                        
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="other" value="O" 
                       
                        
                        <label class="form-check-label" for="other">Other</label>
                    </div>
                </div>
                <div class="col">
                    <label for="dob" class="form-label">Date of birth:</label>
                    <input type="date" class="form-control" name="dob" id="dob" value="{{ $customer->dob ?? '' }}">
                </div>
            </div>
            <button type="submit" class="btn btn-submit">Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoA6UgSB36pDXV0E263KzgZnH8YB6LR6utLNWTQy0RcK/5" crossorigin="anonymous"></script>
</body>

</html>