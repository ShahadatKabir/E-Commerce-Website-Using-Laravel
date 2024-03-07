<x-backend.layouts.master>

 <div class="container ms-auto row">
    
    <div class="col-12 col-lg-12 col-xxl-9 d-flex">
        <div class="card flex-fill">
            <div class="card-header">

                show product <a class="btn btn-info" href="{{route('products.index')}}">List</a>
            </div>

            <h2> Title:{{$product->product_name}}</h2>

            <h2 >Image: </h2>
<img class="m-auto" src="/storage/products/{{($product->image)}}" width="400px" height="600">
        @php   
        $price = $product->selling_price;
        @endphp
        <h2> Price:{{$price}}</h2>
     

        </div>
    </div>
 </div>


</x-backend.layouts.master>


