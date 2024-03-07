<x-backend.layouts.master>

    <h1 class="h3 mb-3"> product</h1>

    <div class="card-header">
        Edit product <a class="btn btn-info" href="{{route('products.index')}}">List</a>

    </div>

    <div class="card-body">
        <form action="{{route('products.update',['product'=>$product->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="inputTitle" class="col-sm-3 col-form-label">Product Name</label>
                <div class="col-8">
                    <input type="text"
                           class="form-control"
                           id="inputTitle"
                           name="product_name"
                           value="{{$product->product_name}}">

                    @error('product_name')
                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>







            <div class="mb-3">
                <label for="inputShortTitle" class="col-sm-3 col-form-label">SellingPrice</label>
                <div class="col-8">
                    <input type="text"
                           class="form-control"
                           id="inputShortTitle"
                           name="selling_price"
                           value="{{$product->selling_price}}" placeholder="00.00">
                    @error('selling_price')
                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>



            <div class="mb-3">
                <label for="inputShortTitle" class="col-sm-3 col-form-label">DiscountPrice</label>
                <div class="col-8">
                    <input type="text"
                           class="form-control"
                           id="inputShortTitle"
                           name="discount_price"
                           value="{{$product->discount_price}}" placeholder="00.00">
                    @error('discount_price')
                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>






<div class="mb-3">
    <label for="inputProductType" class="col-sm-3 col-form-label">product</label>
    <div class="col-8">
        <select name="brand_id" class="form-select" id="inputProductType">
            <option></option>
          @foreach($brands as $brand)
              <!-- <option value="{{$brand->id}}">{{$brand->brand_name}}</option> -->
              <option value="{{$brand->id}}"{{$brand->id==$product->brand_id ? 'selected':''}}>{{$brand->brand_name}}</option>

            @endforeach

        </select>
    </div>
</div>

<div class="mb-3">
                <label for="inputProductType" class="col-sm-3 col-form-label">Product Category</label>
    <div class="col-8">
        <select name="category_id" class="form-select" id="inputProductType">
            <option></option>
            @foreach($categories as $category)
                <!-- <option value="{{$category->id}}">{{$category->category_name}}</option> -->
                <option value="{{$category->id}}"{{$category->id==$product->category_id ? 'selected':''}}>{{$category->category_name}}</option>
            @endforeach

        </select>
    </div>
</div>

            <div class="mb-3">
                <label for="inputShortTitle" class="col-sm-3 col-form-label">short descp</label>
                <div class="col-8">
                    <input type="text"
                           class="form-control"
                           id="inputShortTitle"
                           name="short_descp"
                           value="{{$product->short_descp}}">
                    @error('product_code')
                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>



    <div class="mb-3">
        <label for="inputPicture" class="col-sm-3 col-form-label">Picture</label>
        <div class="col-8">
            <input type="file"
                   class="form-control"
                   id="inputPicture"
                   name="image"
                   value="{{old('image',$product->image)}}">
            <img src="/storage/products/{{($product->image)}}" width="200px" height="300">

            @error('image')
            <div class="alert alert-danger text-danger">{{ $message }}</div>
            @enderror

        </div>
    </div>
            <div class="mb-3">
                <div class="col-sm-8">
                    <button type="submit" class="btn btn-info">update</button>
                </div>

            </div>

        </form>
    </div>


</x-backend.layouts.master>

