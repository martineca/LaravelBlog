@extends ('layout.master')

@section ('content')
<!-- Step 1: Create the containing elements. -->
<h1> Admin panel:  {{ Auth::user()->name }} </h1>
<hr>
<div class="row">
  <div class="col-sm-4">
    <header>
      <div id="embed-api-auth-container"></div>
      <div id="view-selector-container"></div>
      <div id="view-name"></div>
      <div id="active-users-container"></div>
    </header>
  </div>
  <div class="col-sm-4">
    <div class="Chartjs">
      <h3>This Week vs Last Week (by sessions)</h3>
      <figure class="Chartjs-figure" id="chart-1-container"></figure>
      <ol class="Chartjs-legend" id="legend-1-container"></ol>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="Chartjs">
      <h3>This Year vs Last Year (by users)</h3>
      <figure class="Chartjs-figure" id="chart-2-container"></figure>
      <ol class="Chartjs-legend" id="legend-2-container"></ol>
    </div>
  </div>
  <div class="col-sm-4 Chartjs">
    <h3>Top Browsers (by pageview)</h3>
    <figure class="Chartjs-figure" id="chart-3-container"></figure>
    <ol class="Chartjs-legend" id="legend-3-container"></ol>
  </div>
  <div class="col-sm-4 Chartjs">
    <h3>Top Countries (by sessions)</h3>
    <figure class="Chartjs-figure" id="chart-4-container"></figure>
    <ol class="Chartjs-legend" id="legend-4-container"></ol>
  </div>


  <div class="col-sm-12">


    @if (count($posts) === 0)
    <p> No articles to manage.. Time to write a new one? </p>
    @else
    <h1> All articles: </h1>
    <hr>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col" class="text-center">Edit</th>
      <th scope="col" class="text-center">Delete</th>
    </tr>
  </thead>
  <tbody>
 
    @foreach ($posts as $post)
    <tr>
      <th scope="row">{{$post->id }}</th>
      <td>{{$post->title }}</td>
      <td class="text-center"> <a href='/admin/editPost/{{$post->id}}'> <i class="far fa-edit"></i> </a></td>
      <td class="text-center"><a href='/admin/delete/{{$post->id}}'> <i class="fas fa-trash"></i></a></td>
    </tr>  
     
  
      
   
    @endforeach
     </tbody>
</table>
 @endif



    <div class="row page-title-row">
      <div class="col-md-6">
        <h3>Tags <small>» Listing</small></h3>
      </div>
      <div class="col-md-6 text-right">
        <a href="/tag/addTag" class="btn btn-success btn-md">
          <i class="fa fa-plus-circle"></i> New Tag
        </a>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">

        <table id="tags-table" class="table table-striped table-bordered">
          <thead>
          <tr>
            <th>Name</th>
            <th></th>
            <th></th>
          </tr>
          </thead>
          <tbody>
          @foreach ($tags as $tag)
            <tr>
              <td>{{ $tag->name }}</td>
              <td>
                <a href="/admin/tag/{{ $tag->id }}/edit"
                   class="btn btn-xs btn-info">
                  <i class="fa fa-edit"></i> Edit
                </a>
              </td>
              <td>
                <a href="/tag/delete/{{ $tag->id }}"
                   class="btn btn-xs btn-danger">
                  <i class="fa fa-edit"></i> delete
                </a>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>

  </div><!-- end of col-sm-12 -->
</div><!-- end of row -->

  <script>
    $(function() {
      $("#tags-table").DataTable({
      });
    });
  </script>

<!-- Step 2: Load the library. -->
<script>
  (function(w,d,s,g,js,fs){
    g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(f){this.q.push(f);}};
    js=d.createElement(s);fs=d.getElementsByTagName(s)[0];
    js.src='https://apis.google.com/js/platform.js';
    fs.parentNode.insertBefore(js,fs);js.onload=function(){g.load('analytics');};
  }(window,document,'script'));
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>

<!-- Include the ViewSelector2 component script. -->
<script src="/js/embed-api/view-selector2.js"></script>

<!-- Include the DateRangeSelector component script. -->
<script src="/js/embed-api/date-range-selector.js"></script>

<!-- Include the ActiveUsers component script. -->
<script src="/js/embed-api/active-users.js"></script>

<!-- Include the CSS that styles the charts. -->
<link rel="stylesheet" href="/css/chartjs-visualizations.css">

<!-- main js file from https://ga-dev-tools.appspot.com/embed-api/third-party-visualizations/ -->
<script src="/js/embed-api/main.js"></script>




@endsection