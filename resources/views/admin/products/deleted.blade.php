@extends('admin/app')

@section('inner')
@section('product','m-menu__item--active  m-menu__item--active-tab')
@section('product_deleted', 'm-menu__item--active')

<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-page__container m-body">
<!-- BEGIN: Left Aside -->

<div class="m-grid__item m-grid__item--fluid m-wrapper">
<div class="m-content"> 

@if (session('error'))
      <div class="alert alert-dismissible alert-danger">
      <strong>alert!</strong>   {{session('error')}}
      </div>       
     @endif

@if (session('success'))
      <div class="alert alert-dismissible alert-success">
      <strong>alert!</strong>   {{session('success')}}
      </div>       
     @endif
     @if (session('update'))
      <div class="alert alert-dismissible alert-primary">
      <strong>done!</strong>   {{session('update')}}
      </div>       
     @endif



<div class="myowndiv">

<div class="row">



<div class="col-sm-12">
  

<div class="m-widget11">

<div class="table-responsive">

<table class="table">
<!--begin::Thead-->
<thead>
<tr>
<td > #</td>
<td > صوره</td>
<td > الاسم</td>
<td >الكميه</td>
<td >السعر بالتركي</td>
<td>السعر بالكندي</td>
<td>االسعر الادنلى مع الشحن</td>
<td>سعر البيع</td>
<td>النوع</td>
</tr>
</thead>

<tbody>

  @foreach($all as  $key => $pro)
    <tr>
       <td > {{$key+1}}</td>
      <td >
       @if(file_exists('storage/main_imgs/img'.$pro['id'].'.jpg' ))
       <img width="70px" height="70px"
        src="{{URL('storage/main_imgs/img'.$pro['id'].'.jpg')}}" alt="No Img">
         @else
         <img width="70px" height="70px"
        src="{{URL('storage/add.png')}}" alt="No Img">
        @endif
      </td>
      <td>{{$pro['name']}}</td>
      <td align="center">{{$pro['quantity']}}</td>
      <td align="center">{{$pro['t_price']}}</td>
      <td align="center">{{$pro['k_price']}}</td>
      <td align="center">{{$pro['min_price']}}</td>
      <td align="center">{{$pro['sell_price']}}</td>
       <td align="center">{{$pro->cat['name']}}</td>
      <td>
        <div class="myown_btns">

  
   
    <form type="hidden" method="POST" action="{{route('admin.final.delete.pro')}}" enctype="multipart/form-data" >
              <input type="hidden" name="final_delete_id" value="{{$pro['id']}}">
  @csrf
   <button class="btn btn-success" onclick="retirvePro({{$pro['id']}})" >  استعاده</button>  
  <button class="btn btn-danger" type="submit"><i class="fa fa-times"> </i>  حذف نهالئي</button> 
 
</form>  

     </div> 

</td>
</tr>
@endforeach
</table>

</div>
</div>
</div>

</div>

</div>


</div>
</div>
</div>



<script type="text/javascript">

  function retirvePro(proId) {

         $.ajaxSetup({
                  headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: '/admin/retrive/pro',
                  method: 'post',
                  data: {id:proId},
                  success: function(result){
            location.reload();
                  }});
    }
    
</script>

@endsection