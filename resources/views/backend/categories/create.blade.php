<x-backend.layouts.master>



        <div class="container m-auto">
            <h1 class="h3 mb-3"> Categories</h1>
            <div class="card-header">
                Create Categories <a class="btn btn-info" href="{{route('categories.index')}}">List</a>
            </div>
            <div class="card-body">
                <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="inputTitle" class="col-sm-3 col-form-label">Title</label>
                        <div class="col-8">
                            <input type="text"
                                   class="form-control"
                                   id="inputTitle"
                                   name="category_name"
                                   value="">
                            @error('category_name')
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
                                   name="category_slug"
                                   value="">
                            @error('category_slug')
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
                                   name="category_image"
                                   value="">
                            @error('category_image')
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
