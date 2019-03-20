@if (Session::has('info'))
   <div class="row">
       <div class="col">
            <div class="alert alert-info" role="alert">
                    {{Session::get('info')}}
            </div>
       </div>
   </div>


@endif

@if (Session::has('danger'))
   
<div class="row">
        <div class="col">
             <div class="alert alert-danger" role="alert">
                     {{Session::get('danger')}}
             </div>
        </div>
    </div>

@endif
@if (Session::has('warning'))
   
<div class="row">
        <div class="col">
             <div class="alert alert-warning" role="alert">
                     {{Session::get('warning')}}
             </div>
        </div>
    </div>

@endif

