@extends('layout.main')

@section('main')
<ul>
    @foreach($assets as $asset)
        <li>{{ $asset->name }}</li>
        <li>{{ $asset->status }}</li>
        <li>{{ $asset->created_at }}</li>
        <br>

    @endforeach
</ul>
@endsection
