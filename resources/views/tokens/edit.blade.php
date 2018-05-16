<!Doctype html>
<head>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

  <style>
    .label-widht{
      width: 100px;
    }

  </style>
</head>
  <body>
  <ul class="nav navbar-nav">
    <li><a href="{{ URL::to('tokens') }}">View All Tokens</a></li>
  </ul>

  <h1>Create a Token</h1>

  @if (count($errors) > 0)
  <div class="alert alert-danger">
      There were some problems adding the category.<br />
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
  @endif
  <div class="label-widht" style="margin-left: 1%">

    {!! Form::model($token, array('route' => array('tokens.update', $token->id), 'method' => 'PUT')) !!}

    <div>
        {!! Form::label('symbol', 'Symbol'); !!}
        {!! Form::text('symbol') !!}
    </div>
    <div>
        {!! Form::label('name', 'Name'); !!}
        {!! Form::text('name') !!}
    </div>
    <div>
        {!! Form::label('homepage', 'Homepage'); !!}
        {!! Form::text('homepage') !!}
    </div>
    <div>
        {!! Form::label('total_supply', 'Total supply'); !!}
        {!! Form::number('total_supply', null, ['min'=>0])!!}
    </div>
    <div>
        {!! Form::label('current_price', 'Current price'); !!}
        {!! Form::number('current_price', null, ['step'=>'any', 'min'=>0])!!}
    </div>
    <div>
        {!! Form::submit('Create token!', 
          array('class'=>'btn btn-primary'
        )) !!}
    </div>
  </div>
  {!! Form::close() !!}
  </div>
  </body>
</html>