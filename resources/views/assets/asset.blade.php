@extends('layout.main')

@section('main')
<div>
    <p>{{ $asset[0]->name }}</p>
    <p>{{ $asset[0]->status }}</p>
    <p>{{ $asset[0]->created_at }}</p>
    <p>{{ $asset[0]->updated_at }}</p>
</div>
@endsection
