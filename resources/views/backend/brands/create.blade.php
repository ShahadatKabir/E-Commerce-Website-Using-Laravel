<x-backend.layouts.master>


<div class="container m-auto">
    
            <h1 class="h3 mb-3"> Brands</h1>
    
            <div class="card-header">
                Create Brands <a class="btn btn-info" href="{{route('brands.index')}}">List</a>
    
            </div>
    
            <div class="card-body">
                <form action="{{route('brands.store')}}" method="post" enctype="multipart/form-data">
    
                    @csrf
                    <div class="mb-3">
                        <label for="inputTitle" class="col-sm-3 col-form-label">Title</label>
                        <div class="col-8">
                            <input type="text"
                                   class="form-control"
                                   id="inputTitle"
                                   name="brand_name"
                                   value="">
    
                            @error('brand_name')
                            <div class="alert alert-danger text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="inputShortTitle" class="col-sm-3 col-form-label">Short Title</label>
                        <div class="col-8">
                            <input type="text"
                                   class="form-control"
                                   id="inputShortTitle"
                                   name="brand_slug"
                                   value="">
                            @error('brand_slug')
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
                                   name="brand_image"
                                   value="">
    
                            @error('brand_image')
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
