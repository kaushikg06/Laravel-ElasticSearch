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

<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Tools Hub, Overstock.com</title>

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
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="/">
        <img src="images/makefg.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Tools Hub
      </a>
      <form class="form-inline my-1 my-lg-0">
        <a class="btn btn-outline-secondary" data-toggle ="modal" data-target="#addModal" href ="#addModal">Add File?</a>
      </form>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <div class="dropdown">
            <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" data-toggle="dropdown">
              Departments 
            </a> 
            <ul class = "dropdown-menu">
              <a class="dropdown-item" href="Marketing.html">Marketing</a>
              <a class="dropdown-item" href="Data Science.html">Data Science</a>
              <a class="dropdown-item" href="SEO.html">SEO</a>
              <a class="dropdown-item" href="Finance.html">Finance</a>
              <a class="dropdown-item" href="Analytics.html">Analytics</a>
            </ul>
          </div>
          <form class="form-inline my-2 my-lg-0" action="{{ url('search') }}" method="get">
            <input class="form-control mr-sm-2" type="text" name="q" value="{{ request('q') }}" placeholder="Search">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
          </form>
        </ul>        
      </div>
    </nav>
      <!-- Example row of columns -->
    <div class = "jumbotron">
      <strong> Search Results </strong> <br/>
      <strong class="text-danger">{{ $articles->count() }} </strong> result(s) returned
      <div id="container">
        <div class="result">
          @forelse ($articles as $article)
          <a data-toggle ="modal" data-body = "{{ $article->body }}" data-tags="{{ $article->tags }}" data-title = "{{ $article->title }}" data-desc = "{{ $article->description }}" data-target="#articleModal" href ="#articleModal">{{ $article->title }} </a>
          <p class = "snippet">Tags: {{ $article->tags }} </p> 
          @empty
          <p class = "snippet">No articles found</p>
          @endforelse
          <span class="clearfix borda"></span>
        </div>  
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
                    <label for="titledetails"><strong> Title </strong> </label>
                    <input id = "titledetails" class="form-control" type = "text" readonly = true> </input>
                  </div>
                  <div class="form-group">
                    <label for="descriptiondetails"><strong> Description </strong> </label>
                    <input id = "descriptiondetails" class="form-control" type = "text" readonly = true> </input>
                  </div>
                  <div class="form-group">
                    <label for="tagsdetails"><strong> Tags </strong> </label>
                    <input id = "tagsdetails" class="form-control" type = "text" readonly = true> </input>
                  </div>
                  <div class="form-group">
                    <label><strong> File Content </strong></label>
                    <span class = "align-right"><a href="#" class="btn btn-default" id = "file" data-clipboard-target="#fileContent"><img src="images/copyclip.png" alt="Copy"></a> </span>
                    <textarea id = "fileContent" type="text" readonly = true class="form-control" rows="15" cols="50"></textarea>     
                  </div>
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn" data-dismiss="modal">Cancel</button>
            </div>
          </div>    
        </div>
        <!-- Add Modal-->
        <div class="modal fade bd-example-modal-lg" id="addModal" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-lg">
          <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header" style="padding:10px 10px;">
                <h4><span class="glyphicon glyphicon-lock"></span> Add File</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body" style="padding:40px 50px;">
                <form id = "uploadFormSearch" role="form">
                  <div class="form-group">
                    <input id = "titleIndex" name = "titleIndex" class="form-control" type = "text" placeholder="Title" > </input>
                  </div>
                  <div class="form-group">
                    <input id = "tagsIndex" name = "tagsIndex" class="form-control" type = "text" placeholder="Tags (comma separated. Ex: SQL, PHP etc)"> </input>
                  </div>
                  <div class="form-group">
                    <input id = "deptIndex" name = "deptIndex" class="form-control" type = "text" placeholder="Department"> </input>
                  </div>
                  <div class="form-group">
                    <input id = "repoIndex" name = "repoIndex" class="form-control" type = "text" placeholder="Repository Link"> </input>
                  </div>
                  <div class="form-group">
                    <label for="descIndex"><strong> Description </strong> </label>
                    <textarea id = "descIndex" name = "descIndex" class="form-control" type = "text" placeholder="Description - What is this script about?"> </textarea>
                  </div>
                  <div class="form-group">
                    <label for="bodyIndex"><strong> Paste Script </strong> </label>
                    <textarea id = "bodyIndex" name = "bodyIndex" class="form-control" type = "text" placeholder="Paste the Script" rows = 15> </textarea>
                  </div>
                  <div align = "center"> OR </div>
                  <div>
                    <label for="attachFile"><strong> Attach Script </strong> </label>
                    <input type="file" id="attachFile" name = "attachFile">
                  </div>
                  <div class="modal-footer">
                    <input type="submit" value = "Add File"  class="btn btn-primary">
                    <button type="button" class="btn" data-dismiss="modal">Cancel</button>
                  </div>
                </form>
              </div>
            </div>
          </div>    
        </div>

        <div class="modal fade" id="thankyouModal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4><span class="glyphicon glyphicon-lock"></span>Success!</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div class="alert alert-success">
                  <strong> Added the script successfully! </strong>
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
      $('#articleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var body = button.data('body')
        var title = button.data('title')
        var tags = button.data('tags')
        var desc = button.data('desc')
        // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-body textarea').val(body)
        modal.find('#titledetails').val(title)
        modal.find('#tagsdetails').val(tags)
        modal.find('#descriptiondetails').val(desc)
        $('#file').tooltip({
        trigger: 'click',
        placement: 'top'
        });

        function setTooltip(btn, message) {
          $(btn).tooltip('hide')
          .attr('data-original-title', message)
          .tooltip('show');
        }

        function hideTooltip(btn) {
          setTimeout(function() {
            $(btn).tooltip('hide');
          }, 1000);
        }

        // Clipboard
        var clipboard = new Clipboard('#file');
        clipboard.on('success', function(e) {
          setTooltip(e.trigger, 'Copied!');
          hideTooltip(e.trigger);
        });

        clipboard.on('error', function(e) {
          setTooltip(e.trigger, 'Failed!');
          hideTooltip(e.trigger);
        });

      })

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $('#uploadFormSearch').on('submit', function(e){
        e.preventDefault();
        var requestData = new FormData($("#uploadFormSearch")[0]);
        $.ajax({
          url: '/addScript',
          type: 'post',
          data: requestData,
          processData: false,
          contentType: false,
          success: function(data){
             $("#thankyouModal").modal('toggle');
             $("#addModal").modal('hide');
          }
        });
      });

    </script>
  </body>
</html>