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

        if(is_null($token))
        {
            return \Redirect::route('tokens.index')->with('message', 'Token do not exist!');; 
        }
        return view('tokens.edit')->with('token', $token);
    }

    public function update($id, CreateTokenFormRequest $request)
    {
        $token = Token::find($id);

        $token->id = $id;
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

    public function destroy($id)
    {
        $token = Token::find($id);
        $token->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the token!');
        return \Redirect::route('tokens.index');
    }
}
