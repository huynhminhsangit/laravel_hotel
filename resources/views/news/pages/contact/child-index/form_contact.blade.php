<div class="col-lg-8 contact_col">
    <div class="contact_form_container">
        <div class="contact_title">Gửi tin nhắn cho chúng tôi</div>
        {!! Form::open([
            'method'         => 'POST',
            'url'            => route("$controllerName/save"),
            'accept-charset' => 'UTF-8',
            'enctype'        => 'multipart/form-data',
            'class'          => 'form-horizontal form-label-left',
            'id'             => 'contact_form'])  !!}
            <div class="row">
                <div class="col-md-6">
                    {!! Form::text('fullname', null, ['class' => 'contact_input', 'placeholder'=>"Họ và tên", 'required' => true, 'id'=>'fullname']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('phone', null, ['class' => 'contact_input', 'placeholder'=>"Phone", 'required' => true, 'id'=>'phone']) !!}
                </div>
            </div>
            {!! Form::email('email', null, ['class' => 'contact_input', 'placeholder'=>"E-mail", 'required' => true, 'id'=>'email']) !!}
            {!! Form::textarea('message', null, ['class' => 'contact_input contact_textarea', 'placeholder'=>"Lời nhắn", 'required' => true]) !!}
            {!! Form::submit('Gửi ngay', ['class' => 'contact_button trans_200', 'onclick'=> "store()"]) !!}
        {!! Form::close() !!}
    </div>
</div>
