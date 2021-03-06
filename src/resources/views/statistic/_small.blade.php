<?php
/**
 * @var $statistic
 */
?>

@isset($statistic)
<div class="card-deck mt-4 text-center">
    <div class="card mb-4 shadow-sm">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">Записей</h4>
        </div>
        <div class="card-body">
            <h1 class="card-title pricing-card-title">{{ $statistic['count_records'] }}</h1>
        </div>
    </div>
    <div class="card mb-4 shadow-sm">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">Обслужили</h4>
        </div>
        <div class="card-body">
            <h1 class="card-title pricing-card-title">{{ $statistic['count_records_done'] }}</h1>
        </div>
    </div>
    <div class="card mb-4 shadow-sm">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">Заработано</h4>
        </div>
        <div class="card-body">
            <h1 class="card-title pricing-card-title">{{ $statistic['records_done_count'] }} <small class="text-muted"> руб.</small></h1>
        </div>
    </div>
</div>
@endisset
