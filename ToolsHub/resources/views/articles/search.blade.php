<?  ?>

<!DOCTYPE html>
<html lang="en">
<head>

<link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap/bootstrap.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script> 
<script src="js/jquery/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.7.1/clipboard.min.js"></script>
<script>window.__theme = 'bs4';</script>

    <!-- Custom styles for this template -->
    <style>
  .modal-header, h4, .close {
      background-color: #5cb85c;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
  </style>
</head>

  <body>

    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="/">Tools Hub</a>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <form class="form-inline my-2 my-lg-0" action="{{ url('search') }}" method="get">
          <input class="form-control mr-sm-2" type="text" name="q" value="{{ request('q') }}" placeholder="Search">
          <button class="btn btn-outline-secondary" type="submit">Search</button>
        </form>
      </div>
    </nav>
      <!-- Example row of columns -->
    <div class = "jumbotron">
    <strong> Search Results </strong> <br/>
    <strong class="text-danger">{{ $articles->count() }} </strong> result(s) returned
    <div id="container">
    <div class="result">
        @forelse ($articles as $article)
        <a data-toggle ="modal" data-whatever = "{{ $article->body }}" data-title = "{{ $article->title }}" data-target="#articleModal" href ="#articleModal">{{ $article->title }} </a>
        <p class = "snippet">Tags: {{ implode(', ', $article->tags ?: []) }} </p> 
            @empty
                <p class = "snippet">No articles found</p>
            @endforelse
            <span class="clearfix borda"></span>
    
    <div class="modal fade bd-example-modal-lg" id="articleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:10px 10px;">
          <h4><span class="glyphicon glyphicon-lock"></span> Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form">
          <div class="form-group">
              <label for="title"><strong> Title </strong> </label>
              <input id = "title" class="form-control" type = "text" readonly = true> </input>
            </div>
        <div class="form-group">
              <label for="description"><strong> Description </strong> </label>
        </div>
        <div class="form-group">
              <label for="tags"><strong> Tags </strong> </label>
        </div>
 
        <div class="form-group">
              <label><strong> File Content </strong></label>
              <span class = "align-right"><a href="#" class="btn btn-default" id = "file" data-clipboard-target="#fileContent">Copy</a> </span>
              <textarea id = "fileContent" type="text" readonly = true class="form-control" rows="15" cols="50"></textarea>
               
        </div>

        </div>
          </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">Cancel</button>
        </div>
      </div>    
    </div>
  </div>
  </div>
    </div>
  </div> 

 <!-- /container -->

 <div class="footer">
      <div class = "text-center">
        <p>&copy; Tools Hub, Overstock.com 2017</p>
      </div>
</div>

<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#articleModal").modal();
    });
    
});

$('#articleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var body = button.data('whatever')
    var title = button.data('title')
     // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-body textarea').val(body)
    modal.find('.modal-body input').val(title)
    var clipboard = new Clipboard('#file')
})
</script>
  </body>

</html>