@if (Session::has('info'))
  <div class="row">
       <div class="col-4">
            <div class="alert alert-success alert-dismissible fade show smaller-font-size" role="alert">
              {{Session::get('info')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
       </div>
   </div>

@endif

@if (Session::has('danger'))

  <div class="row">
       <div class="col-4">
            <div class="alert alert-danger alert-dismissible fade show smaller-font-size" role="alert">
              {{Session::get('danger')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
       </div>
   </div>

@endif
@if (Session::has('warning'))

  <div class="row">
       <div class="col-4">
            <div class="alert alert-warning alert-dismissible fade show smaller-font-size" role="alert">
              {{Session::get('warning')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
       </div>
   </div>

@endif
