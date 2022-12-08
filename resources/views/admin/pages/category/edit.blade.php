@extends('admin.master')
@section('title','Add Category')
@section('content')
<div class="content-wrapper">
 
        <section class="content pt-5 pb-5">
            <div class="row">
              <div class="col-md-2 "></div>
              <div class="col-md-8">
                <div class="card card-primary">
                  <div class="card-header text-center">
                    <h3 >Category</h3>  
                  </div>
                  <div class="card-body" style="display: block;">
                      {{-- Success Message Show --}}
                      @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            {{ $message }}
                        </div>
                      @endif
                    <form action="{{ route('category.update',$category->id) }}" method="POST">
                      @csrf
                      <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" name="name" value="{{ $category->name }}" id="name" class="form-control">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="parent_id">Parent Category</label>
                        <select id="parent_id" name="parent_id" class="form-control custom-select">
                          <option value="">is_parent</option>
                          @if($categories)
                             @foreach($categories as $category1)
                                <?php $dash=''; ?>

                                <option value="{{$category1->id}}" @if ($category->parent_id ==  '' )
                                  {{ 'selected' }}

                                @endif
                                  
                                  >{{$category1->name}}</option>

                                @if(count($category1->subcategory))
                                    @include('subCategoryList',['subcategories' => $category1->subcategory])
                                @endif
                             @endforeach
                          @endif
                        </select>
                        @error('parent_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status" class="form-control custom-select">
                           <option value="1" @if (  $category->status == "1")
                                 {{ 'selected' }}
                            @endif>Active</option>
                          <option @if (  $category->status == "0")
                            {{ 'selected' }}
                          @endif value="0">Deactive</option>
                        </select>
                        @error('status')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
             
                      <input type="submit" class="btn btn-primary" value="Update Category">
                   </form>
              </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
         
            </div>
          
          </section>
 
</div>
@endsection