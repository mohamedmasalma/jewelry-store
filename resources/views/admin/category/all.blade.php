@extends('admin/app')

@section('inner')
@section('category','m-menu__item--active  m-menu__item--active-tab')
@section('category_all', 'm-menu__item--active')

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

<div class="accordion" id="accordionExample">
   @foreach($all as  $key => $cat)
  <div class="card">
    <div class="card-header" id="headingOne">
      <div class="row">
        <div class="col-sm-2">
          @if(file_exists('storage/cat_imgs/img'.$cat['id'].'.jpg' ))
        <img  width="90px" height="90px" src="{{URL('storage/cat_imgs/img'.$cat['id'].'.jpg')}}" alt="empty">
          @else
          <img  width="90px" height="90px" src="{{URL('storage/add.png')}}" alt="empty">
          @endif
      </div>
        <div class="col-sm-2">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$cat['id']}}" aria-expanded="true" aria-controls="collapse{{$cat['id']}}">   <h5 class="mb-0"> {{$cat['name']}}   </h5>  </button>
       
         </div>
    <div class="col-sm-2">product amount:  <b>{{count($cat->product)}}</b>
     </div>
     @if($cat['id']!=1)

    <div class="myown_btnsv col-sm-6">
         <form type="hidden" method="POST" action="{{route('admin.delete.cat')}}" enctype="multipart/form-data" >
              <input type="hidden" name="delete_cat_id" value="{{$cat['id']}}">
  @csrf
   

    <button class="btn btn-danger" type="submit" ><i class="fa fa-times"> </i>  حذف
    </button> 
  </form>
  <form type="hidden" enctype="multipart/form-data" >
   <button class="btn btn-success" onclick="editCat('{{$cat["name"]}}',{{$cat['id']}})" data-toggle="modal" data-target="#editCatModel"><i class="fa fa-edit"> </i>  تعديل</button>
 </form>
    </div> 
    @endif
     </div>
     
    </div>

    <div id="collapse{{$cat['id']}}" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        @if(count($cat->product)>0 )
        <table class="table">
         <thead>
          <tr>
          <td > #</td>
          <td > Name</td>
          <td > Price</td>
          <td >change category</td>
          </tr>
          </thead>
          <tbody>
            @foreach($cat->product as  $key => $pro)
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
            <td>{{$pro['name']}}</td>
            <td>{{$pro['sell_price']}}</td>
            <td >
      <form  method="POST" id="editCatForm" action="{{route('admin.update.pro')}}" enctype="multipart/form-data" >
      @csrf
      <div class="row">  
        <select class="form-control col-sm-8" id="changeCatSelect" name="change_cat" >  
        <option  value={{$cat["id"]}} selected="select">{{$cat["name"]}}</option>
        @foreach($all as $cate)
        <option value={{$cate["id"]}} >{{$cate["name"]}}</option>
        @endforeach
        </select>
         <input type="hidden" name="pro_id" value="{{$pro['id']}}" class="form-control ">
        <button type="submit" id="changeCatBtn" class="btn btn-info col-sm-2">ok</button>
      </div>  
      </form>
            </td>
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

<!-- EDIT -->
<div class="modal fade" id="editCatModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">تعديل النوع</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form  method="POST" id="editCatForm" action="{{route('admin.edit.cat')}}" enctype="multipart/form-data" >
      @csrf
      <div class="modal-body" id="editCatBody">
     
       <div class="form-group  ">
       <label class="form-label">  اسم النلوع </label>
       <input type="text" name="cat_name" id="editCatText" class="form-control ">
       <input type="file" onchange="readImg(this,'#catImg')" class="form-control-file" name="catImage" id="catImage" hidden>
        <input type="hidden" name="cat_id" id="editCatId" class="form-control ">
       </div>
       <img id="catImg" width="90px" height="90px" src="{{URL('storage/add.png')}}" alt="empty">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="createCatBtn" class="btn btn-primary">Edit</button>
      </div>
     </form>
    </div>
  </div>
</div>
<!-- End EDIT -->


<script type="text/javascript">
function readImg(input,img) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(img)
                    .attr('src', e.target.result)
                    .width(90)
                    .height(90);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    
          
 $("#catImg").click(function(){
 $("#catImage").trigger("click");
  });

  function editCat(cat_name,cat_id) {
    $('#editCatForm #editCatText').val(cat_name);
    $('#editCatForm #editCatId').val(cat_id);
    }
     function deleteCat(cat_name,cat_id) {
    $('#deleteCatForm #deleteCatLabel').html(cat_name);
    $('#deleteCatForm #deleteCatId').val(cat_id);
    }
    
    $('#deleteAllCatBtn').click(finalDelete);
    $('#deleteCatBtn').click(finalDelete);
       

    
</script>
@endsection