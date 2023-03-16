@extends('layout.main')

@section('main')
<form id="asset_form" action="{{ route('resources.store') }}" method="POST" enctype="multipart/form-data">
  @csrf

  <label>Name</label>
  <input name="name" type="text">

  <label>Asset Type</label>
  <select name="asset_type_id">
    <option value="0">Select</option>
    <option value="1">Car</option>
    <option value="2">Phone</option>
    <option value="3">Bike</option>
    <option value="4">Laptop</option>
  </select>

  <label>Status</label>
  <select name="status">
    <option value="1">Active</option>
    <option value="0">Inactive</option>
  </select>
{{-- 
  <label>Date Created</label>
  <input name="created_at" type="date"> --}}

  <label>Save</label>
  <input id="form_submit_button" type="submit">
</form>

<script>
  let form = document.querySelector('#asset_form');
  let form_fetcher = new init_fetch(form.action, 30000);

  document.querySelector('#form_submit_button').addEventListener('click',function(){
    event.preventDefault();

    let form_obj = new FormData(form);

    form_fetcher.set_payload(form_obj);

    form_fetcher.call_request(function(response){
      console.log(response);

      if(response.status == false)
      {
        alert();
        return;
      }

      //location.href = response.redirect_url + '/' + response.insert_id;
      if(response.insert_id != 'undefined')
      {
        location.href = response.redirect_url
      }
    },
    function(error)
    {
      console.warn(error);
    },
    'post'
    );

  });

</script>

@endsection
