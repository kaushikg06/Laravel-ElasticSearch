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

  </head>

  <body>

    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
        
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="/">
        <img src="images/makefg.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Tools Hub</a>
      <form class="form-inline my-1 my-lg-0">
      <a class="btn btn-outline-secondary" data-toggle ="modal" data-target="#addModal" href ="#addModal">Add File?</a>
        </form>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav ml-auto">
      
        <div class="dropdown">
        <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" data-toggle="dropdown">
                Departments </a> <ul class = "dropdown-menu">
                <a class="dropdown-item" href="Marketing.html">Marketing</a>
                <a class="dropdown-item" href="Data Science.html">Data Science</a>
                <a class="dropdown-item" href="SEO.html">SEO</a>
                <a class="dropdown-item" href="Finance.html">Finance</a>
                <a class="dropdown-item" href="Analytics.html">Analytics</a>
                </ul>
          </div>
        </ul>
     </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1 class="display-3">Tools Hub</h1>
        <p>Search for code scripts, files and other tools you might need! </p>
      </div>
      <form action="{{ url('search') }}" method="get">
      <div id ="custom-search-input">
        <div class = "input-group">
            <input type = "text" name="q" value="{{ request('q') }}" class = "search-query form-control" placeholder="Search">
                <div class = "input-group-btn">
                    <button class="btn btn-default" type="submit">Search</button>
                </div>
        </div>
      </div>
      </form>
    </div>
    <!-- Modal content-->
        <div class="modal fade bd-example-modal-lg" id="addModal" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header" style="padding:10px 10px;">
                <h4><span class="glyphicon glyphicon-lock"></span> Add File</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body" style="padding:40px 50px;">
                <form id = "uploadFormIndex" role="form" enctype="multipart/form-data">
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
    
    <div id = "footer">
      <div class = "container text-center">
        <p>&copy; Tools Hub, Overstock.com 2017</p>
      </div>
    </div> <!-- /container -->
    <script>
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $('#uploadFormIndex').on('submit', function(e){
        e.preventDefault();
        var requestData = new FormData($("#uploadFormIndex")[0]);
        $.ajax({
          url: '/addScript',
          type: 'POST',
          processData: false,
          contentType: false,
          data: requestData,
          success: function(data){
            $("#thankyouModal").modal('toggle');
            $("#addModal").modal('hide');
          }
        });
        
      });

    </script>
  </body>
</html>
