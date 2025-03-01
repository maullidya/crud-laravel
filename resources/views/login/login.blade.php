@extends('layout.layout')
@section('title', 'Login')

<div class="container">
  <div class="mt-5 d-flex justify-content-center align-items-center">
    <div class="mt-5">
      @if ($errors->any())
        <div class="col-12">
          @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
          @endforeach
        </div>
      @endif

      @if (session()->has('error'))   
        <div class="alert alert-danger">{{session('error')}}</div>
      @endif

      @if (session()->has('success'))   
        <div class="alert alert-success">{{session('success')}}</div>
      @endif
      <h2 class="text-center">Login</h2>
      <form action="{{route('login.post')}}" method="POST" class="mx-auto mt-3" style="width: 500px">
        @csrf
        <div class="mb-3">
          <label class="form-label">Email </label>
          <input type="email" class="form-control" name="email">
        </div>
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="form-group">
        <label>Level</label>
        <select class="form-control" name="level">
          <option value="petugas">Petugas</option>
          <option value="admin">Admin</option>
          <option value="masyarakat">Masyarakat</option>
        </select>
      </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

      <div class="text-center mt-3">
        <p class="mb-0">Don't have an account? <a href="{{route('registration')}}" class="text-black-50 fw-bold">Register!</a></p>
      </div>
    </div>
  </div>
</div>
