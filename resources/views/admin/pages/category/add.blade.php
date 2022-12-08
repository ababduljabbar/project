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
                    <form action="{{ route('category.create') }}" method="POST">
                      @csrf
                      <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="parent_id">Parent Category</label>
                        <select id="parent_id" name="parent_id" class="form-control custom-select">
                          <option value="">is_parent</option>
                          @if($categories)
                             @foreach($categories as $category)
                                <?php $dash=''; ?>
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @if(count($category->subcategory))
                                    @include('subCategoryList',['subcategories' => $category->subcategory])
                                @endif
                             @endforeach
                          @endif
                        </select>
                        @error('status')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status" class="form-control custom-select">
                          <option value="1">Active</option>
                          <option value="0">Deactive</option>
                        </select>
                        @error('status')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
             
                      <input type="submit" class="btn btn-primary" value="Add Category">
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