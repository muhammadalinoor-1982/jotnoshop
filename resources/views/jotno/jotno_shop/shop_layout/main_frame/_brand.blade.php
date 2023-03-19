@php
    $clients = App\client::all();
    $contacts = App\contact::first();
@endphp
<div class="container jtv-brand-logo-block">
    <div class="jtv-brand-logo">
        <div class="slider-items-products">
            <div id="jtv-brand-logo-slider" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col6">
                    @foreach($clients as $client)
                    <div class="item"><a href="#"><img src="{{asset('public/jotno_admin/assets/images/client/'.$client->image)}}" alt="{{$client->name}}"></a> </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
