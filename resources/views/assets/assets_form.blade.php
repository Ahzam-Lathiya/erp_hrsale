@extends('layout.main')

@section('main')
<form action="{{ route('login.authenticate') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <label>UserName</label>
  <input name="username" type="text">

  <label>Password</label>
  <input name="password" type="password">

  <label>Name</label>
  <input name="name" type="text">

  <label>Asset Type</label>
  <select name="asset_type_id">
    <option value="0">Select</option>
    <option value="1">Car</option>
    <option value="2">Bike</option>
    <option value="3">Laptop</option>
    <option value="4">Phone</option>
  </select>

  <label>Status</label>
  <input name="status" type="radio">

  <label>Date Created</label>
  <input name="created_at" type="date">

  <label>Save</label>
  <input type="submit">
</form>
@endsection
