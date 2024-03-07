<x-backend.layouts.master>


    <div class="container m-auto">
        <div class="col-12 col-lg-12 col-xxl-10 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    Create Categories <a class="btn btn-info" href="{{route('categories.create')}}">Add New Brand</a>
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
                    @foreach($categories as $key =>$category)
            <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$category->category_name}}</td>
                        <td>{{$category->category_slug}}</td>
                        <td><img src="/storage/products/{{($category->category_image)}}" width="150px" height="150px"></td>
                       <td>
                           <a class="btn btn-warning" href="{{route('categories.show',['category'=>$category->id])}}">
                               show
                           </a>
                           <a class="btn btn-info" href="{{route('categories.edit',['category'=>$category->id])}}">
                               edit
                           </a>
                           <form style="display:inline"
                                 action="{{ route('categories.destroy', ['category' => $category->id]) }}"
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

