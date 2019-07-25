<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Monthly Report Portal</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('DataTables/datatables.min.css') }}" rel="stylesheet">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        body {
            font-size: 0.8rem;
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>

<body>
    
    <nav class="navbar navbar-dark fixed-top bg-primary flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0 text-center" href="#">CSTD</a> {{-- <input class="form-control w-100"
            type="text" placeholder="Search" aria-label="Search"> --}}
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">

        <div class="row">

            @include('sidebar')

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 my-4 py-4" style="background-color: #edeef9">
                <div class="card">
                    <div class="card-body">
                        @yield('content')
                    </div>
                </div>
            </main>

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="{{ asset('js/popper.js') }}" type="text/javascript">
        <script src="{{ asset('bootstrap/js/bootstrap.js') }}" type="text/javascript">
    <script src="{{ asset('js/bootstrap-confirmation.min.js') }}" type="text/javascript">
    <script src="{{ asset('js/dashboard.js') }}">
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    </script>

    <script>
        $(document).ready(function() {

            $('.datatable').DataTable();


            window.Laravel =
            <?php echo json_encode([
                        'csrfToken' => csrf_token(),
                    ]); ?>

        //empty modal content
        $('body').on('hidden.bs.modal', '.modal', function () {
            $(this).removeData('bs.modal');
        });

        });
    </script>
</body>

</html>



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="padding: 40px">
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="padding: 40px">
      <div class="modal-body">

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="basicModal">
  <div class="modal-dialog">
    <div class="modal-content" style="padding: 40px">

      <div class="modal-body">
        <div class="te">
          
        </div>
      </div>

    </div>
  </div>
</div>

<div class="modal fade custom-width" id="fixedModal">
  <div class="modal-dialog" style="width: 60%; margin: 0 auto;">
    <div class="modal-content" style="padding: 20px">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body" id="modal_body" style="max-height: calc(100vh - 210px); overflow-y: auto;">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>

    </div>
  </div>
</div>

