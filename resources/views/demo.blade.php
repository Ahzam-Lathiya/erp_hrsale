@extends('layout.main')

@section('main')
<form action="/demo" method="GET">
  <input type="text">
  <input type="number">
  <input type="radio">
  <input type="submit">
</form>
@endsection

<script>
  let value = '{{ $global_val }}';
  </script>