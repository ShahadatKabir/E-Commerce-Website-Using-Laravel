<x-backend.layouts.master>


    <div class="container m-auto">
        <div class="col-12 col-lg-12 col-xxl-10 d-flex m-auto mt-3">
            <div class="card flex-fill">
                <div class="card-header">
                    <a class="btn btn-info" href="{{route('products.create')}}">Add New product</a>
                    All product<span class="badge rounded-pill bg-danger">{{count($products)}}</span>
                </div>
                <div class="card-body">
                    @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                   <table class="table table-hover my-0">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>DiscountPrice</th>
                        <th>Percentage</th>
                        <!-- <th>QTY</th> -->
                        <th>Status</th>
                        <th>Action</th>
        
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $key =>$product)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$product->product_name}}</td>
                        <td>{{$product->selling_price}}</td>
                        <td>{{$product->discount_price}}</td>
                        <!-- <td>{{$product->product_qty}}</td> -->
        
            <td>
                @if($product->discount_price == null)
                 <span class="badge rounded-pill bg-info"> No Discount</span>
                @else
                @php
                $amount = $product->selling_price-$product->discount_price;
               $discount = ($amount/$product->selling_price)*100;
                @endphp
                <span class="badge rounded-pill bg-danger">{{round($discount)}}%</span>
                @endif
            </td>
             <td>{{$product->status}}</td>
                        <td>
                            @if($product->status == 1)
                                <span class="badge rounded-pill bg-success">Active</span>
                            @else
                            <span class="badge rounded-pill bg-danger">Inactive</span>
                            @endif
                        </td>
                       <td>
                       <td>    <a href="{{route('products.show',['product'=>$product->id])}}">
                           <a href="{{route('products.show',['product'=>$product->id])}}">
                               <i class="fa fa-eye"></i>
                           </a>
                           <a href="{{route('products.edit',['product'=>$product->id])}}">
                               <i class="fa fa-pencil"></i>
                           </a>
                           <form style="display:inline"
                                 action="{{ route('products.destroy', ['product' => $product->id]) }}"
                                 method="post">
                               @csrf
                               @method('DELETE')
                               <button type="submit" class="btn btn-danger btn-sm"
                                       onclick="return confirm('are sure want delete?')" style="font-size: 11px"><i class="fa fa-trash"></i></button>
                           </form>
                           @if($product->status == 1)
                               <a href="{{ route('product.inactive', $product->id) }}"
                                  class="btn btn-primary" title="active"><i class="fa-solid fa fa-thumbs-up"></i></a>
                           @else
                               <a href="{{ route('product.active', $product->id) }}"
                                  class="btn btn-primary" title="Inactive"><i class="fa-solid fa fa-thumbs-down"></i></a>
                           @endif
         </td>
                       </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

</x-backend.layouts.master>

