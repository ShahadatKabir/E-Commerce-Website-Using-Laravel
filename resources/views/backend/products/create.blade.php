<x-backend.layouts.master>

      <div class="container">
          <h1 class="h3 mb-3"> Product</h1>

          <div class="card-header">
              Create Product <a class="btn btn-info" href="{{route('products.index')}}">List</a>

          </div>

          <div class="card-body">
              <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">

                  @csrf
                  <div class="mb-3">
                      <label for="inputTitle" class="col-sm-3 col-form-label">Product Name</label>
                      <div class="col-8">
                          <input type="text"
                                 class="form-control"
                                 id="inputTitle"
                                 name="product_name"
                                 value="">

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
                                 value="" placeholder="00.00">
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
                                 value="" placeholder="00.00">
                          @error('discount_price')
                          <div class="alert alert-danger text-danger">{{ $message }}</div>
                          @enderror
                      </div>
                  </div>






                  <div class="mb-3">
                      <label for="inputProductType" class="col-sm-3 col-form-label">All Brand</label>
                      <div class="col-8">
                          <select name="brand_id" class="form-select" id="inputProductType">
                              <option></option>
                                                      @foreach($brands as $brand)
                                                             <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
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
                                                     <option value="{{$category->id}}">{{$category->category_name}}</option>
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
                                 value="">
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
                                 value="">

                          @error('image')
                          <div class="alert alert-danger text-danger">{{ $message }}</div>
                          @enderror

                      </div>
                  </div>

                  <div class="mb-3">
                      <div class="col-sm-8">
                          <button type="submit" class="btn btn-info">Submit</button>
                      </div>

                  </div>

              </form>
          </div>
      </div>

</x-backend.layouts.master>
