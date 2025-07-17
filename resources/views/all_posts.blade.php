

@foreach($customers as $customer)
  <P> Name : {{ $customer->name }} Total Post : {{ $customer->posts->count() }} </P>  
@endforeach