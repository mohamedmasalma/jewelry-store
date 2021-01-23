@extends('admin/app')

@section('inner')
@section('product','m-menu__item--active  m-menu__item--active-tab')
@section('product_add', 'm-menu__item--active')

<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-page__container m-body">
<!-- BEGIN: Left Aside -->

<div class="m-grid__item m-grid__item--fluid m-wrapper">

<div class="m-content"> 

@if (session('error'))
      <div class="alert alert-dismissible alert-danger">
      <strong>alert!</strong>   {{session('error')}}
      </div>       
     @endif
     @if (session('added'))
      <div class="alert alert-dismissible alert-success">
      <strong>done!</strong>   {{session('added')}}
      </div>       
     @endif
<div class="myowndiv">
<form  method="POST" id="create_admin_camp_form" action="{{route('admin.store.product')}}" enctype="multipart/form-data" >

  @csrf
<div class="row">
 


<div class="form-group col-sm-6 ">
<label class="form-label"> اسم العنصر</label>
<input type="text" name="pro_name" id="pro_name_id" class="form-control" required>
</div>

<div class="form-group col-sm-6 ">
<label class="form-label">السعر بالتركي</label>
<input type="text" name="pro_t_price" id="pro_t_price_id" class="form-control" required>
</div>

<div class="form-group col-sm-6 ">
<label class="form-label">السعر بالكندي</label>
<input type="text" name="pro_k_price" id="pro_k_price_id" class="form-control" required>
</div>

<div class="form-group col-sm-6 ">
<label class="form-label">السعر الادنى مع الشحن</label>
<input type="text" name="pro_ship_price" id="pro_ship_price_id" class="form-control" required>
</div>

<div class="form-group col-sm-6 ">
<label class="form-label">سعر المبيع</label>
<input type="text" name="pro_sell_price" id="pro_sell_price_id" class="form-control" required>
</div>



<div class="form-group col-sm-6 ">
<label class="form-label"> العدد</label>
<input type="text" name="pro_num" id="pro_num_id" class="form-control" required>
</div>


<div class="form-group  col-sm-6">
<label class="form-label"> تصنيف العنصر </label>
<select class="form-control" id="myselect" name="pro_cat" >  
<option value="" selected="select">اختر</option>
@foreach($cat as $cats)
<option value={{$cats["id"]}} >{{$cats["name"]}}</option>
@endforeach

</select>

<button type="button" class="btn btn-info" id="showCatBoxBtn"><i class="fas fa-plus-circle"></i></button>
<strong>اضهط هنا لاضافه تصنيف جديد</strong>
<br>
<div id='addCatBox' style="display: none;">
  <label class="form-label"> اسم التصنيف</label>
 <input  type="text" id="cat_name" name="not" class="form-control" >
 <button type="button" id="submitCatBoxBtn" class="btn btn-info"><i class="fas fa-plus-circle"></i></button>
</div>
 
</div>

 <div class="form-group  col-sm-6">
    <label for="exampleFormControlTextarea1">معلومات اضافيه عن العنصر</label>
    <textarea class="form-control" name="pro_info" id="pro_info_id" rows="3"></textarea>
  </div>
<div class="form-group  col-sm-6">

   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addImgsModel">
 اضف صوره للعنصر
</button>
</div>





<div class="form-group  col-sm-12">
<input type="hidden" name="pro_to_edit" id="pro_to_edit_id" >
<button type="submit" style="margin-top: 20px; " class="btn btn-success">احفظ المعلومات</button>
</div>



</div>
<input type="file" onchange="readURL(this,'#addMainImg')" class="form-control-file" name="mainImage" id="mainImage" hidden>

</form>

</div>



</div>






</div>
</div>



<!-- imgs -->
<div class="modal fade" id="addImgsModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">أضف صوره</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="addImgsBody">
      <div class="form-group ">
     
            
             <img id='addMainImg' style="margin: auto;"  width="200px" height="200px" src="{{URL('storage/add.png')}}" alt="empty" >
      
     
     
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">اضف</button>
      </div>
    </div>
  </div>
</div>
<!-- End imgs -->

<script type="text/javascript">

        $(document).ready(function(){
          

           $("#showCatBoxBtn").click(function(){
             $("#addCatBox").css("display", "block");
          });

          $("#addMainImg").click(function(){
          $("#mainImage").trigger("click");
          
          });   
          
        

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $("#submitCatBoxBtn").click(function(){
              if($("#cat_name").val()==''){$("#addCatBox").css("display", "none");}
              else{
                $.ajax({
                    /* the route pointing to the post function */
                    url: '/admin/store/cat',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, message:$("#cat_name").val()},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) {
                      var select=$('#myselect');
                      var option = document.createElement("option");
                      option.setAttribute("value", data.msg['id']);
                      option.setAttribute("selected", 'select');
                      option.innerHTML = data.msg['name'];
                      select.append(option);
                      $("#addCatBox").css("display", "none");
                      
                    }
                });
              }
           
           });
  var toEdit = {!! json_encode($edit_pro->toArray()) !!};
  if(toEdit["name"]){
         $("#pro_name_id").val(toEdit["name"]);
          $("#pro_t_price_id").val(toEdit["t_price"]);
           $("#pro_k_price_id").val(toEdit["k_price"]);
            $("#pro_ship_price_id").val(toEdit["min_price"]);
             $("#pro_sell_price_id").val(toEdit["sell_price"]);
             $("#pro_num_id").val(toEdit["quantity"]);
              $("#pro_info_id").val(toEdit["info"]);
              $("#pro_to_edit_id").val(toEdit["id"]);
              $("#myselect").val(toEdit["id"]);

            }
       });    
    </script>
@endsection