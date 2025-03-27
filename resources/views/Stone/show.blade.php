<x-layout>
    
     
@section('title',  $quarry['name_'. app()->getLocale()] )
@section('description', $quarry['name_'. app()->getLocale()] )
    @include('partials._navbar')
    <div class="space"></div>
    <div class="container">
        @include('partials._search')

        <div class="card my-5" data-aos="fade-up" data-aos-delay="100">
            <div class="card-header">
                <h3 class="card-category text-center">
                    آنالیز سنگ</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <th class="text-end">{{ __('messages.name') }}</th>
                            <th>{{ __('messages.code') }}</th>
                            <th>{{ __('messages.type') }}</th>
                            <th>{{ __('messages.tensile_strength') }}</th>
                            <th>{{ __('messages.water_absorption_rate') }}</th>
                            <th>{{ __('messages.compressive_strength') }}</th>
                            <th>{{ __('messages.abrasion_resistance') }}</th>
                            <th>{{ __('messages.specific_weight') }}</th>
                            <th>{{ __('messages.failure_mode') }}</th>
                            <th>{{ __('messages.porosity') }}</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-end">{{ $stone['name_' . app()->getLocale()] }}</td>
                                <td>{{ $stone['code'] }}</td>
                                <td>{{ $stone->stoneType['name_' . app()->getLocale()] }}</td>
                                <td>{{ $stone['tensile_strength_' . app()->getLocale()] }}</td>
                                <td>{{ $stone['water_absorption_rate_' . app()->getLocale()] }}</td>
                                <td>{{ $stone['compressive_strength_' . app()->getLocale()] }}</td>
                                <td>{{ $stone['abrasion_resistance_' . app()->getLocale()] }}</td>
                                <td>{{ $stone['specific_weight_' . app()->getLocale()] }}</td>
                                <td>{{ $stone['failure_mode_' . app()->getLocale()] }}</td>
                                <td>{{ $stone['porosity_' . app()->getLocale()] }}</td>


                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
            <div class="col-md-12" data-aos="fade-up" data-aos-delay="100">
                <img class="w-100" src="{{ asset('storage/' . $stone->image) }}" alt="" srcset="">

            </div>


    </div>
    @include('partials._footer')
</x-layout>
