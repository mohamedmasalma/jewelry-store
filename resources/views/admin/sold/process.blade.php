@extends('admin/app')

@section('inner')
@section('sold','m-menu__item--active  m-menu__item--active-tab')
@section('process_sold', 'm-menu__item--active')
<style type="text/css">
  .vodiapicker{
  display: none; 
}

#a{
  padding-left: 0px;
}

#a img, .btn-select img{
  width: 27px;
  
}

#a li{
  list-style: none;
  padding-top: 5px;
  padding-bottom: 5px;
}

#a li:hover{
 background-color: #F4F3F3;
}

#a li img{
  margin: 5px;
}

#a li span, .btn-select li span{
  margin-left: 30px;
}

/* item list */

.b{
  display: none;
  width: 100%;
  max-width: 400px;
  box-shadow: 0 6px 12px rgba(0,0,0,.175);
  border: 1px solid rgba(0,0,0,.15);
  border-radius: 5px;
  
}

.open{
  display: show !important;
}

.btn-select{

  width: 100%;
  max-width: 350px;
  height: 40px;
  border-radius: 5px;
  background-color: #fff;
  border: 1px solid #ccc;
 
}
.btn-select li{
  list-style: none;
  float: left;
  padding-bottom: 0px;
}

.btn-select:hover li{
  margin-left: 0px;
}

.btn-select:hover{
  background-color: #F4F3F3;
  border: 1px solid transparent;
  box-shadow: inset 0 0px 0px 1px #ccc;
  
  
}

.btn-select:focus{
   outline:none;
}


</style>
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

<table width="100%">
  <tr>
    <td style="padding: 25px;"> 

      <div class="row">

      <div class="form-group col-sm-4 ">
        <label class="form-label"> اختلر عنصر</label>
           <select class="vodiapicker">
            <option selected="select" id="nothing_selected" value="-1">لم يتم الاختيار</option>
            @foreach($all as $pro)
                  <option value="{{$pro['id']}}"  class="test" data-thumbnail="{{URL('storage/main_imgs/img'.$pro['id'].'.jpg')}}">{{$pro['name']}}</option>
            @endforeach      
            </select>

            <div class="lang-select">
            <button class="btn-select" value=""></button>
            <div class="b">
            <ul id="a"></ul>
         </div>
        </div>
      </div>
          <div class="form-group col-sm-2 ">
          <label class="form-label"> الكميه</label>
          <input type="text" id="pro_num" name="pro_number" class="form-control" required>
          </div>
              <div class="form-group col-sm-2 ">
              <label class="form-label"> سعر القطعه</label>
              <input type="text" id="pro_pri" name="pro_price"  class="form-control" required>
              </div> 

              <div class="form-group col-sm-2 ">
              <label class="form-label">سعر المبيع</label>
              <input type="text" id="pro_sell" name="pro_sell"  class="form-control" required>
              </div> 

               <div class="form-group col-sm-2 ">
               <button class="btn btn-success" 
               onclick="addToBasket()" style="margin-top: 24px">+</button>
             </div>
            
          </div>
            
</td>
</tr>
<tr>
    <td id="basket_row" style="background-color:#ccc2; padding: 20px;">
     <p style="text-align: center;"><b >  لم يتم اضافه اي عنصر
 </b></p>
    </td>
  </tr>
  <tr>
    <td style="padding: 25px;">
      
         <div class="container">
            <div class="row">
                <div class='col-sm-3'>
                    <div class="form-group">
                       <label class="form-label">تاريخ البيع</label>
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='text' class="form-control" id="date" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $(function () {
                        $('#datetimepicker1').datetimepicker();
                    });
                </script>

                  <div class="form-group col-sm-2 ">
                  <label class="form-label">المشتري</label>
                  <input type="text" id="basket_cus" name="customer"  class="form-control" required>
                  </div> 

                  <div class="form-group col-sm-2 ">
                  <label class="form-label">العدد النهائي</label>
                  <input type="text" id="final_num" name="final_num"  class="form-control" required>
                  </div>

                  <div class="form-group col-sm-2 ">
                  <label class="form-label">السعر النهائي</label>
                  <input type="text" id="final_price" name="final_price"  class="form-control" required>
                  </div>

                  <div class="form-group col-sm-2 ">
                  <button class="btn btn-primary" 
                  style="margin-top: 24px" onclick="save_basket();">اضف سله</button>
                  </div> 

            </div>
        </div>

        
    </td>
  </tr>
