<?php
/**
 * @var \App\Models\BusinessAddress $address
 */

$route = $address->id ? 'address.update' : 'address.store';
$route_params = $address->id ? ["address" => $address->id] : [];
$method = $address->id ? "PATCH" : "POST";
?>

@extends('blocks._form')

@section('form_content')
    <div class="form-group">
        <label for="address">{{ __('forms.address.add.address') }}</label>
        <input type="text" class="form-control" name="address" value="{{ $address->address }}">
    </div>

    <div class="form-row">
        <div class="col">
            <label for="latitude">{{ __('forms.address.add.latitude') }}</label>
            <input type="text" class="form-control" name="latitude" value="{{ $address->latitude }}">
        </div>
        <div class="col">
            <label for="longitude">{{ __('forms.address.add.longitude') }}</label>
            <input type="text" class="form-control" name="longitude" value="{{ $address->longitude }}">
        </div>
    </div>

    <div class="form-group text-right py-4">
        <button type="submit" class="btn btn-primary">
            {{ $address->id ? __('buttons.address.edit') : __('buttons.address.add') }}
        </button>
    </div>
@stop
