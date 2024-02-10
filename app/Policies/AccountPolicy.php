<?php

namespace App\Policies;

use App\Models\Account;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccountPolicy
{
    public function view(User $user, Account $account)
    {
        // Proverava da li korisnik može pregledati određeni nalog
        // Na primer, da li je korisnik vlasnik naloga
        return $user->id === $account->user_id;
    }

    public function create(User $user)
    {
        // Proverava da li korisnik može kreirati nove naloge
        return true; // Prilagodite ovo prema vašim potrebama i pravilima
    }

    public function update(User $user, Account $account)
    {
        // Proverava da li korisnik može ažurirati određeni nalog
        return $user->id === $account->user_id;
    }

    public function delete(User $user, Account $account)
    {
        // Proverava da li korisnik može brisati određeni nalog
        return $user->id === $account->user_id;
    }
}
