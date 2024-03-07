<x-backend.layouts.master>


    <div class="container m-auto">
        <div class="col-12 col-lg-12 col-xxl-10 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    Create brand <a class="btn btn-info" href="{{route('brands.create')}}">Add New Brand</a>
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
                    @foreach($brands as $key =>$brand)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$brand->brand_name}}</td>
                        <td>{{$brand->brand_slug}}</td>
                        <td><img src="/storage/products/{{($brand->brand_image)}}" style="width: 70px;height: 40px;"></td>
                       <td>
                           <a class="btn btn-warning" href="{{route('brands.show',['brand'=>$brand->id])}}">
                               show
                           </a>
                           <a class="btn btn-info" href="{{route('brands.edit',['brand'=>$brand->id])}}">
                               edit
                           </a>
                           <form style="display:inline"
                                 action="{{ route('brands.destroy', ['brand' => $brand->id]) }}"
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

