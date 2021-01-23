@extends('admin/app')

@section('inner')
@section('product','m-menu__item--active  m-menu__item--active-tab')
@section('product_all', 'm-menu__item--active')




<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-page__container m-body">
<!-- BEGIN: Left Aside -->

<div class="m-grid__item m-grid__item--fluid m-wrapper">
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
<div class="d-flex align-items-center">
<div class="mr-auto">
  <div class="row">
 <h3 class="m-subheader__title m-subheader__title--separator">كل المنجات</h3>


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
      <td > {{$key}}</td>
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

<td> <div class="myown_btns">
  <button class="btn btn-primary"
   onclick="showPro('{{$pro['name']}}','{{$pro->cat['name']}}','{{$pro['price']}}','{{$pro['info']}}')" data-toggle="modal" data-target="#showProModel"> <i class="fa fa-eye"></i> View </button>

  <button class="btn btn-success" 
  onclick="editPro('{{$pro['id']}}')" 
  ><i class="fa fa-edit"> </i>  Edit</button>
 

    <button class="btn btn-danger" onclick="deletePro('{{$pro['name']}}',{{$pro['id']}})" data-toggle="modal" data-target="#deleteProModel"><i class="fa fa-times"> </i>  Delete</button>   

 <form type="hidden" method="POST" action="{{route('admin.edit_display.product')}}" enctype="multipart/form-data" id="edit_pro_form" >
              <input type="hidden" name="edit_id" value="{{$pro['id']}}">
  @csrf
</form>
   
</div> 


</td>
</tr>
@endforeach
</table>



</div></div>



</div>

</div>








</div>










</div>
</div>
</div>




<!-- delete -->
<div class="modal fade" id="deleteProModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Delete Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form  method="POST" id="deleteProForm" action="{{route('admin.delete.pro')}}" enctype="multipart/form-data" >
      @csrf
      <div class="modal-body" id="editProBody">
     
       <div class="form-group  ">
       Delete <b id="valueToDelete"></b> Are you sure?? <label class="form-label" id="deleteCatLabel" >  </label>
        <input type="hidden" name="pro_id" id="deleteProId" class="form-control ">
       </div>
     

      </div>
      <div class="modal-footer">
        
        <button type="submit"  class="btn btn-danger">Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
     </form>
    </div>
  </div>
</div>
<!-- End delete -->


<!-- show -->
<div class="modal fade" id="showProModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">show Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
      <div class="modal-body" id="editProBody">
     
       <div class="form-group  ">
       product name:<b id="viewProName"></b><br>
       product Price:<b id="viewProPrice"></b><br>
       product category:<b id="viewProCat"></b><br>
       product informations:<b id="viewProInfo"></b>
      </div>
      <div class="modal-footer">

      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End show -->





<script type="text/javascript">
 function editProUrl(input,img) {
        if (input.files && input.files[0]) {
         var reader = new FileReader();

            reader.onload = function (e) {
                $(img)
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }


   function openImgInput(id){
    $(id).trigger('click');
   }

   function deletePro(pro_name,pro_id) {
    $('#deleteProForm #valueToDelete').html(pro_name);
    $('#deleteProForm #deleteProId').val(pro_id);
    }


      function showPro(pro_name,cat,price,info) {
      $('#viewProName').html(pro_name);
      $('#viewProPrice').html(price);
      $('#viewProCat').html(cat);
      $('#viewProInfo').html(info);
      }
    function editPro(id) {
     
   $("#edit_pro_form").submit();

      }
  </script>
@endsection