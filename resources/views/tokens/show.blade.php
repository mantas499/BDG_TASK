<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('tokens') }}">View All Tokens</a></li>
        <li><a href="{{ URL::to('tokens/create') }}">Create a Token</a>
    </ul>
</nav>

<h1>Showing {{ $token->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $token->name }}</h2>
        <p>
            <strong>Homepage:</strong> {{ $token->homepage }}<br>
            <strong>Symbol:</strong> {{ $token->symbol }}
        </p>
    </div>

</div>
</body>
</html>