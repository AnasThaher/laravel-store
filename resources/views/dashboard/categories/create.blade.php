@extends('layouts.dashboard')

@section('title', 'Create Category')

@section('breadcrumb')
@parent
<li class="breadcrumb-item">Categories</li>
<li class="breadcrumb-item active">Create</li>
@endsection

@section('content')

    <form action="{{route('dashboard.categories.store')}}" method="post" class="p-3">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Category Name</label>
            <input  id="name" class="form-control" type="text" name="name" >
        </div>
        <div class="form-group mb-3">
            <label for="parent_id">Parent id </label>
            <select name="parent_id" id="" class="form-control">
                <option value="">on parent</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description" cols="20" rows="5"></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="name">Image</label>
            <input  id="image" class="form-control" type="file" name="image" >
        </div>
        <div class="form-group mb-3">

             <button class="btn btn-primary" class="form-control">Save</button>
             <a href="{{ route('dashboard.categories.index') }}" class="btn btn-light btn-outline-danger">Cancel</a>

        </div>
    </form>
@endsection
