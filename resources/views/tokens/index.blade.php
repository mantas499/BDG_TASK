<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

        <title>Laravel</title>

    </head>
    <body>
        <ul class="nav navbar-nav">
        </ul> 
        <form action="/tokens/create"> 
        <div>    
            <button class="btn btn-primary">Add
            </button>
        </div>
        </form>
        <div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Symbol</th>
                        <th>Name</th>
                        <th>Homepage</th>
                        <th>Total supply</th>
                        <th>Current price</th>
                        <th>Edit/Remove</th>
                    </tr>
                </thead>
                    <tbody>
                        @forelse($tokens as $item)
                        <tr>
                        <td> {{$item->id}} </td>
                        <td> {{$item->symbol}} </td>
                        <td> {{$item->name}} </td>
                        <td> {{$item->homepage}} </td>
                        <td> {{$item->total_supply}} </td>
                        <td> {{$item->current_price}} </td>
                        <td>
                        <a href="{{ URL::to('tokens/' . $item->id . '/edit') }}" class="btn btn-success">Edit</a>
                            <form action="{{ route('tokens.destroy', $item->id) }}"method="POST"
                            style="display: inline"
                                  onsubmit="return confirm('Are you sure?');">
                                <input type="hidden" name="_method" value="DELETE">
                                {{ csrf_field() }}
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                     @empty
                    <tr>
                        <td colspan="6">No entries found.</td>
                    </tr>
                    @endforelse
               </tbody>
            </table>
            {{ $tokens->links() }}
        </div>
    </body>
</html>
