<x-backend.layouts.master>

    <div class="container m-auto">
        <h1 class="h3 mb-3"> Slider</h1>
        <div class="card-header">
            Create Slider <a class="btn btn-info" href="{{route('categories.index')}}">List</a>
        </div>
        <div class="card-body">
            <form action="{{route('categories.update',['category'=>$category->id])}}" method="post"         enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="mb-3">
                    <label for="inputTitle" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-8">
                        <input type="text"
                               class="form-control"
                               id="inputTitle"
                               name="category_name"
                               value="{{old('category_name',$category->category_name)}}">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputShortTitle" class="col-sm-3 col-form-label">Short Title</label>
                    <div class="col-8">
                        <input type="text"
                               class="form-control"
                               id="inputShortTitle"
                               name="category_slug"
                               value="{{old('short_title',$category->category_slug)}}">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputPicture" class="col-sm-3 col-form-label">Picture</label>
                    <div class="col-8">
                        <input type="file"
                               class="form-control"
                               id="inputPicture"
                               name="category_image"
                               value="{{old('category_image',$category->category_image)}}">
                    </div>
                </div>
                <div class="mb-3">
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-info">update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



</x-backend.layouts.master>

