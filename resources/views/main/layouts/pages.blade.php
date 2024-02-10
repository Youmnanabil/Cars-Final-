<!doctype html>
<html lang="en">

@include('main.includes.head')

  <body>

      @include('main.includes.header')

      @yield('content')
      
      @include('main.includes.footer')

    @include('main.includes.footerjs')

  </body>

</html>