@extends('layouts.admin')
@section('content')

    @if(Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('success') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(Session::get('failed'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('failed') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class = "container-fluid">

    <form action="{{ URL::to('admin/category/update') }}/{{ $category->id }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1"> Category name</label>
            <input type="text" class="form-control" value="{{ $category->name }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter category name" name="name" required>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1"> Select parent category </label>
            <select class="form-control" name="parent_id"  >
                <option value=0>Parent Catgory</option>
                @foreach($selectCat as $categories)
                    <option value="{{ $categories->id }}"> {{ $categories->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary"> Update </button>
    </form>

</div>

@endsection