</table>

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
var pro = {!! json_encode($all->toArray()) !!};
var para = {products: [],basket: [],toedit:[]};
$( document ).ready(function() {
  var toEdit = {!! json_encode($b->toArray()) !!};
  var toEditPro = {!! json_encode($b->product->toArray()) !!};
  if(toEdit["date"]){
         $("#date").val(toEdit["date"]);
         $("#basket_cus").val(toEdit["customer"]);
         toEditPro.forEach(function(item){
        
       var add = {id:item["id"],price:item["pivot"]["price"],number:item["pivot"]["price"]};
       para.products.push(add);
         });
        para.toedit[0]=toEdit["id"];
       
         refreshBasket();
   
  }

});
 function addToBasket(){
    if ($('.btn-select').attr('value')!=-1 && $('#pro_pri').val()!="" && 
    $('#pro_num').val()!="") {
  var add = {id:$('.btn-select').attr('value'),price:$('#pro_sell').val(),number:$('#pro_num').val()};
  var val = para.products.find( function(item){ return item.id == add.id });
    
    if(para.products.includes(val)){alert("هذا العنصر موجود في السله");}
    else{para.products.push(add);
      refreshBasket();
    }
  
 }
}
 function popBasket(i){
  var val = para.products.find( function(item) { return item.id == i } );

  para.products.splice(i, 1);
   refreshBasket();
}
function refreshBasket(){
    $('#basket_row').html("");
    var f_price=0;
    var f_number=0;
  para.products.forEach(function(p){ 
    var val = pro.find( function(item) { return item.id == p.id } );
   $('#basket_row').html($('#basket_row').html()+"<div class=\"container-fluid\"><div class=\"row\"><div class=\"col-9 mt-3\"><div class=\"card\" height=\"7%\"><div class=\"card-horizontal\"style=\"display: flex;flex: 1 1 auto;\"><div class=\"img-square-wrapper\"><img  height=\"90px\" src=\"{!!URL('storage/main_imgs/img"+val.id+".jpg')!!}\" alt=\"Card image cap\"></div><div class=\"card-body\"><h4 class=\"card-title\">"+val.name+"</h4><p class=\"card-text\">"+val.info+" .<b> سعر القطعه:"+val.sell_price+".</b><p><b>سعر المبيع : "+p.price*p.number+"عدد القطع : "+p.number+"</b></p></p></div></div></div></div> <div class=\"form-group col-sm-2\"><button class=\"btn btn-danger\" onclick=\"popBasket("+jQuery.inArray( p, para.products )+")\" style=\"margin-top: 24px\">-</button></div></div></div>")

   
   f_number+=parseInt(p.number);
   f_price+=parseInt(p.price*p.number);
 }
     
   )
  $("#pro_num").val("");
   $("#pro_pri").val("");
    $("#pro_sell").val("");
   var text="لم يتم الاختيار";
    var item = '<li><span>'+ text +'</span></li>';
     $('.btn-select').html(item);
     $('.btn-select').attr('value', "-1");
      $("#final_price").val(f_price);
       $("#final_num").val(f_number);
}
function save_basket(){
  var basket = {date:$('#date').val(),price:$('#final_price').val(),number:$('#final_num').val(),customer:$('#basket_cus').val()};
  para.basket.push(basket);
   sendAjax();

}
function sendAjax(){
               $.ajaxSetup({
                  headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: '/admin/sell/process',
                  method: 'post',
                  data: {product:para.products,basket:para.basket,id:para.toedit},
                  success: function(result){
            document.location.href="{!! route('admin.sold'); !!}";
                  }});
              
         
}
    var langArray = [];
$('.vodiapicker option').each(function(){
  var img = $(this).attr("data-thumbnail");
  var text = this.innerText;
  var value = $(this).val();
  var item = '<li><img src="'+ img +'" alt="" value="'+value+'"/><span>'+ text +'</span></li>';
  langArray.push(item);
})

$('#a').html(langArray);

//Set the button value to the first el of the array
$('.btn-select').html(langArray[0]);

//change button stuff on click
$('#a li').click(function(){
   var img = $(this).find('img').attr("src");
   var value = $(this).find('img').attr('value');
   var text = this.innerText;
   var item = '<li><img src="'+ img +'" alt="" /><span>'+ text +'</span></li>';
  $('.btn-select').html(item);
  $('.btn-select').attr('value', value);
  $(".b").toggle();
  var val = pro.find( function(item) { return item.id == value } );
   $("#pro_pri").val(val.sell_price);
  //console.log(value);
});

$(".btn-select").click(function(){

        $(".b").toggle();
         
    });

//check local storage for the lang
var sessionLang = localStorage.getItem('lang');
if (sessionLang){
  //find an item with value of sessionLang
  var langIndex = langArray.indexOf(sessionLang);
  $('.btn-select').html(langArray[langIndex]);
  $('.btn-select').attr('value', sessionLang);
} else {
   var langIndex = langArray.indexOf('ch');
  console.log(langIndex);
  $('.btn-select').html(langArray[langIndex]);
  //$('.btn-select').attr('value', 'en');
}



</script>
@endsection