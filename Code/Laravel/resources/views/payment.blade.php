@extends('includes.special')

@section('payment')
	<div class="courses_box1">
	   	<div class="container">
            <div>
            	<center><h3>Monthly Payment</h3>
                <form action="/payment" method="POST">
                	{{ csrf_field() }}
					<script
					  src="https://checkout.stripe.com/checkout.js" class="stripe-button"
					  data-key="pk_test_kOZWfTdFS0uwarmuKMT95RDR"
					  data-amount="88800"
					  data-email="{{ auth()->check()?auth()->user()->email:null }}"
					  data-name="E-Learn"
					  data-description="Best Learn will start soon"
					  data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
					  data-locale="auto"
					  data-label="Monthly Subscribe"
					  data-panel-label="Pay Monthly"
					  data-currency="hkd">
					</script>
				</form></center>
            </div>
        <div class="courses_box1">
   	<div class="container">
   	@include('includes.footer')
@endsection