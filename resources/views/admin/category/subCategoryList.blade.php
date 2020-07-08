@foreach($subcategories as $subcategory)
<ul>
       <li class="list-group-item">
           <div class="row">
               <div class="col">
                   <h5>{{$subcategory->name}}</h5>
               </div>
               <div class="col">
                   <a href="{{URL::to('admin/category/edit')}}/{{$subcategory->id}}" class="btn bg-primary">edit</a>
               </div>
               <div class="col">
                   <a href="{{URL::to('admin/category/delete')}}/{{$subcategory->id}}" class="btn btn-danger align-content-end" onclick="checkDelete()">delete</a>
               </div>
           </div>
       </li>
        @if(count($subcategory->subcategory))
            @include('admin.category.subCategoryList',['subcategories' => $subcategory->subcategory])
        @endif
</ul>
@endforeach


