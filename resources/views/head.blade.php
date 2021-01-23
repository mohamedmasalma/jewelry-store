<!DOCTYPE html>
<html lang="en" >
<!-- begin::Head -->
<head>
<meta charset="utf-8" />
<title>Aydın!</title>
<meta name="description" content="Blank inner page examples">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
 <meta name="_token" content="{{csrf_token()}}" />

<script src="{{asset('admin/js/webfont.js')}}"></script>
<script>
WebFont.load({
google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700","Asap+Condensed:500"]},
active: function() {
sessionStorage.fonts = true;
}
});
</script>

<link href="{{asset('admin/css/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{asset('admin/css/jquery.timepicker.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/css/mycss.css')}}">


<link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" />
<script src="{{asset('admin/js/jquery.js')}}"></script>
<script src="{{asset('admin/js/jquery.timepicker.min.js')}}"></script>