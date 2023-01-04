@extends('layouts.app')

@include('layouts.navbar')

<div class="container my-5">
    <div class="card shadow">
        <div class="card-header">
            <h2 class="text-center">Checkout</h2>
        </div>
        <form action="{{ url('place-order') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <h6>Basic Details</h6>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="fname">First Name</label>
                                        <input type="text" class="form-control firstname" name="fname"
                                            value="{{ Auth::user()->name }}" required>
                                        <small id="fname_error" class="text-danger"></small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="lname">Last Name</label>
                                        <input type="text" class="form-control lastname" name="lname"
                                            value="{{ Auth::user()->lname }}" required>
                                        <small id="lname_error" class="text-danger"></small>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control email" name="email"
                                            value="{{ Auth::user()->email }}" required>
                                        <small id="email_error" class="text-danger"></small>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="phone">Phone Number</label>
                                        <input type="text" class="form-control phone" name="phone"
                                            value="{{ Auth::user()->phone }}" required>
                                        <small id="phone_error" class="text-danger"></small>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="address1">Address 1</label>
                                        <input type="text" class="form-control address1" name="address1"
                                            value="{{ Auth::user()->address1 }}" required>
                                        <small id="address1_error" class="text-danger"></small>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="address2">Address 2</label>
                                        <input type="text" class="form-control address2" name="address2"
                                            value="{{ Auth::user()->address2 }}" required>
                                        <small id="address2_error" class="text-danger"></small>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control city" name="city"
                                            value="{{ Auth::user()->city }}" required>
                                        <small id="city_error" class="text-danger"></small>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="state">State</label>
                                        <input type="text" class="form-control state" name="state"
                                            value="{{ Auth::user()->state }}" required>
                                        <small id="state_error" class="text-danger"></small>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="country">Country</label>
                                        <input type="text" class="form-control country" name="country"
                                            value="{{ Auth::user()->country }}" required>
                                        <small id="country_error" class="text-danger"></small>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="pincode">Pincode</label>
                                        <input type="text" class="form-control pincode" name="pincode"
                                            value="{{ Auth::user()->pincode }}" required>
                                        <small id="pincode_error" class="text-danger"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                                @php
                                $total = 0;
                                @endphp
                                <h5>Order Details</h5>
                                <hr>

                                @if(count($cartitems) > 0)
                                <table class="table">
                                    <thead class="thead-light">
                                        @php
                                        $count = 1;
                                        @endphp
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-right">
                                        @foreach($cartitems as $item)
                                        <tr>
                                            <th>{{ $count++ }}</th>
                                            <td>{{ $item->products->name }}</td>
                                            <td>{{ $item->prod_qty }}</td>
                                            <td>{{ $item->products->selling_price }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <hr>
                                @foreach($cartitems as $item)
                                @php
                                $total += $item->products->selling_price * $item->prod_qty;
                                @endphp
                                @endforeach
                                <h5 style="margin-left:55%">Total Price : &#8377; {{ $total }}</h5>
                                <hr>
                                <input type="hidden" name="payment_mode" value="COD">
                                <button type="submit" class="btn btn-success w-100">Place Order | COD</button>
                                <button type="button" class="btn btn-primary w-100 mt-3 razorpay-btn">Pay with
                                    RazorpPay</button>
                                @else
                                <h5 class="text-center text-danger">No products in cart ! ! !</h5>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>

{{-- Sweetalert--}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(session('status'))
<script>
    swal("{{ session('status') }}");
</script>
@endif

<script>
    // RazorPay 
    $(".razorpay-btn").click(function(e) {
        e.preventDefault();

        var firstname = $('.firstname').val();
        var lastname = $('.lastname').val();
        var email = $('.email').val();
        var phone = $('.phone').val();
        var address1 = $('.address1').val();
        var address2 = $('.address2').val();
        var city  = $('.city').val();
        var state  = $('.state').val();
        var country = $('.country').val();
        var pincode = $('.pincode').val();

        // First Name
        if(!firstname)
        {
            fname_error = "* First Name is required";
            $('#fname_error').html('');
            $('#fname_error').html(fname_error);
        }
        else 
        {
            fname_error = "";
            $('#fname_error').html('');
        }

        // Last Name
        if(!lastname)
        {
            lname_error = "* Last Name is required";
            $('#lname_error').html('');
            $('#lname_error').html(lname_error);
        }
        else
        {
            lname_error = "";
            $('#lname_error').html('');
        }

        // Email
        if(!email)
        {
            email_error = "* Email is required";
            $('#email_error').html('');
            $('#email_error').html(email_error);
        }
        else
        {
            email_error = "";
            $('#email_error').html('');
        }

        // Phone Number
        if(!phone)
        {
            phone_error = "* Phone Number is required";
            $('#phone_error').html('');
            $('#phone_error').html(phone_error);
        }
        else
        {
            phone_error = "";
            $('#phone_error').html('');
        }

        // Address 1
        if(!address1)
        {
            address1_error = "* Address 1 is required";
            $('#address1_error').html('');
            $('#address1_error').html(address1_error);
        }
        else
        {
            address1_error = "";
            $('#address1_error').html('');
        }

        // Address 2
        if(!address2)
        {
            address2_error = "* Address 2 is required";
            $('#address2_error').html('');
            $('#address2_error').html(address2_error);
        }
        else
        {
            address2_error = "";
            $('#address2_error').html('');
        }

        // City
        if(!city)
        {
            city_error = "* City is required";
            $('#city_error').html('');
            $('#city_error').html(city_error);
        }
        else
        {
            city_error = "";
            $('#city_error').html('');
        }

        // State
        if(!state)
        {
            state_error = "* State is required";
            $('#state_error').html('');
            $('#state_error').html(state_error);
        }
        else
        {
            state_error = "";
            $('#state_error').html('');
        }

        // Country
        if(!country)
        {
            country_error = "* Country is required";
            $('#country_error').html('');
            $('#country_error').html(country_error);
        }
        else
        {
            country_error = "";
            $('#country_error').html('');
        }

        // Pincode
        if(!pincode)
        {
            pincode_error = "* Pincode is required";
            $('#pincode_error').html('');
            $('#pincode_error').html(pincode_error);
        }
        else
        {
            pincode_error = "";
            $('#pincode_error').html('');
        }

        if(fname_error != '' || lname_error != ''|| email_error != ''|| phone_error != ''|| address1_error != ''|| address2_error != ''|| city_error != ''|| state_error != ''|| country_error != ''|| pincode_error != '')
        {
            return false;
        }
        else 
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var data = {
                'firstname': firstname,
                'lastname': lastname,
                'email': email, 
                'phone': phone, 
                'address1': address1, 
                'address2': address2, 
                'city': city, 
                'state': state, 
                'country': country, 
                'pincode': pincode,  
            }

            $.ajax({
                method: "POST",
                url: "/proceed-to-pay",
                data: data,
                success: function(response) {
                    // alert(response.total_price);
                    var options = {
                        "key": "rzp_test_kjrkXLkMj4sma7", // Enter the Key ID generated from the Dashboard
                        "amount": 1*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                        "currency": "INR",
                        "name": response.firstname+' '+response.lastname,
                        "description": "Thank for choosing us.",
                        "image": "https://example.com/your_logo",
                        // "order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                        "handler": function (response1){
                            $.ajax({
                                method: "POST",
                                url: "/place-order",
                                data: {
                                    'fname' : response.firstname,
                                    'lname' : response.lastname,
                                    'email' : response.email,
                                    'phone' : response.phone,
                                    'address1' : response.address1,
                                    'address2' : response.address2,
                                    'city' : response.city,
                                    'state' : response.state,
                                    'country' : response.country,
                                    'pincode' : response.pincode,
                                    'payment_mode' : "Paid by Razorpay",
                                    'payment_id' : response1.razorpay_payment_id,
                                },
                                success: function(response2) {
                                    swal(response2.status).then((value) => {
                                        window.location.href = 'http://localhost:8000/dashboard';
                                    });
                                    
                                }
                            });
                        },
                        "prefill": {
                            "name": response.firstname+' '+response.lastname,
                            "email": response.email,
                            "contact": response.phone,
                        },
                        "theme": {
                            "color": "#3399cc"
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
                }
            });
        }
    });
</script>