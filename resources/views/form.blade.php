<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Bootstrap 4 Template</title>
    <!-- Bootstrap 4 CSS only -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
   <form action="{{url ('/') }}/register" method="post">
   @csrf

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
                    <a class="nav-link" href="{{url('/')}}" style ="color: white">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/register')}}" style ="color: white">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/customer')}}" style ="color: white">Customer</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


   <div class="container">
       <x-input type="text" name="name" label="Please enter your name"/>
       <x-input type="email" name="email" label="Please enter your email"/>
       <x-input type="password" name="password" label="Password"/>
       <x-input type="password" name="password_confirmation" label="Confirm Password"/>
       
       <button type="submit" class="btn" style="background-color: black; color: white;">
    Submit
</button>

    </div>
    </form>
</body>
</html>
