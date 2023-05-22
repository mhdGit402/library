    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Library Management System</title>
        <style>
            @font-face { font-family: Signika; src: url('/font/Signika-Medium.ttf'); } 
        </style>
        @vite('resources/js/app.js')
    </head>
    <body style="min-height: 100vh;display: flex;flex-direction: column;font-family: 'Signika';background-color:#ededed">
        
        <div id="header" style="background-color: #34495E;">
            @auth
                <header-component username="{{Auth::user()->name}}" :auth='true'></header-component>
            @endauth
            @guest
                <header-component :auth='false'></header-component>
            @endguest
        </div>