<?php

namespace App\Http\Controllers;

use App\Models\DailyTraffic;
use DB;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

class TrafficController extends Controller
{
    public function daily()
    {
        $names = DB::connection('DATACENTER')->table('daily_traffic')->selectRaw('distinct name')->orderBy('name', 'desc')->pluck('name');
        $uuids = DB::connection('DATACENTER')->table('daily_traffic')->selectRaw('distinct uuid')->orderBy('uuid', 'desc')->pluck('uuid');
        $dates = DB::connection('DATACENTER')->table('daily_traffic')->selectRaw('distinct date')->orderBy('date', 'desc')->pluck('date');

        return view('traffic.daily.index', compact('names', 'uuids', 'dates'));
    }

    public function monthly()
    {
        $names  = DB::connection('DATACENTER')->table('daily_traffic')->selectRaw('distinct name')->orderBy('name', 'desc')->pluck('name');
        $uuids  = DB::connection('DATACENTER')->table('daily_traffic')->selectRaw('distinct uuid')->orderBy('uuid', 'desc')->pluck('uuid');
        $years  = DB::connection('DATACENTER')->table('daily_traffic')->selectRaw('distinct year(date) year')->orderBy('year', 'desc')->pluck('year');
        $months = DB::connection('DATACENTER')->table('daily_traffic')->selectRaw('distinct monthname(date) month')->orderBy('month', 'desc')->pluck('month');

        return view('traffic.monthly.index', compact('names', 'uuids', 'years', 'months'));
    }

    public function dailyList()
    {
        return Datatables::of(DB::connection('DATACENTER')->table('daily_traffic')->orderBy('date', 'desc'))->make(true);
    }

    public function monthlyList(Request $request)
    {
        $sub = DailyTraffic::select(DB::raw('name, year(date) as year, monthname(date) as month, sum(upload) as upload, sum(download) as download, sum(total) as total, uuid'))->groupBy('year', 'month', 'uuid');

        return Datatables::of(DB::connection('DATACENTER')->table(DB::raw("({$sub->toSql()}) as sub"))->mergeBindings($sub->getQuery()))->filter(function ($query) use ($request)
        {
            if ($request->has('total'))
            {
                $total = $request->get('total');
                if ($total == 1) $query->where('total', '>', 0)->where('total', '<=', 200 * 1024 * 1024 * 1024 );
                elseif ($total == 2) $query->where('total', '>', 200 * 1024 * 1024 * 1024 )->where('total', '<=', 500 * 1024 * 1024 * 1024 );
                elseif ($total == 3) $query->where('total', '>', 500 * 1024 * 1024 * 1024 );
            }
        })->make(true);
    }
}
