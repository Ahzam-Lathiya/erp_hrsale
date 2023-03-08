@extends('layout.main')

@section('main')
<form action="{{ route('login.authenticate') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <label>UserName</label>
  <input name="username" type="text">

  <label>Password</label>
  <input name="password" type="password">

  <label>Save</label>
  <input type="submit">
</form>
@endsection
