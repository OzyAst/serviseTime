<?php
/**
 * @var \App\Models\Business $business
 */

$route = 'feedback.store';
$route_params = [];
$method = "POST";
?>

<section id="feedback">
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">{{ __('constructor.feedback') }}</h1>
    </div>

    <div class="container">
        <form action="{{ route($route, $route_params) }}" method="POST">
            @csrf
            @method($method)

            <input type="hidden" name="business_id" value="{{ $business->id }}">

            <div class="form-row">
                <div class="col">
                    <input type="email" class="form-control" id="email" name="email"
                           placeholder="{{ __('forms.feedback.add.email') }}">
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="name" name="name"
                           placeholder="{{ __('forms.feedback.add.name') }}">
                </div>
            </div>

            <div class="form-group mt-3">
                <textarea class="form-control" id="text" name="text" rows="3"
                          placeholder="{{ __('forms.feedback.add.text') }}"></textarea>
            </div>

            <div class="form-group text-right mt-3">
                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    Отправить
                </button>
            </div>

            @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        </form>

    </div>
</section>

