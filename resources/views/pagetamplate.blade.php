<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <link rel="stylesheet" href="style.css">
	    <!-- CSS only -->
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	    <!-- JavaScript Bundle with Popper -->
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <style>
        .h1-text {
         margin-left: 125px; }

        button {
         border-radius: 10px; }

            .objects-row {
             margin-left: 100px;
            display: flex;
            flex-wrap: wrap; }

            .object-tipe-text .tipe {
            position: absolute;
         margin-top: 5px;
        margin-left: 5px;
        color: black;
         background-color: #FFE5D9; }

        .main {
         background-color: #F8EDEB;
         margin: auto; }
          .main .container {
           width: 70%;
           margin: auto; }

        .card {
         height: 100%; }

        @keyframes lol {
         from {
           transform: rotate(0); }
         to {
        transform: rotate(3); } }
        .header {
         background-color: #FEC5BB;
         width: 100%;
          display: flex;
         justify-content: space-around;
        align-items: center; }

        .image img {
          height: auto; }

        .header-logo {
          padding: 10px; }

        .header-site-name {
          font: 14pt sans-serif; }

        .bottom {
          color: #D8E2DC;
          background-color: #FEC89A;
          display: flex;
          justify-content: space-around; }

        /*# sourceMappingURL=style.css.map */

     </style>
 </head>
 <body>

@yield('modals')
@yield('toasts') 

 <div class="main">

    @include('header')
    
    <div class="h1-text">
	    <h1>
		    @yield('title')
	    </h1>
    </div>
  
    @yield('content')
  
	@include('futter')
  </div>

 @yield('scripts')
 
 </body>
</html>