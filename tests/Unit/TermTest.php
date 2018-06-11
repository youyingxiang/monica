<?php

namespace Tests\Unit;

use App\User;
use App\Models\Account\Account;
use Tests\TestCase;
use App\Models\Settings\Term;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TermTest extends TestCase
{
    use DatabaseTransactions;

    public function test_it_belongs_to_many_users()
    {
        $account = factory(Account::class)->create([]);
        $user = factory(User::class)->create(['account_id' => $account->id]);
        $term = factory(Term::class)->create([]);
        $term->users()->sync($user->id);

        $user = factory(User::class)->create(['account_id' => $account->id]);
        $term = factory(Term::class)->create([]);
        $term->users()->sync($user->id);

        $this->assertTrue($term->users()->exists());
    }
}
