<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Type;
use App\Models\Card;
use App\Models\Joined;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // Users
        User::create(
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'admin',
                'remember_token' => str_random(10),
            ]
        ); 
        User::create(
            [
                'name' => 'alex',
                'email' => 'alex@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'redac',               
                'remember_token' => str_random(10),
            ]
        ); 
        User::create(
            [
                'name' => 'serg',
                'email' => 'serg@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'user',                
                'remember_token' => str_random(10),
            ]
        ); 
        User::create(
            [
                'name' => 'helen',
                'email' => 'helen@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'user',                
                'remember_token' => str_random(10),
            ]
        ); 

        // Types
        Type::create(
            [
                'name' => 'debit',
            ]
        ); 
        Type::create(
            [
                'name' => 'deposit',
            ]
        ); 
        Type::create(
            [
                'name' => 'credit',
            ]
        );              

        // Cards
        Card::create(
            [
                'type_id' => 1, 
                'name' => 'Debit-UAH', 
                'title' => 'The Banana Republic Visa® Debit Card rewards you for shopping at Banana Republic and at sister brands under the Gap Inc. umbrella, including Gap, Old Navy and Athleta. There is a store-only version of the card, but the Banana Republic Visa® Credit Card can be used anywhere Visa is accepted.',
            ]
        ); 
        Card::create(
            [
                'type_id' => 1, 
                'name' => 'Debit-USD', 
                'title' => 'The Banana Republic Visa® Debit Card rewards you for shopping at Banana Republic and at sister brands under the Gap Inc. umbrella, including Gap, Old Navy and Athleta. There is a store-only version of the card, but the Banana Republic Visa® Credit Card can be used anywhere Visa is accepted.',
            ]
        ); 
        Card::create(
            [
                'type_id' => 1, 
                'name' => 'Debit-EUR', 
                'title' => 'The Banana Republic Visa® Debit Card rewards you for shopping at Banana Republic and at sister brands under the Gap Inc. umbrella, including Gap, Old Navy and Athleta. There is a store-only version of the card, but the Banana Republic Visa® Credit Card can be used anywhere Visa is accepted.',
            ]
        ); 
        Card::create(
            [
                'type_id' => 2, 
                'name' => 'Deposit-UAH', 
                'title' => 'The Banana Republic Visa® Deposit Card rewards you for shopping at Banana Republic and at sister brands under the Gap Inc. umbrella, including Gap, Old Navy and Athleta. There is a store-only version of the card, but the Banana Republic Visa® Credit Card can be used anywhere Visa is accepted.',
            ]
        ); 
        Card::create(
            [
                'type_id' => 2, 
                'name' => 'Deposit-USD', 
                'title' => 'The Banana Republic Visa® Deposit Card rewards you for shopping at Banana Republic and at sister brands under the Gap Inc. umbrella, including Gap, Old Navy and Athleta. There is a store-only version of the card, but the Banana Republic Visa® Credit Card can be used anywhere Visa is accepted.',
            ]
        ); 
        Card::create(
            [
                'type_id' => 2, 
                'name' => 'Deposit-EUR', 
                'title' => 'The Banana Republic Visa® Deposit Card rewards you for shopping at Banana Republic and at sister brands under the Gap Inc. umbrella, including Gap, Old Navy and Athleta. There is a store-only version of the card, but the Banana Republic Visa® Credit Card can be used anywhere Visa is accepted.',
            ]
        );         
        Card::create(
            [
                'type_id' => 3, 
                'name' => 'Credit-UAH', 
                'title' => 'The Banana Republic Visa® Credit Card rewards you for shopping at Banana Republic and at sister brands under the Gap Inc. umbrella, including Gap, Old Navy and Athleta. There is a store-only version of the card, but the Banana Republic Visa® Credit Card can be used anywhere Visa is accepted.',
            ]
        ); 
        Card::create(
            [
                'type_id' => 3, 
                'name' => 'Credit-USD', 
                'title' => 'The Banana Republic Visa® Credit Card rewards you for shopping at Banana Republic and at sister brands under the Gap Inc. umbrella, including Gap, Old Navy and Athleta. There is a store-only version of the card, but the Banana Republic Visa® Credit Card can be used anywhere Visa is accepted.',
            ]
        ); 
        Card::create(
            [
                'type_id' => 3, 
                'name' => 'Credit-EUR', 
                'title' => 'The Banana Republic Visa® Credit Card rewards you for shopping at Banana Republic and at sister brands under the Gap Inc. umbrella, including Gap, Old Navy and Athleta. There is a store-only version of the card, but the Banana Republic Visa® Credit Card can be used anywhere Visa is accepted.',
            ]
        ); 

        // Joineds
        Joined::create(
            [
                'user_id' => 3,
                'card_id' => 2,
                'number' => '1111 1111 1111 1111',
            ]
        ); 
        Joined::create(
            [
                'user_id' => 3,
                'card_id' => 3,
                'number' => '2222 2222 2222 2222',
            ]
        ); 
        Joined::create(
            [
                'user_id' => 4,
                'card_id' => 5,
                'number' => '3333 3333 3333 3333',
            ]
        ); 
        Joined::create(
            [
                'user_id' => 4,
                'card_id' => 6,
                'number' => '4444 4444 4444 4444',
            ]
        ); 

    }
}
