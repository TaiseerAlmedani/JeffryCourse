<link rel="stylesheet" href="/app.css">

 <?php foreach ($posts as $post) : ?>
<article>
 <h1>
     <a href="posts/{{ $post -> slug }}">
        {{ $post -> title }}
    </a>

    </h1>
 <div>
     {{ $post -> excerpt }}
 </div>
</article>
<?php endforeach; ?>
