<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    /**
     * The books that belong to the user.
     */
    public function books()
    {
        return $this->belongsToMany('App\Book', 'users_books', 'user_id', 'book_id')
            ->withTimestamps();
    }

}
