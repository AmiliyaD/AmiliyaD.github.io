@extends('styles')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form action="{{ route('regUser') }}" method="post">
                @csrf
                <input type="text" class="form-control" name="name" placeholder="name">
            <input type="text" class="form-control" name="email" placeholder="email">
            <input type="text" class="form-control" name="password" placeholder="password">
            <button class="btn btn-success">Click</button>
            </form>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </div>
    </div>
</div>