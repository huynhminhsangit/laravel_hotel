@php
    use App\Helpers\Template;
@endphp
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
          @include('admin.templates.x_title',['title' => 'Liên Hệ', 'countContact' => $countContact, 'section' => 'contact'])
          <div class="x_content">
              <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                    <th class="column-title">#</th>
                                    <th class="column-title">Họ và tên</th>
                                    <th class="column-title">Email</th>
                                    <th class="column-title">Lời nhắn</th>
                                    <th class="column-title">Trạng thái</th>
                                    <th class="column-title">Tạo mới</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($itemsContact) > 0)
                                    @foreach ($itemsContact as $key => $val)
                                        @php
                                            $index           = $key + 1;
                                            $class           = ($index % 2 == 0) ? "even" : "odd";
                                            $id              = $val['id'];
                                            $fullname        = $val['fullname'];
                                            $email           = $val['email'];
                                            $message         = $val['message'];
                                            $status          = Template::showItemStatusInDashboard($val['status']);
                                            $createdHistory  = Template::showTimeCreated($val['created']);
                                        @endphp

                                        <tr class="{{ $class }} pointer">
                                            <td >{{ $index }}</td>
                                            <td width="20%">{!! $fullname !!}</td>
                                            <td>{!! $email !!}</td>
                                            <td>{!! $message !!}</td>
                                            <td>{!! $status !!}</td>
                                            <td>{!! $createdHistory !!}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    @include('admin.templates.list_empty', ['colspan' => 8])
                                @endif
                            </tbody>
                        </table>
                    </div>
                  <a href="{{ route('contact') }}" class="btn btn-success">Tới Trang Liên Hệ</a>
                </div>
              </div>
          </div>
      </div>
  </div>
</div>
