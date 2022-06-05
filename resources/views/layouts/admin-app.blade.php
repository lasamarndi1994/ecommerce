<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Custom fonts for this template-->
    @livewireStyles
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"
            integrity="sha512-rqQltXRuHxtPWhktpAZxLHUVJ3Eombn3hvk9PHjV/N5DMUYnzKPC1i3ub0mEXgFzsaZNeJcoE0YHq0j/GFsdGg=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/admin.min.css')}}" rel="stylesheet">
    @stack('css')

</head>

<body id="page-top">


    @guest
    {{$slot}}

    @else
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.home')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">E-Commerce<sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('admin.home')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.products')}}">
                    <i class="fas fa-cart-arrow-down"></i>
                    <span>Products</span></a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="{{route('admin.sale')}}">
                    <i class="fas fa-shopping-bag"></i>
                    <span>Slae</span></a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.orders')}}">
                <i class="fas fa-shopping-bag"></i>
                    <span>Orders</span></a>
            </li>
        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->

                        @livewire('auth.logout-component')
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @if(Session::has('success'))
                        <p class="alert alert-info">{{ Session::get('success') }}</p>

                    @endif

                    {{$slot}}

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    @endguest



    @livewireScripts
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/admin.min.js')}}"></script>

    <script src="{{asset('js/chart.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    @stack('js')

</body>

</html>
