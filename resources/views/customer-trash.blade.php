<!doctype html>
<html lang="en">
<head>
    <title>Customer Trash</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   

</head>
          
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <!-- Brand Name -->
        <a class="navbar-brand" href="#" style="color: white">
           
        @if (session()->has('name'))
             {{session()->get('name')}}
           
            @else


                Guest
            
            @endif
       
        </a>

        

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

<a href="{{ url('customer/create') }}">
<button class="btn btn-primary float-end" style="background-color: darkblue; border-color: skyblue;">
    Add
</button>
</a>

<a href="{{ url('customer') }}">
<button class="btn btn-primary float-end" style="background-color: darkblue; border-color: skyblue;">
    Customer View
</button>
</a>




    <div>
<table class="table">
       
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>DOB</th>
                <th>Address</th>
                <th>State</th>
                <th>Country</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           
        @foreach ($customers  as $customer)

            <tr>
                <td>{{$customer->name}}</td>
                <td>{{$customer->email}}</td>
                <td>
                   @if ($customer->gender == "M")
                   Male
                   @elseif($customer->gender == "F")
                   Female
                   @else
                   Other
                   @endif
                </td>
                <td>{{ ($customer->dob)}}</td>
                <td>{{$customer->address}}</td>
                <td>{{$customer->state}}</td>
                
                <td>{{$customer->country}}</td>
                <td>
                   @if ($customer->status == "1")
                  
                  <a href="#" class="btn btn-success">
                   <span class="badge badge-light">Active</span>
                  </a>

                   @else
                 
                   <a href="#" class="btn btn-danger">
                   <span class="badge badge-light">Inctive</span>
                  </a>
                    
                   @endif
                </td>
                <td>
                    
                
                <a href="{{route('customer.forcedelete',['id' => $customer->customer_id])}}">
                    <button class= "btn btn-danger">Delete</button>
                    </a>
                    
                    <a href="{{route('customer.restore',['id' => $customer->customer_id])}}">
                    <button class= "btn btn-primary">Restore</button>
                    </a>

                    
                
                
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>

</body>
</html>
