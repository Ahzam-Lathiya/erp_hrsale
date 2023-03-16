@extends('layout.main')

@section('main')

<button>
    <a href={{ $add_asset_link }} target="_blank">Add Asset</a>
</button>

<ul>
    @foreach($assets as $asset)
        <li>{{ $asset->name }}</li>
        <li>{{ $asset->status }}</li>
        <li>{{ $asset->created_at }}</li>
        <br>

    @endforeach
</ul>
@endsection
