@extends('layouts.admin')
@section('content')
<div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                     <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h6 class="card-title">Product Reviews</h6>
                                <div> 
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                 <div class="table-rsponsive">
                                        <table id="" class="table table-striped table-bordered">
                                           <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>title</th>
                                                <th>Comment</th>
                                                <th>Rating</th>
                                                <th>Status</th>
                                                 <th>Created At</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                  
                                        @if(count($reviews) > 0)
                                        @foreach ($reviews as  $sp)
                                            <tr>
                                                <td>
                                                    {{$sp->name}}
                                                </td> 
                                                <td>
                                                    {{$sp->email}}
                                                </td>
                                                <td>
                                                   {{$sp->title}}
                                                </td> 
                                                <td>
                                                    {{$sp->comment}}
                                                </td>  
                                                
                                                 <td>
                                                    <a href="#">{{$sp->rating}}</a>
                                                </td> 
                                                <td>
                                                    <a href="#">@if($sp->is_approved == 1 ) <span class="badge bg-success"> Approved</span> @else <span class="badge bg-info"> Pending </span> @endif</span> </a>
                                                </td>      
                                                  <td>
                                                    <a href="#">{{$sp->created_at->format('d/M/y')}}</a>
                                                </td>
                                            
                                                <td class="text-right">
                                                    <div class="dropdown">
                                                        <a href="#" data-toggle="dropdown">
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                        @if($sp->is_approved != 1)
                                                        <form method="post" action="{{route('product.status', $sp->hashid)}}" id="form2"> 
                                                              @csrf  
                                                              <input type="hidden" name="status" value="0">
                                                              <button type="submit"  class="dropdown-item" style="color:green">Approved</button>
                                                                 </form>
                                                       @endif
                                                       
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                              @endforeach
                                           
                                              @else 
                                              <tr>
                                              <td> No data available </td>
                                              </tr>
                                              @endif
                                            </tbody>
                                        </table>
                                    
                                    </div>
                                   
                                </div>
                                <div style="display: flex">
                                    {{ $reviews->links('pagination::bootstrap-5') }}
                                </div>
                              
                                
                            </div>
                        </div>
                    </div>
                </div>
                 </div>
                  </div>

@endsection

@section('script')
<script>

$('.clockpicker-example').clockpicker({
    autoclose: true
});

$('input[name="audition_date"]').daterangepicker({
  singleDatePicker: true,
  showDropdowns: true
});

let message = {!! json_encode(Session::get('message')) !!};
let msg = {!! json_encode(Session::get('alert')) !!};
//alert(msg);
toastr.options = {
        timeOut: 3000,
        progressBar: true,
        showMethod: "slideDown",
        hideMethod: "slideUp",
        showDuration: 200,
        hideDuration: 200
    };
if(message != null && msg == 'success'){
toastr.success(message);
}else if(message != null && msg == 'error'){
    toastr.error(message);
}
</script>
@endsection