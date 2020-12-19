@php
    $general = json_decode($item[0]['value'], true);
@endphp
@if (isset($general['map']))
    <div class="google_map_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="contact_map">
                        <!-- Google Map -->
                        <div class="map">
                            <div id="google_map" class="google_map">
                                <div class="map_container">
                                    {!! $general['map'] !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
