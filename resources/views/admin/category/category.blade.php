@extends('layouts.admin')
@section('content')


    @if(Session::get('deleted'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('deleted') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(Session::get('delete-failed'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('delete-failed') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    <div class = "container-fluid">
<div class="row">
    <div class="col">
        @foreach($parentCategories as $category)
            <ul class="list-group">

                <li class="list-group-item">
                   <div class="row">
                       <div class="col">
                           <h4>{{$category->name}}</h4>
                       </div>
                       <div class="col">
                        <a href="{{URL::to('admin/category/edit')}}/{{$category->id}}" class="btn bg-primary">edit</a>
                       </div>
                       <div class="col">
                           <a href="{{URL::to('admin/category/delete')}}/{{$category->id}}" class="btn btn-danger align-content-end" method="delete" onclick="checkDelete()">delete</a>
                       </div>
                   </div>
                </li>

                @if(count($category->subcategory))
                    @include('admin.category.subCategoryList',['subcategories' => $category->subcategory])
                @endif
            </ul>
        @endforeach
    </div>
{{--<div class="col"></div>--}}
    <div class="col">
        <form action="{{ URL::to('admin/category') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Create Category</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter category name" name="name" required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1"> Select parent category </label>
                <select class="form-control" name="parent_id"  >
                    <option value=0>Parent Catgory</option>
                    @foreach($categories as $category2)
                        <option value="{{ $category2->id }}"> {{ $category2->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</div>



</div>



@endsection
