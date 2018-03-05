@extends ('layout.master')

@section ('content')

  <h1> Welcome to Ultimate Pc Builds. </h1>

  <form method="POST" action="/admin/addPost">
  <!-- security field -->
  {{ csrf_field() }}
  <div class="form-group">
    <label for="potTitleLabel">Post title</label>
    <input type="text" class="form-control" id="Title" name="title" placeholder="Enter post title">
  </div>
  <div class="form-group">
    <label for="postContentLabel">Content</label>
    <textarea class="form-control" id="Content" name="content" placeholder="Content"></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  
@endsection