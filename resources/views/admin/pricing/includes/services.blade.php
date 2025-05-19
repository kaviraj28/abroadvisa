<div class="form-group mt-3">
    <div class="panel panel-default">
        <div class="panel-header">
            <h4>Services</h4>
        </div>

        <div class="panel-body package_destination">
            <ul class="category_checkbox" style="padding-left:0">
                @foreach ($services as $service)
                    <li>
                        <input class="" id="service-{{ $service->id }}" type="radio" name="services"
                            @if ($service->id == $servicePricing) {{ 'checked' }} @endif
                            value="{{ $service->id }}"><label
                            for="service-{{ $service->id }}">{{ $service->name }}</label>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>
</div>
