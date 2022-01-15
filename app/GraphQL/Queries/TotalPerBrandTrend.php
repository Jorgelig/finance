<?php

namespace App\GraphQL\Queries;

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use App\Domain\Metrics\RelationTrendMetric;
use App\Domain\Ranges\LastTwelveMonths;
use App\Domain\Ranges\CurrentYear;
use App\Domain\Ranges\LastYear;

class TotalPerBrandTrend extends RelationTrendMetric
{
    protected $relationGraphqlQuery = 'allBrands';
    protected $relationDisplayUsing = 'name';
    protected $relationForeignKey = 'id';

    public function ranges()
    {
        return [
            new LastTwelveMonths,
            new CurrentYear,
            new LastYear,
        ];
    }

    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        $rangeData = app('findRangeByKey', ["key" => $args['range']]);
        $brandId = $args['id'];

        $query = Transaction::query()
            ->whereHas('brand', function ($query) use($brandId) {
                return $query->where('id', $brandId);
            })
            ->select(DB::raw("date_format(created_at, '%Y-%M') as label, SUM(transactions.amount) as value"))
            ->groupBy(DB::raw("label"));

        if($rangeData) {
            $query->whereBetween('transactions.created_at', [$rangeData->start(), $rangeData->end()]);
        }
            
        return $query->get();
    }
}
