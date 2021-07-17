<link rel="stylesheet" href="/app.css">
    <title>My blog</title>
</head>
<body>
<article>
    <h1> {{ $post -> title }} </h1>
    <div>
        {{ $post -> body }}
    </div>
</article>
<a href="/">Go back</a>
</body>
