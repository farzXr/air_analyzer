<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Indications extends Model
{
    use HasFactory;
    protected $table = 'indications';
    protected $guarded = false;

    public static function getTableColumnNames(array $except = []) : array
    {
        $tableColumnsNames = [];
        foreach (Schema::getColumnListing('indications') as $name) {
                if(!in_array($name, $except)) $tableColumnsNames[] = $name;
        }
        return $tableColumnsNames;
    }
}
