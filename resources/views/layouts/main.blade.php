<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

         
         <link rel="stylesheet" href="{{asset('css/materialize.min.css')}}">
         <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
         <link rel="preconnect" href="https://fonts.gstatic.com">
         <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
         <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
         <style>
             body{
                 background-color: #F3F4F6;
                font-family: 'Raleway', sans-serif;
             }
             h1, h2 ,h3, h4, h5{
                font-family: 'Montserrat', sans-serif;
             }

             .dim{
                filter:brightness(50%);
             }

             .gutter-sizer { width: 1%; }


/* clear fix */
.grid:after {
  content: '';
  display: block;
  clear: both;
}

/* ---- .grid-item ---- */

.grid-sizer,
.grid-item {
  width: 32.333%;
  margin-bottom: 10px;
}

.grid-item {
  float: left;
  border-radius: 25px;
}

.grid-item img {
  display: block;
  max-width: 100%;
  border-radius: 25px;
}
@media only screen and (max-width: 550px) {
    .grid-sizer,
.grid-item {
  width: 49%;
  margin-bottom: 10px;
}
.gutter-sizer { width: 1%; }
}
         </style>
    <title>Property</title>
</head>
<body>
    <header>
        <x-navigation />
    </header>

    <main>
        @yield('content')
    </main>

     <!-- Compiled and minified JavaScript -->
     <script src="{{asset('js/jquery.js')}}"></script>
     <script src="{{asset('js/materialize.min.js')}}"></script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
     <script src="{{asset('js/main.js')}}"></script>
     <script src="{{asset('js/editor.js')}}"></script>
     <script src="{{asset('js/axios.js')}}"></script>
     @yield('scripts')
</body>
</html>