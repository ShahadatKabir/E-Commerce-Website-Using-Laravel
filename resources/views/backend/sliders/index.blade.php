<x-backend.layouts.master>


    <div class="container m-auto">
        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
               <!-- @can('create.slider')
                    Create Slider <a class="btn btn-info" href="{{route('sliders.create')}}">Add New Slider</a>
               @endcan -->
               Create Slider <a class="btn btn-info" href="{{route('sliders.create')}}">Add New Slider</a>
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
                        <th>Name</th>
                        <th>Description</th>
                        <th>Picture</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sliders as $key =>$slider)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$slider->slider_title}}</td>
                        <td>{{$slider->short_title}}</td>
                        <td><img src="/storage/products/{{$slider->slider_image}}" style="width: 70px;height: 40px;"></td>
                       <td>
                           <a class="btn btn-warning" href="{{route('sliders.show',['slider'=>$slider->id])}}">
                               show
                           </a>
                           <a class="btn btn-info" href="{{route('sliders.edit',['slider'=>$slider->id])}}">
                               edit
                           </a>
                           <form style="display:inline"
                                 action="{{ route('sliders.destroy', ['slider' => $slider->id]) }}"
                                 method="post">
                               @csrf
                               @method('DELETE')
                               <button type="submit" class="btn btn-danger btn-sm"
                                       onclick="return confirm('are sure want delete?')" style="font-size: 11px">Delete</button>
                           </form>
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

