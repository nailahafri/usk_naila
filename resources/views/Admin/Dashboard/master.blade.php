<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PERPUS65 | {{ $title }}</title>

  <!-- Tailwind is included -->
  <link rel="stylesheet" href="/css/main.css?v=1652870200386">
  <link rel="stylesheet" href="/cdn/selectize.default.min.css" integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
  <script src="/cdn/jquery.min.js"></script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="/cdn/js.js"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-130795909-1');
  </script>

</head>
<body>

<div id="app">

    <nav id="navbar-main" class="navbar is-fixed-top">
    <div class="navbar-brand">
        <a class="navbar-item mobile-aside-button">
        <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
        </a>
        <div class="navbar-item">
        </div>
    </div>
    <div class="navbar-brand is-right">
        <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
        <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
        </a>
    </div>
    <div class="navbar-menu" id="navbar-menu">
        <div class="navbar-end">
    
        <div class="navbar-item dropdown has-divider has-user-avatar">
            <a class="navbar-link">
            <div class="is-user-name"><span>{{ auth()->guard('admin')->user()->f_nama }}</span></div>
            <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
            </a>
            <div class="navbar-dropdown">
            <hr class="navbar-divider">
            <form action="/logout/admin" method="post">
                @csrf
                <button class="navbar-item">
                    <span class="icon"><i class="mdi mdi-logout"></i></span>
                    <span>Log Out</span>
                </button>
            </form>
            </div>
        </div>
        </div>
    </div>
    </nav>

    <aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
        <div>
        PERPUS<b class="font-black">65</b>
        </div>
    </div>
    <div class="menu is-menu-main">
        <p class="menu-label">General</p>
        <ul class="menu-list">
        <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
            <a href="/dashboard">
            <span class="icon"><i class="mdi mdi-monitor"></i></span>
            <span class="menu-item-label">Dashboard</span>
            </a>
        </li>
        </ul>
        <p class="menu-label">Menu</p>
        <ul class="menu-list">

        @if (Gate::allows('admin'))
            <li class="{{ Request::is('dashboard/admin-pustakawan*') ? 'active' : '' }}">
                <a href="/dashboard/admin-pustakawan">
                <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                <span class="menu-item-label">Admin / Pustakawan</span>
                </a>
            </li>
            <li class="{{ Request::is('dashboard/anggota*') ? 'active' : '' }}">
                <a href="/dashboard/anggota">
                <span class="icon"><i class="mdi mdi-account-group"></i></span>
                <span class="menu-item-label">Anggota</span>
                </a>
            </li>
            <li class="{{ Request::is('dashboard/buku*') ? 'active' : '' }}">
                <a href="/dashboard/buku">
                <span class="icon"><i class="mdi mdi-book-open-page-variant"></i></span>
                <span class="menu-item-label">Buku</span>
                </a>
            </li>
            <li class="{{ Request::is('dashboard/kategori*') ? 'active' : '' }}">
                <a href="/dashboard/kategori">
                <span class="icon"><i class="mdi mdi-tag-multiple"></i></span>
                <span class="menu-item-label">Kategori</span>
                </a>
            </li>
        @endif
        <li class="{{ Request::is('dashboard/entri-peminjaman*') ? 'active' : '' }}">
            <a href="/dashboard/entri-peminjaman">
            <span class="icon"><i class="mdi mdi-book-arrow-right"></i></span>
            <span class="menu-item-label">Entri Peminjaman</span>
            </a>
        </li>
        <li class="{{ Request::is('dashboard/entri-pengembalian*') ? 'active' : '' }}">
            <a href="/dashboard/entri-pengembalian">
            <span class="icon"><i class="mdi mdi-book-arrow-left"></i></span>
            <span class="menu-item-label">Entri Pengembalian</span>
            </a>
        </li>
        <li class="{{ Request::is('dashboard/laporan*') ? 'active' : '' }}">
            <a href="/dashboard/laporan">
            <span class="icon"><i class="mdi mdi-file-document"></i></span>
            <span class="menu-item-label">Laporan</span>
            </a>
        </li>
        </ul>
        
    </div>
    </aside>

    <section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <ul>
        <li>{{ auth()->guard('admin')->user()->f_level }}</li>
        <li>Dashboard</li>
        </ul>
    </div>
    </section>

    

    @yield('content')

    <footer class="footer">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
          <div class="flex items-center justify-start space-x-3">
            <div>
              © 2024, Naila
            </div>
          </div>
          
        </div>
      </footer>

</div>

<!-- Scripts below are for demo only -->
<script type="text/javascript" src="/js/main.min.js?v=1652870200386"></script>

<script type="text/javascript" src="/cdn/Chart.min.js></script>
<script type="text/javascript" src="/js/chart.sample.min.js"></script>
<script src="/cdn/selectize.min.js" integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



<noscript><img height="1" width="1" style="display:none" src="/cdn/tr.txt"/></noscript>

<!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
<link rel="stylesheet" href="/cdn/materialdesignicons.min.css">

</body>
</html>
