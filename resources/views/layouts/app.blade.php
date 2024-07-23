<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="stylesheet" href="{{ asset('css/css@3.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >
        <link href="{{ asset('css/custom.min.css') }}" rel="stylesheet">
        <style>
        
        pre code {
            display: block;
            padding: 10px;
            background-color: #f4f4f4;
            border: 1px solid #ddd;
            border-radius: 5px;
            user-select: all; /* Permite la selección del texto */
        }
        </style>

        <!-- datatable -->
        <link href="{{asset('css/datatables.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/dataTables.dataTables.css')}}" rel="stylesheet">
        <link href="{{asset('css/buttons.dataTables.css')}}" rel="stylesheet">
      <link href="https://cdn.datatables.net/searchbuilder/1.7.1/css/searchBuilder.dataTables.css" rel="stylesheet">


        <!-- Custom styles for this template -->
        <link href="{{asset('css/bootstrap-icons.min.css')}}" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">

        <link href="{{asset('fontawesome/css/font-awesome.min.css')}}" rel="stylesheet">
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                          <a href="index.html" class="site_title"> <span>HCDD</span></a>
                        </div>
                    
                        <div class="clearfix"></div>
                    
                        <!-- menu profile quick info -->
                        <div class="profile clearfix">
                          <div class="profile_pic">
                            <img src="{{ asset('img/dipu.png')}}" alt="..." class="img-circle profile_img">
                          </div>
                          <div class="profile_info">
                            <span>Bienvenido,</span>
                            <h2>{{ Auth::user()->name }}</h2>
                          </div>
                        </div>
                        <!-- /menu profile quick info -->
                    
                        <br />
                    
                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                          <div class="menu_section">
                            <h3>Menú</h3>
                            <ul class="nav side-menu">
                              
                              <li><a><i class="fa fa-bookmark" aria-hidden="true"></i> Novedades <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                  <li><a href="{{ route('buscar')}}">Ver</a></li>
                                </ul>
                              </li>
                              <li><a><i class="fa fa-user"></i> Personas <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                  <li><a href="{{ route('padron')}}">Padrón</a></li>
                                </ul>
                              </li>
                              <li><a>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-diagram-3" viewBox="0 0 16 16">
                                  <path fill-rule="evenodd" d="M6 3.5A1.5 1.5 0 0 1 7.5 2h1A1.5 1.5 0 0 1 10 3.5v1A1.5 1.5 0 0 1 8.5 6v1H14a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 2 7h5.5V6A1.5 1.5 0 0 1 6 4.5zM8.5 5a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5zM0 11.5A1.5 1.5 0 0 1 1.5 10h1A1.5 1.5 0 0 1 4 11.5v1A1.5 1.5 0 0 1 2.5 14h-1A1.5 1.5 0 0 1 0 12.5zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm4.5.5A1.5 1.5 0 0 1 7.5 10h1a1.5 1.5 0 0 1 1.5 1.5v1A1.5 1.5 0 0 1 8.5 14h-1A1.5 1.5 0 0 1 6 12.5zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm4.5.5a1.5 1.5 0 0 1 1.5-1.5h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z"/>
                                </svg>
                                Organigrama <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                   <li><a  href="{{route('areas')}}">Listado</a></li>
                                </ul>
                              </li>
                              <li><a><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
                                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
                              </svg> Justificaciones <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                  <li><a  href="{{route('justificaciones')}}">Listado</a></li>
                                </ul>
                              </li>
                              <li><a><i class="fa fa-clock-o" aria-hidden="true"></i> Relog <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                  <li><a href="{{route('relog')}}">Carga fichada</a></li>
                                  
                                </ul>
                              </li>
                              <li><a><i class="fa fa-calendar" aria-hidden="true"></i> Calendario <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                  <li><a href="{{route('calendario')}}">Consulta</a></li>
                                  
                                </ul>
                              </li>
                           
                            </ul>
                          </div>
                          
                    
                        </div>
                        <!-- /sidebar menu -->
                    
                        <!-- /menu footer buttons -->
                        <div class="sidebar-footer hidden-small">
                          <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                          </a>
                          <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                          </a>
                          <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                          </a>
                          
                          
                           <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="{{route('logout')}}" style="color: red;"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                        </form>
                          <!--<a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('profile.destroy')}}">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                          </a>-->
                        </div>
                        <!-- /menu footer buttons -->
                    
                    
                       
                      </div>
            

           
                </div>
                 <!-- top navigation -->
                 <div class="top_nav">
                    <div class="nav_menu">
                        <div class="nav toggle">
                          <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>
                        <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                          <li class="nav-item dropdown open" style="padding-left: 15px;">
                            <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                              <img src="{{asset('img/dipu.png')}}" alt="">{{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item"  href="javascript:;"> Profile</a>
                                <a class="dropdown-item"  href="javascript:;">
                                  <span class="badge bg-red pull-right">50%</span>
                                  <span>Settings</span>
                                </a>
                            <a class="dropdown-item"  href="javascript:;">Help</a>
                              <a class="dropdown-item"  href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                            </div>
                          </li>
              
                          <!--<li role="presentation" class="nav-item dropdown open">
                            <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                              <i class="fa fa-envelope-o"></i>
                              Pendientes<span class="badge bg-green">6</span>
                            </a>
                            <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                              <li class="nav-item">
                                <a class="dropdown-item">
                                  <span class="image"><img src="{{asset('img/dipu.png')}}" alt="Profile Image" /></span>
                                  <span>
                                    <span>John Smith</span>
                                    <span class="time">3 mins ago</span>
                                  </span>
                                  <span class="message">
                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                  </span>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="dropdown-item">
                                  <span class="image"><img src="{{asset('img/dipu.png')}}" alt="Profile Image" /></span>
                                  <span>
                                    <span>John Smith</span>
                                    <span class="time">3 mins ago</span>
                                  </span>
                                  <span class="message">
                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                  </span>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="dropdown-item">
                                  <span class="image"><img src="{{asset('img/dipu.png')}}" alt="Profile Image" /></span>
                                  <span>
                                    <span>John Smith</span>
                                    <span class="time">3 mins ago</span>
                                  </span>
                                  <span class="message">
                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                  </span>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="dropdown-item">
                                  <span class="image"><img src="{{asset('img/dipu.png')}}" alt="Profile Image" /></span>
                                  <span>
                                    <span>John Smith</span>
                                    <span class="time">3 mins ago</span>
                                  </span>
                                  <span class="message">
                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                  </span>
                                </a>
                              </li>
                              <li class="nav-item">
                                <div class="text-center">
                                  <a class="dropdown-item">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                  </a>
                                </div>
                              </li>
                            </ul>
                          </li>-->
                        </ul>
                      </nav>
                    </div>
                  </div>
                  <!-- /top navigation -->
            <!-- Page Content -->
            <div class="right_col" role="main">
                {{ $slot }}
            </div>
            <footer>
                <div class="pull-right">
                  Nancho <a href="https://colorlib.com">Nacho</a>
                </div>
                <div class="clearfix"></div>
              </footer>
        </div>
    </div>
        
                <!-- INICIO SCRIPTS -->
<script src="{{asset('jquery/dist/jquery.js')}}"></script>
<script src="{{asset('bootstrap/dist/js/bootstrap.js')}}"></script>
<script src="{{asset('js/chart.umd.js') }}" ></script>
<script src="{{asset('js/custom.js') }}"></script>
<script src="{{asset('bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{asset('js/custom.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/@floating-ui/dom@1.6.7"></script>


 <!-- datatable-->
 <script src="{{asset('js/jszip.js')}}"></script>
 <script src="{{asset('js/pdfmake.js')}}"></script>
 <script src="{{asset('js/vfs_fonts.js')}}"></script>
 <script src="{{asset('js/dataTables.js')}}"></script>
 <script src="{{asset('js/dataTables.buttons.js')}}"></script>
 <script src="{{asset('js/buttons.colVis.js')}}"></script>
 <script src="{{asset('js/buttons.html5.js')}}"></script>
 <script src="{{asset('js/buttons.print.js')}}"></script>
 <script src="https://cdn.datatables.net/searchbuilder/1.7.1/js/dataTables.searchBuilder.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
</body>
@stack('js')
    </body>
</html>
