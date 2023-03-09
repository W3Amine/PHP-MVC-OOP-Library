</head>

<body>
  <!-- START OF NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark  py-4 fixed-top">
    <div class="container-fluid col-md-10">
      <a class="navbar-brand fs-1" href="/">Library</a>
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
        aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbarColor01" style="">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li> -->
        </ul>
        <div class="d-flex">
          <div class="colorModeToggler">
            <span class="iconify fs-1 mx-3 pt-2 text-warning" data-icon="mdi:theme-light-dark"></span>
          </div>
          <?php if (is_guest()) {
            ?>
            <a href="/login"><button class="btn btn-primary btn-lg mx-2 px-5">Login</button></a>
            <a href="/register"> <button class="btn btn-success btn-lg mx-2 px-5">Register</button></a>
          <?php
          }
          ?>
          <?php if (!is_guest()) {
            ?>
            <?php if (is_admin()) {
              ?>
              <a class="mx-2" href="/items/add"><button class="btn btn-success" type="button">
                  ADD NEW ITEM
                </button> </a>
                <a class="mx-2" href="/schedulers"><button class="btn btn-danger" type="button">
                  RUN SCHEDULERS
                </button> </a>
                
            <?php
            }
            ?>
            <div class="btn-group">
              <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo getUser('Nickname'); ?>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="/profile">Profile</a></li>
                <li><a class="dropdown-item" href="/profile/edit">Edit Profile</a></li>
                <li><a class="dropdown-item" href="/items">items</a></li>
                <li><a class="dropdown-item" href="/logout">logout</a></li>
              </ul>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </nav>
  <!-- END OF NAVBAR -->