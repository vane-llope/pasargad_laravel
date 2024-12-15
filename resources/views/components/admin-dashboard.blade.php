<div class="wrapper" onclick="closeSidebar(event)">
  <div class="sidebar" id="sidebar" data-color="orange">
      <div class="logo">
          <a href="./dashboard.html" class="d-flex text-light nav-link h3">
              <i class="bi bi-speedometer2 m-2 my-0"></i>
              <p class="me-3">Dashboard</p>
          </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
          <ul class="nav">
              <li><a href="/stones/manage"><i class="bi bi-bricks"></i> <p>Stone</p></a></li>
              <li><a href="/mines/manage"><i class="bi bi-minecart-loaded"></i> <p>Mine</p></a></li>
              <li><a href="/articles/manage"><i class="bi bi-card-text"></i> <p>Article</p></a></li>
              <li><a href="/projects/manage"><i class="bi bi-buildings-fill"></i> <p>Project</p></a></li>
              <li><a href="/stoneTypes/manage"><i class="bi bi-hammer"></i> <p>Stone Type</p></a></li>
              <li><a href="/projectTypes/manage"><i class="bi bi-building-fill-check"></i> <p>Project Type</p></a></li>
              <li class="active-pro">
                  <a href="./upgrade.html"><i class="bi bi-door-open-fill"></i>
                      <form action="/user/logout" method="POST">
                          @csrf
                          <button class="btn text-light" type="submit">logout</button>
                      </form>
                  </a>
              </li>
          </ul>
      </div>
  </div>
  <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent bg-primary navbar-absolute">
          <div class="container-fluid">
              <div class="navbar-wrapper">
                  <div class="navbar-toggle">
                      <button type="button" class="navbar-toggler" onclick="toggleSidebar(event)">
                          <span class="navbar-toggler-bar bar1"></span>
                          <span class="navbar-toggler-bar bar2"></span>
                          <span class="navbar-toggler-bar bar3"></span>
                      </button>
                  </div>
                  <a class="fw-bold h5 nav-link text-light" href="#pablo">Pasargad</a>
              </div>
              <div class="collapse navbar-collapse justify-content-end" id="navigation">
                  @include('partials._search')
              </div>
          </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm"></div>
      <div class="content">{{ $slot }}</div>
  </div>
</div>




<script>
  function toggleSidebar(event) {
      event.stopPropagation();
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('active');

      const mainPanel = document.getElementById('main-panel');
      mainPanel.classList.toggle('active');
  }

  function closeSidebar(event) {
      const sidebar = document.getElementById('sidebar');
      if (!sidebar.contains(event.target) && sidebar.classList.contains('active')) {
          sidebar.classList.remove('active');
          const mainPanel = document.getElementById('main-panel');
          mainPanel.classList.remove('active');
      }
  }

  document.addEventListener('click', function(event) {
      const sidebar = document.getElementById('sidebar');
      if (!sidebar.contains(event.target) && sidebar.classList.contains('active')) {
          sidebar.classList.remove('active');
          const mainPanel = document.getElementById('main-panel');
          mainPanel.classList.remove('active');
      }
  });
</script>
