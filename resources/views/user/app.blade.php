<!DOCTYPE html>
<html lang="en">

<head>

  @include('user/layouts/head')

  
</head>

<body>

  <!-- Navigation -->
  @include('user/layouts/header')
   @yield('main-content')
   
  <!-- Footer -->
  <footer>
    @include('user/layouts/footer')
  </footer>



</body>

</html>