<?php

namespace App\Http\Controllers;

use App\Token;
use App\Http\Requests\CreateTokenFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;
use App\Http\Controllers\Redirect;

class TokenListController extends Controller
{
    public function index()
    {
    	$tokens = Token::paginate(5);
    	return view('tokens.index', compact('tokens', $tokens));
    } 

    public function create()
    {
        return view('tokens.create');
    }

    public function store(CreateTokenFormRequest $request)
    {
        $token = new Token;

        $token->symbol = $request->get('symbol');
        $token->name = $request->get('name');
        $token->homepage = $request->get('homepage');
        $token->total_supply = $request->get('total_supply');
        $token->current_price = $request->get('current_price');

        $token->save();

        return \Redirect::route('tokens.index', 
            array($token->id))
            ->with('message', 'Token has been created!');
    }

    public function edit($id)
    {
        $token = Token::find($id);

        return view('tokens.edit')->with('token', $token);
    }

    public function update($id)
    {
        $token = Token::find($id);

        $token->id = $id;
        $token->symbol = Input::get('symbol');
        $token->name = Input::get('name');
        $token->homepage = Input::get('homepage');
        $token->total_supply = Input::get('total_supply');
        $token->current_price = Input::get('current_price');

        $token->save();

        return \Redirect::route('tokens.index', 
            array($token->id))
            ->with('message', 'Token has been created!');
    }

    public function destroy($id)
    {
        $token = Token::find($id);
        $token->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the token!');
        return \Redirect::route('tokens.index');
    }
}
