<ul class="nav nav-tabs">
    <li><a data-toggle="tab" href="#home" >Cấu hình chung</a></li>
    <li><a data-toggle="tab" href="#email">Cấu hình email</a></li>
    <li><a data-toggle="tab" href="#social">Mạng xã hội</a></li>
    <li><a data-toggle="tab" href="#seo">Cấu hình SEO</a></li>
    <li><a data-toggle="tab" href="#script">Cấu hình Script</a></li>
</ul>
<div class="tab-content">
    <div id="home" class="tab-pane fade">
        @include('admin.pages.setting.form_general')
    </div>
    <div id="email" class="tab-pane fade">
        @include('admin.pages.setting.form_email')
    </div>
    <div id="social" class="tab-pane fade">
        @include('admin.pages.setting.form_social_network')
    </div>
    <div id="seo" class="tab-pane fade">
        @include('admin.pages.setting.form_seo')
    </div>
    <div id="script" class="tab-pane fade">
        @include('admin.pages.setting.form_script')
    </div>
</div>

