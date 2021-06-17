<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0">Servis Motor</h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href="/user" class="{{ Request::is('user') ? 'active' : '' }}">Home</a></li>
          <li><a href="/mekanik" class="{{ Request::is('mekanik') ? 'active' : '' }}">Mekanik</a></li>
          <li><a href="/sparepart" class="{{ Request::is('sparepart') ? 'active' : '' }}">Sparepart</a></li>
          <li><a href="/pelanggan" class="{{ Request::is('pelanggan') ? 'active' : '' }}">Pelanggan</a></li>
          <li><a href="/servismotor" class="{{ Request::is('servismotor') ? 'active' : '' }}">Services Motor</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->
