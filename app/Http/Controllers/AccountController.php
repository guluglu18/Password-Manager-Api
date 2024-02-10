<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        // Dohvati trenutno prijavljenog korisnika
        $user = auth()->user();
        // Proveri da li korisnik postoji
        if (!$user) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        // Dohvati sve naloge povezane sa trenutno prijavljenim korisnikom
        $accounts = $user->accounts;
        return response()->json($accounts);
    }

    public function createAccount(User $user, Request $request)
{
    $request->validate([
        'account_name' => 'required|string',
        'website_url' => 'nullable|url',
        'username' => 'nullable|string',
        'password' => 'required|string',
        'note' => 'nullable|string',
    ]);

    $account = new Account([
        'account_name' => $request->input('account_name'),
        'website_url' => $request->input('website_url'),
        'username' => $request->input('username'),
        'password' => bcrypt($request->input('password')),  // Enkripcija lozinke
        'note' => $request->input('note'),
    ]);

    $user->accounts()->save($account);

    return response()->json([
        'status' => 'success',
        'message' => 'Account created successfully',
        'account' => $account,
    ], 201);
}

    public function show(Account $account)
    {
        $this->authorize('view', $account);
        return response()->json($account);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $this->authorize('create', Account::class);
        $account = $user->accounts->create($request->all());
        return response()->json($account, 201);
    }

    public function update(Request $request, Account $account)
    {
        $this->authorize('update', $account);
        $account->update($request->all());
        return response()->json($account);
    }

    public function destroy(Account $account)
    {
        $this->authorize('delete', $account);
        $account->delete();
        return response()->json(null, 204);
    }
}
