<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Christine Baca">
  <meta name="author" content="Sharon Bryat">

  <title>Rise and Grind</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
  <!-- Custom styles for this template -->
    <link href="css/startbootstrap-blog-home.css" rel="stylesheet">
    <link href="css/profile.css" rel="stylesheet">

</head>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="home.html">
        <img src="assets/icons/barista/png/055-paper.png" width="30" height="30" alt="logo">
      </a>
      <a class="navbar-brand" href="home.html">Rise and Grind</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarHome">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="profile.html">Profile
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout-handler.php">Logout
              <span class="sr-only">(current)</span>
            </a>
          </li>
        </ul>
      </div>
  </nav>

  <?php session_start(); ?> 
  <!-- redirection if not logged in. -->
  <?php if (!isset($_SESSION['user'])) header("Location: http://localhost/my-project/webPl-project/webPL/login-handler.php");?>
  <!-- News Article Header -->
  <h1 class="my-4 text-center">Welcome, <?php echo $_SESSION['user'] ?></h1>
  <h1 class="my-4 text-center">News Articles</h1>

  <!-- Search Widget -->
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="input-group mb-4">
        <input type="text" class="form-control" placeholder="Search for...">
        <span class="input-group-append">
            <button class="btn btn-secondary" type="button">Go!</button>
        </span>
      </div>
    </div>
  </div>

  <div class="container articles">
    <!-- Filters -->
    <div class="col justify-content-end">
      <!-- <div class="card"> -->
        <!-- <h5 class="card-header">Filters</h5> -->
        <h5>Filters</h5>
        <!-- <div class="card-body"> -->
          <div class="row">
            <div class="col-lg-6">
              <ul class="list-unstyled mb-0"> <!-- TODO: Research effective filtering...> -->
                <li>
                  <p>Credibility</p>
                </li>
                <li>
                  <a href="#">Date</a>
                </li>
                <li>
                  <a href="#">Publisher</a>
                </li>
              </ul>
            </div>
          </div>
        <!-- </div> -->
      <!-- </div> -->
    </div>

    <div class="col-md-8">
      <!-- Tabs -->
      <ul class="nav nav-tabs" id="homeTabs" role="mainTabs">
        <li class="nav-item">
          <a class="nav-link active" id="top-trending" data-toggle="tab" href="#toptrending" role="tab" aria-controls="toptrending" onclick="tabChanging('top-trending')">Top Trending</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="world-news" data-toggle="tab" href="#worldnews" role="tab" aria-controls="worldnews" onclick="tabChanging('world-news')">World News</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="sports" data-toggle="tab" href="#sports" role="tab" aria-controls="sports" onclick="tabChanging('sports')">Sports</a>
        </li>
      </ul>
      <br>
      
      <!-- Tab Content -->
      <div class="tab-content" id="tabContent">
        <div class="tab-pane fade show active" id="tab-top-trending" role="tabpanel" aria-labelledby="toptrending">
          <!-- Blog Post top trending tab-->
          <div class="card mb-4">
            <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title">News Header -- Trending</h2>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
              <a href="reading.html" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on January 1, 2020
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="tab-world-news" role="tabpanel" aria-labelledby="worldnews">
          <!-- Blog Post world news tab-->
          <div class="card mb-4">
            <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title">News Header -- World News</h2>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
              <a href="reading.html" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on January 1, 2020
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="tab-sports" role="tabpanel" aria-labelledby="sports">
          <!-- Blog Post sports news tab-->
          <div class="card mb-4">
            <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title">News Header -- Sports</h2>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
              <a href="reading.html" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on January 1, 2020
            </div>
          </div>
        </div>
      </div>
       
      <!-- Pagination -->
      <div class="row">
        <div class="col-md-10">
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- shuffle button -->
    <a class="sticky">
      <img src="assets/icons/barista/png/038-cup.png" width="80" height="80" alt="shuffle">
    </a> <!-- TODO: Google buttons? Going over footer? --> 
  </div>
  <!-- End of filters and content -->
  
  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <p class="m-0">Copyright &copy; Your Website 2020</p>
    <div>Icons made by <a href="https://www.flaticon.com/authors/smashicons" title="Smashicons">Smashicons</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
  </footer>
  <!-- Tab changing -->
  <script>
    function tabChanging (tabID){
      // change active styling
      var tabs = document.getElementsByClassName("nav-link");
      for (i=2; i < tabs.length; i++) {
        tabs[i].classList.remove('active')
      }
      var tab = document.getElementById(tabID);
      tab.classList.add('active');

      // for content switch
      var tabContent = document.getElementsByClassName("tab-pane");
      for (i=0; i < tabContent.length; i++) {
        tabContent[i].classList.remove('show');
        tabContent[i].classList.remove('active');
      }
      var newID = "tab-" + tabID;
      var newContent = document.getElementById(newID);
      if (!newContent.classList.contains('show')) {
        newContent.classList.add('show');
        newContent.classList.add('active');
      }
    }
  </script>

</body>


</html>