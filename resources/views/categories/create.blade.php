@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{isset($category) ? 'Edit category' : 'Create category'}}
        </div>
        <div class="card-body">
            @if($errors->any())
                <ul class="list-group">
                    @foreach($errors->all() as $error)
                        <li class="list-group-item text-danger">
                            {{$error}}
                        </li>
                    @endforeach
                </ul>
            @endif
            <form action="{{isset($category) ? route('categories.update', $category->id): route('categories.store')}}" method="POST">
                @csrf
                @if(isset($category))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control" name="name"
                           value="{{isset($category) ? $category->name : ''}}">
                </div>
                <div class="form-group">
                    <button class="btn btn-outline-success">
                        {{isset($category) ? 'Save' : 'Add category'}}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection('content')