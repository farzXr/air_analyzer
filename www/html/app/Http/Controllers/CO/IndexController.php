<?php

namespace App\Http\Controllers\CO;

use App\Http\Controllers\Controller;
use App\Models\CO;
use App\Services\CO\IndexService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $columnNames = CO::getColumnNames(expect: ['created_at', 'updated_at']);
        $allTable = IndexService::getAllTable();
        return view('co.index', compact('columnNames', 'allTable'));
    }
}
