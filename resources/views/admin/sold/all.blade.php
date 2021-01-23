@extends('admin/app')

@section('inner')
@section('sold','m-menu__item--active  m-menu__item--active-tab')
@section('sub_sold', 'm-menu__item--active')

<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-page__container m-body">
<!-- BEGIN: Left Aside -->

<div class="m-grid__item m-grid__item--fluid m-wrapper">



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



</div>

</div>

<div class="accordion" id="accordionSold">
   @foreach($bask as  $key => $basket)
  <div class="card">
    <div class="card-header" id="headingOne">
      <div class="row">
        <div class="col-sm-2">
          <img  width="90px" height="90px" src="{{URL('storage/add.png')}}" alt="empty">
      </div>
        <div class="col-sm-2">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$basket['id']}}" aria-expanded="true" aria-controls="collapse{{$basket['id']}}">   <h5 class="mb-0"> {{$basket['date']}}   </h5> 
         </button>
       
         </div>
    <div class="col-sm-4">
      <b>كميه العناصر:   {{$basket["number"]}},
    السعر الكلي:   {{$basket["price"]}},
    اسم المشتري  :{{$basket["customer"]}}</b>    
     </div>
    
    <div class="col-sm-1">
    
    <form  method="POST" action="{{route('admin.sold.edit')}}" enctype="multipart/form-data" >
  @csrf
  <input type="hidden" name="edit_id" value="{{$basket['id']}}">
  <button class="btn btn-success" type="submit"><i class="fa fa-edit"> </i>  Edit</button>
</form> 
</div>
<div class="col-sm-1">
   <form  method="POST" action="{{route('admin.sold.delete')}}" enctype="multipart/form-data" >
  @csrf
      <input type="hidden" name="delete_id" value="{{$basket['id']}}">
    <button class="btn btn-danger" type="submit" data-toggle="modal" data-target="#deleteCatModel"><i class="fa fa-times"> </i>  Delete
    </button>
     </form>
   </div>
    
     </div>
     
    </div>

    <div id="collapse{{$basket['id']}}" class="collapse " aria-labelledby="headingOne" data-parent="#accordionSold">
      <div class="card-body">
        @if(count($basket->product)>0 )
        <table class="table">
         <thead>
          <tr>
          <td > #</td>
          <td > الاسم</td>
          <td > سعر البيع </td>
          <td >سعر البيع الفعلي</td>
           <td >العدد</td>
          </tr>
          </thead>
          <tbody>
            @foreach($basket->product as  $key => $pro)
            <tr>
            <td >      
              <div class="col-sm-2">
             @if(file_exists('storage/main_imgs/img'.$pro['id'].'.jpg' ))
            <img  width="90px" height="90px" src="{{URL('storage/main_imgs/img'.$pro['id'].'.jpg')}}" alt="empty">
              @else
              <img  width="90px" height="90px" src="{{URL('storage/add.png')}}" alt="empty">
              @endif
          </div>
          </td>
            <td>{{$pro["name"]}}</td>
            <td>{{$pro["sell_price"]}}</td>
            <td>{{$pro->pivot->price}}</td>
            <td>{{$pro->pivot->number}}</td>
    
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


<script type="text/javascript">
    
     function deleteBasket(id){
      $.ajaxSetup({
                  headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: '/admin/sell/process',
                  method: 'post',
                  data: {id:id},
                  success: function(result){
                     alert(result);
                  }});

     }    

    
</script>
@endsection