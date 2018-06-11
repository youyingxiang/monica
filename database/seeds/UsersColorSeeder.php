<?php

use Illuminate\Database\Seeder;
use App\Models\Contact\Contact;

class UsersColorSeeder extends Seeder
{
    /**
     * This is a one-time migration. It was used to populate the default
     * user color for the avatars when the feature got introduced.
     *
     * @return void
     */
    public function run()
    {
        $contacts = Contact::all();

        foreach ($contacts as $contact) {
            $contact->setAvatarColor();
        }
    }
}
