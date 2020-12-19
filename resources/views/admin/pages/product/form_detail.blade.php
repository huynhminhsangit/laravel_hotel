@php
use App\Helpers\Form as FormTemplate;
@endphp
<div class="x_panel">
    @include('admin.templates.x_title', ['title' => 'Thông tin'])
    <div class="x_content">
        {!! FormTemplate::show($elements) !!}
    </div>
</div>

