@extends('layouts.main');
@section('content')

<div class="container">
<form method="POST" action="{{route('user.post.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Title</label>
      <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter title">
    </div>
    <br>
    <input type="file" name="file">

    <div class="form-group">
        <br>

        <textarea  name="text" id="" cols="90" rows="20">
        </textarea>
    </div>
    <br>
    <p>Admission</p>
    <select class="form-control form-control-sm" name="admission">
        <option>Publish</option>
        <option>Private</option>
    </select>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>

<style>
    .container{
        width: 700px;
    }

</style>
@endsection
