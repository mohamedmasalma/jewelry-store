@extends('admin/app')

@section('inner')
@section('category','m-menu__item--active  m-menu__item--active-tab')
@section('category_deleted', 'm-menu__item--active')

<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-page__container m-body">
<!-- BEGIN: Left Aside -->

<div class="m-grid__item m-grid__item--fluid m-wrapper">
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
<div class="d-flex align-items-center">
<div class="mr-auto">
  <div class="row">
 <h3 class="m-subheader__title m-subheader__title--separator">All Category</h3>


</div>
</div>

</div>
</div>
<!-- END: Subheader -->


<div class="m-content"> 

<div class="myowndiv">

<div class="row">



<div class="col-sm-12">
  

<div class="m-widget11">
  @if (session('error'))
      <div class="alert  alert-danger" role="alert">
      <strong>alert!</strong>   {{session('error')}}
      </div>       
     @endif
    @if (session('added'))
      <div class="alert  alert-success" role="alert">
      <strong>done!</strong>   {{session('added')}}
      </div>       
     @endif
  @if (session('delete'))
      <div class="alert  alert-danger" role="alert">
      <strong>done!</strong>   {{session('delete')}}
      </div>       
     @endif
       @if (session('update'))
      <div class="alert alert-primary" role="alert">
      <strong>done!</strong>   {{session('update')}}
      </div>       
     @endif


<div class="table-responsive">

<div class="accordion" id="accordionExample">
   @foreach($deleted as  $key => $del)
  <div class="card">
    <div class="card-header" id="headingOne">
      <div class="row">
        <div class="col-sm-4">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$del['id']}}" aria-expanded="true" aria-controls="collapse{{$del['id']}}">   <h5 class="mb-0"> {{$del['name']}}   </h5>  </button>
       
         </div>
    <div class="col-sm-2">product amount:  <b>{{count($del->product)}}</b> </div>
    @if($del['id']!=0) 
    <div class="myown_btnsv col-sm-6">
    <button class="btn btn-success" onclick="retriveCat({{$del['id']}})">retrive</button> 
    </div> 
    @endif
     </div>
     
    </div>

    <div id="collapse{{$del['id']}}" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        @if(count($del->product)>0 )
        <table class="table">
         <thead>
          <tr>
          <td > #</td>
          <td > Name</td>
          <td > Price</td>
          
          </tr>
          </thead>
          <tbody>
            @foreach($del->product as  $key => $pro)
            <tr>
            <td > {{$key+1}}</td>
            <td>{{$pro['name']}}</td>
            <td>{{$pro['price']}}</td>
     
            </tr>
     @endforeach
          </tbody>
          </table>
          
          @else
          empty
          @endif
      </div>
    </div>
  </div>
  
 @endforeach
</div>


</div>

</div>



</div>

</div>
</div>
</div>
</div>
</div>





<script type="text/javascript">
  function retriveCat(catId) {
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
          
        $.ajax({
            /* the route pointing to the post function */
            url: '/admin/retrive/cat',
            type: 'POST',
            /* send the csrf-token and the input to the controller */
            data: {_token: CSRF_TOKEN,id:catId
            },
            dataType: 'JSON',
            /* remind that 'data' is the response of the AjaxController */
            success: function (data) {
              location.reload();
              
            }
        });
    }
    
</script>
@endsection