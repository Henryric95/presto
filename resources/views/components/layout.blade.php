<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto.it</title>

{{-- font awesome --}}
<script src="https://kit.fontawesome.com/d4dfcbdbb0.js" crossorigin="anonymous"></script>

{{-- swiper js --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <!-- my css -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    
</head>

<body>

    
    <div class="min-vh-100">
        {{$slot}}
    </div>
    


 




    <x-footer></x-footer>
    {{-- swiper js --}}
    
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>