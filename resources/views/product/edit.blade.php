@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('product.update',$product->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="panel panel-headline">
                            <div class="panel-heading">
                                <h3 class="panel-title">Edit Form</h3>
                            </div>
                            <div class="panel-body mt-3">
                                <div class="body">
                                    <div class="form-group">
                                        <label for="name" class="">Name</label>
                                        <div class="">
                                            <input type="text" id="name" class="form-control" name="name" value="{{$product->name}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="price" class="">Price</label>
                                        <div class="">
                                            <input type="text" id="price" class="form-control" name="price" value="{{$product->price}}"  required>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success col-md-12 my-4 py-2" id="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
