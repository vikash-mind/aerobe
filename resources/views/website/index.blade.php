@extends('layouts.app')
@php     
    $meta_title = $websettingInfo->meta_title;
    $meta_description = $websettingInfo->meta_description;
    $meta_keyword = $websettingInfo->meta_keyword;
@endphp
@section('pageclass', 'home')
@section('pageTitle', 'Aerobe Consultant Pvt. Ltd')
@section('metaTitle', $meta_title)
@section('metaDescription', $meta_description)
@section('metaKeywords', $meta_keyword)
@section('content')

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            background: #ffffff;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        h1 {
            font-size: 2rem;
            color: #333;
        }
        p {
            font-size: 1.2rem;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Our Website is Launching Soon</h1>
        <p>We are working hard to bring you something amazing. Stay tuned for updates.</p>
        <p>Thank you for your patience!</p>
    </div>
</body>




@endsection