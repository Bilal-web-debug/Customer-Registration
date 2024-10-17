<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $url = url('/customer');
        $title = "Customer Registration";
        $data = compact('url', 'title');
        return view ('customer')->with($data);
    }

    public function store(Request $request)
    { 
     
      
      // Larvel ke ander model ka through Chalne wale" INSERT QUERY" ha.
      
      $customer = new Customer;
      $customer->name= $request['name'];
      $customer->email= $request['email'];
      $customer->gender= $request['gender'];
      $customer->address= $request['address'];
      $customer->state= $request['state'];
      $customer->country= $request['country'];
      $customer->dob= $request['dob'];
      $customer->password= md5($request['password']);
      $customer->save();

      return redirect('/customer');

    }
    
   public function viewcustomer(Request $request)
{
    // Get the search query from the request
    $search = $request->input('search', '');

    // If search query exists, apply search filter
    if ($request->filled('search')) {
        $customers = Customer::where('name', 'LIKE', "%{$search}%")
                             ->orWhere('email', 'LIKE', "%{$search}%")
                             ->paginate(10);
    } else {
        // Otherwise, just paginate without search
        $customers = Customer::paginate(10);
    }

    // Compact data and pass it to the view
    return view('customer-view', compact('customers', 'search'));
}


    public function trash()
    
    {
      $customers = Customer::onlyTrashed()->get();
      $data = compact('customers');
      return view('customer-trash')->with($data);

    }

    public function delete($id)
    {
      $customer = Customer::find($id);
      if(!is_null($customer)){
        $customer->delete();
      }
      return redirect('customer');
      
      
    }

    public function forcedelete($id)
    {
      $customer = Customer::withTrashed()->find($id);
      if(!is_null($customer)){
        $customer->forceDelete();
      }
      return redirect()->back();
      
      
    }


    



    public function restore($id)
    {
      $customer = Customer::withTrashed()->find($id);
      if(!is_null($customer)){
        $customer->restore();
      }
      return redirect('customer');
      
      
    }

    public function edit($id)
    {
      $customer = Customer::find($id);
      if(!is_null($customer))
      
      {
        // not found
        return redirect ('customer');
      }
      
      else
      {
        $title = "Update Customer";
        $url = url('/customer/update') ."/". $id;
        $data = compact('customer', 'url', 'title');
        return view ('customer')->with($data);
      }

    }

    
    /*public function update(Request $request,$id )
    {
      $customer = Customer::find($id);
      $customer->name= $request['name'];
      $customer->email= $request['email'];
      $customer->gender= $request['gender'];
      $customer->address= $request['address'];
      $customer->state= $request['state'];
      $customer->country= $request['country'];
      $customer->dob= $request['dob'];
      $customer->save();
      return redirect('customer');
      //return redirect()->route('customer.edit')->with('success', 'Customer updated successfully!');


    }*/


   public function update(Request $request, $id) {
      // Find the customer by ID
      $customer = Customer::find($id);
  
      // Check if the customer object is valid (i.e., customer exists)
      if (!$customer) {
          // If the customer does not exist, redirect back with an error message
          return redirect()->back()->with('error', 'Customer not found!');
      }
  
      // Validate the incoming request data
      $request->validate([
          'name' => 'required|string|max:255',
          'email' => 'required|email|max:255',
          'gender' => 'required|string',
          'address' => 'nullable|string',
          'state' => 'nullable|string',
          'country' => 'nullable|string',
          'dob' => 'nullable|date',
      ]);
  
      // Assign updated values from the form to the customer object
      $customer->name = $request->input('name');
      $customer->email = $request->input('email');
      $customer->gender = $request->input('gender');
      $customer->address = $request->input('address');
      $customer->state = $request->input('state');
      $customer->country = $request->input('country');
      $customer->dob = $request->input('dob');
  
      // Save the updated customer data
      $customer->save();
  
      // Redirect to a desired route with a success message
      return redirect()->route('customer.index')->with('success', 'Customer updated successfully!');
  }
  




    


}
