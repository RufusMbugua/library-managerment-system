<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    protected $fillable = ['name', 'publisher', 'platform', 'genre', 'published_date', 'purchased_date', 'price',];
    
    public function copies_available()
    {
        $total = $this->number_of_copies;
        $current_borrows = \App\Borrows::where('game_id', $this->id)->count();
        $available_copies = $total - $current_borrows;

        return $available_copies;
    }
}
