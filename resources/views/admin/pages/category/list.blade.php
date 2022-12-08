@extends('admin.master')
@section('title','All Category')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
                  {{-- Success Message Show --}}
                  @if ($message = Session::get('success'))
                  <div class="alert alert-success">
                      {{ $message }}
                  </div>
                 @endif
          <h3 class="card-title">Category</h3>
          <a class="btn btn-success btn-sm float-right" href="{{ route('category.create') }}">Create Category</a>
       
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th >
                          Id
                      </th>
                      <th>
                        Category Name
                      </th>
                      <th >
                          Slug
                      </th>
                     
                      <th class="text-center">
                          Status
                      </th>
                      <th>
                        Action
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($categories as $category )
                <tr>
                  <td>
                      {{ $category->id }}
                  </td>
                  <td>
                    {{ $category->name }}
                     
                  </td>
                  <td>
                    {{ $category->slug }}
                  </td>

                  <td class="project-state">
                    @if (  $category->status == "1" )
                        <span class="badge badge-success">Active</span>
                    @else
                        <span class="badge badge-danger">Deactive</span>
                    @endif
               
                  </td>
                  <td class="project-actions">
                 
                    <a class="btn btn-info btn-sm" href="{{ route('category.update',$category->id) }}">
                      <i class="fas fa-pencil-alt">
                      </i>
                      Edit
                  </a>
                  <a class="btn btn-danger btn-sm" href="{{ route('category.delete',$category->id) }}">
                      <i class="fas fa-trash">
                      </i>
                      Delete
                  </a>

                  </td>
              </tr>
                @endforeach
              
 
           
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
@endsection