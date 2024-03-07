<x-backend.layouts.master>


    <div class="col-12 col-lg-12 col-xxl-9 d-flex">
        <div class="card flex-fill">
            <div class="card-header">

                show Slider <a class="btn btn-info" href="{{route('sliders.index')}}">List</a>
            </div>

            <h2> Title:{{$slider->slider_title}}</h2>
            <h2> Description:{{$slider->short_title}}</h2>
            <h2>Image   <img src="/storage/products/{{$slider->slider_image}}"  width="200px" height="300"></h2>



        </div>
    </div>


</x-backend.layouts.master>


