<?php
/**
 * @var \App\Models\Business $business
 * @var \App\Models\Procedure $prcedure
 */
?>
<section id="addresses" style="background-color: #fff">
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">{{ __('headers.constructor.address') }}</h1>
        <p class="lead">
            Quickly build an effective pricing table for your potential customers with this Bootstrap example.
            It’s built with default Bootstrap components and utilities with little customization.
        </p>
    </div>

    <div class="row">
        @isset($business->address)
            <div class="col-md-12 map_container">
                <div class="list-group map_address">
                    <ul class="list-unstyled text-small">
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1" id="map_address">{{ $business->address->address }}</h5>
                            </div>
                            @foreach($business->address->contacts as $contact)
                                <p class="mb-1">{{ $contact->contact }}</p>
                            @endforeach
                        </a>
                    </ul>
                </div>

                <div id="map" style="background-color: #b6c6d1" data-lat="{{ $business->address->latitude }}"
                     data-lng="{{ $business->address->longitude }}"></div>
            </div>
        @else
            <div class="text-center flex-grow-1 pb-4">
                <a href="#">Добавить адрес</a>
            </div>
        @endisset
    </div>
</section>
