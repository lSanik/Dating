<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicesPrice extends Model
{
    protected $table = 'services_price';

    protected $fillable = [
        'name', 'price', 'term'
    ];



    public static function getTerms()
    {
        $type = DB::select(DB::raw('SHOW COLUMNS FROM services_price WHERE Field = "term"'))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $values = [];
        foreach(explode(',', $matches[1]) as $value){
            $values[] = trim($value, "'");
        }
        return $values;
    }

}
