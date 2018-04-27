@extends ('layout.master')

@section ('content')
<script src='/js/tinymce/tinymce.min.js'></script>
<script src='/js/tinymce/init.js'></script>

<h1> Write a new article </h1>

<form method="POST" action="/admin/addPost" enctype="multipart/form-data">
	<!-- security field -->
	{{ csrf_field() }}
	<input type='hidden' id='selectedTags'name="selectedTags" value="[]"/>
	<div class="form-group">
		<label for="potTitleLabel">Post title</label>
		<input type="text" class="form-control" id="Title" name="title" placeholder="Enter post title" >
	</div>
	<div class="form-group">
		<label for="postContentLabel">Content</label>
		<textarea class="form-control" id="content" name="content" placeholder="Content"></textarea>
	</div>

	<div class="form-group">
		 <label class="d-block" for="articleImage">Heading image</label>
		 <input type="file" name="image" accept="image/*">
	</div>

	<div class="form-group">
		 <label class="d-block" for="articleImage">Select from available tags</label>
		 <select class="form-control" id="selectedTag" style="max-width:150px;display:inline-block;">
		 @foreach ($tags as $tag)
			<option value="{{ $tag->id }}">{{ $tag->name }}</option>
		 @endforeach
		</select>
		<button type="button" class="btn btn-primary" onclick="addTag()">Add</button>
	</div>
	<div class="form-group">
		 <label class="d-block" for="articleImage">Selected tags</label>
		 <div class="selectedTagsWrap">
			
		 </div>
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-primary">Submit</button>
	</div>


	@include ('layout.formErrors')
	
</form>

<script>
function addTag(){
	var id = $('#selectedTag').val();
	var name =$('#selectedTag option:selected').text();
	var currentTagIds = $('#selectedTags').val();
	var ids = JSON.parse(currentTagIds);
	for (var i = 0; i < ids.length; i++){
	// check if that tag is already added
		if (ids[i] == id){
			//if it is, do nothing
			return;
			}
	}
	ids.push(id);
	$('#selectedTags').val(JSON.stringify(ids)); //store array
	$('.selectedTagsWrap').append('<span class="badge badge-primary">'+name+'  <span class="remove" onclick="removeTag()">x</span>')
}
</script>

@endsection
