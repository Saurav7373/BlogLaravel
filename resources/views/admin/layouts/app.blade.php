<!DOCTYPE html>
<html lang="en">

<head>
    
    @include('admin.layouts.head')
</head>

<body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">
    @include('admin.layouts.header')
    @include('admin.layouts.sidebar')
    @section('content')
    @show
    @include('admin.layouts.footer')
   
    
    </div>
</body>

</html>