@extends('admin.master')
@section('title','Edit Brand')
@section('content')
<div class="content-wrapper">
 
        <section class="content pt-5 pb-5">
            <div class="row">
              <div class="col-md-2 "></div>
              <div class="col-md-8">
                <div class="card card-primary">
                  <div class="card-header text-center">
                    <h3 >Brand</h3>  
                  </div>
                  <div class="card-body" style="display: block;">
                      {{-- Success Message Show --}}
                      @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            {{ $message }}
                        </div>
                      @endif
                    <form action="{{ route('brand.update',$brand->id) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label for="name">Brand Name</label>
                        <input type="text" name="name" id="name" value="{{ $brand->name }}" class="form-control">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status" class="form-control custom-select">
                          <option selected disabled>Select one</option>
                          <option value="1" @if (  $brand->status == "1")
                                 {{ 'selected' }}
                          @endif>Active</option>
                          <option @if (  $brand->status == "0")
                            {{ 'selected' }}
                          @endif value="0">Deactive</option>
                        </select>
                        @error('status')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="photo">Photo</label>
                        <div class="custom-file mb-3">
                          <input type="file" class="custom-file-input" name="photo" id="photo">
                          <label class="custom-file-label" for="photo">Choose file</label>
                        </div>
                        @error('photo')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <input type="submit" class="btn btn-primary" value="Update Brand">
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