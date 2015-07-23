<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Book;

class UsersBooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Add to 10 random user 5 random books

        $users = User::all('id')->random(5);

        foreach ($users as $user) {

            $books = Book::all('id')->random(3);
            foreach ($books as $book) {

                DB::table('users_books')->insert([
                    'user_id' => $user->id,
                    'book_id' => $book->id,
                ]);

            }
        }
     }
}
