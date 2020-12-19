@php
    $scheduleList = null;
    foreach ($items as $key => $item) {
        $scheduleList[$key]['id'] = $key;
        $scheduleList[$key]['calendarId'] = $item['room_id'];
        $scheduleList[$key]['title'] = $item['room_name'];
        $scheduleList[$key]['category'] = 'time';
        $scheduleList[$key]['attendees'] = [$item['fullname']];
        $scheduleList[$key]['start'] = $item['check_in'];
        switch ($item['status']) {
            case 'booked':
                $scheduleList[$key]['state'] = 'Đặt chỗ';
                $scheduleList[$key]['bgColor'] = '#099ade';
                break;
            case 'confirm':
                $scheduleList[$key]['state'] = 'Giữ chỗ';
                $scheduleList[$key]['bgColor'] = '#f59042';
                break;
            case 'checkin':
                $scheduleList[$key]['state'] = 'Nhận phòng';
                $scheduleList[$key]['bgColor'] = '#075e1d';
                break;
            default:
                # code...
                break;
        }
        $scheduleList[$key]['end'] = $item['check_out'];
        $scheduleList[$key]['body'] = $item['note'];
    }
@endphp
<div class="x_content">
    <div id="menu">
        <span class="dropdown open">
            <button id="dropdownMenu-calendarType" class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <i id="calendarTypeIcon" class="fa fa-th" style="margin-right: 4px;"></i>
                <span id="calendarTypeName">Tháng</span>&nbsp;
                <i class="fa fa-angle-down"></i>
            </button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu-calendarType">
                <li role="presentation">
                    <a class="dropdown-menu-title" role="menuitem" data-action="toggle-daily"> <i class="fa fa-align-justify"></i> Ngày </a>
                </li>
                <li role="presentation">
                    <a class="dropdown-menu-title" role="menuitem" data-action="toggle-weekly"> <i class="fa fa-list"></i> Tuần </a>
                </li>
                <li role="presentation">
                    <a class="dropdown-menu-title" role="menuitem" data-action="toggle-monthly"> <i class="fa fa-th"></i> Tháng </a>
                </li>
                <li role="presentation">
                    <a class="dropdown-menu-title" role="menuitem" data-action="toggle-weeks2"> <i class="fa fa-th-large"></i> 2 tuần </a>
                </li>
                <li role="presentation">
                    <a class="dropdown-menu-title" role="menuitem" data-action="toggle-weeks3"> <i class="fa fa-th-large"></i> 3 tuần </a>
                </li>
                <li role="presentation" class="dropdown-divider"></li>
            </ul>
        </span>
        <span id="menu-navi">
            <button type="button" class="btn btn-default btn-sm move-day" data-action="move-prev">
                <i class="fa fa-angle-left" data-action="move-prev"></i>
            </button>
            <button type="button" class="btn btn-default btn-sm move-day" data-action="move-next">
                <i class="fa fa-angle-right" data-action="move-next"></i>
            </button>
            <button type="button" class="btn btn-default btn-sm move-today" data-action="move-today">Hôm nay</button>
        </span>
        <span id="renderRange" class="render-range"></span>
    </div>
    <div id="calendar"></div>
</div>
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
          // register templates
        let templates = {
            popupIsAllDay: function() {
                return 'All Day';
            },
            popupStateFree: function() {
                return 'Free';
            },
            popupStateBusy: function() {
                return 'Busy';
            },
            titlePlaceholder: function() {
                return 'Subject';
            },
            locationPlaceholder: function() {
                return 'Location';
            },
            startDatePlaceholder: function() {
                return 'Start date';
            },
            endDatePlaceholder: function() {
                return 'End date';
            },
            popupSave: function() {
                return 'Save';
            },
            popupUpdate: function() {
                return 'Update';
            },
            // popupDetailDate: function(isAllDay, start, end) {
            //     let isSameDate = moment(start).isSame(end);
            //     let endFormat = (isSameDate ? '' : 'DD.MM.YYYY ') + 'hh:mm a';

            //     if (isAllDay) {
            //         return moment(start).format('YYYY.MM.DD') + (isSameDate ? '' : ' - ' + moment(end).format('YYYY.MM.DD'));
            //     }

            //     return (moment(start).format('YYYY.MM.DD hh:mm a') + ' - ' + moment(end).format(endFormat));
            // },
            popupDetailLocation: function(schedule) {
                return 'Địa điểm : ' + schedule.location;
            },
            popupDetailUser: function(schedule) {
                return 'Họ và tên Khách hàng : ' + (schedule.attendees || []).join(', ');
            },
            popupDetailState: function(schedule) {
                return 'Trạng thái : ' + schedule.state || 'Busy';
            },
            popupDetailRepeat: function(schedule) {
                return 'Repeat : ' + schedule.recurrenceRule;
            },
            popupDetailBody: function(schedule) {
                return 'Ghi chú KH : ' + schedule.body;
            },
            popupEdit: function() {
                return 'Edit';
            },
            popupDelete: function() {
                return 'Delete';
            }
        };
        var cal  = new tui.Calendar('#calendar', {
            defaultView: 'month', // default week
            taskView: false,
            month: {
                // visibleWeeksCount: 2, // hiển thị số tuần trong tháng
                daynames: ['Chủ nhật', 'Thứ hai', 'Thứ ba', 'Thứ tư', 'Thứ năm', 'Thứ sáu', 'Thứ bảy'],
                startDayOfWeek: 1, // ngày bắt đầu của tuần, mặc định là 0 => chủ nhật
                visibleScheduleCount: 10, // hiển thị số schedule trong ô lịch
            },
            week: {
                daynames: ['Chủ nhật', 'Thứ hai', 'Thứ ba', 'Thứ tư', 'Thứ năm', 'Thứ sáu', 'Thứ bảy'],
                startDayOfWeek: 1, // ngày bắt đầu của tuần, mặc định là 0 => chủ nhật
                visibleScheduleCount: 10, // hiển thị số schedule trong ô lịch
            },
            template: templates,
            useCreationPopup: false,
            useDetailPopup: true,
            isReadOnly: true,
        });
        // get data passing from db
        let scheduleList = @json($scheduleList);
        var calendarList = [];
        // navigation calendar
        onClickNavi = (e) => {
            let action = getDataAction(e.target);
            switch (action) {
                case 'move-prev':
                    cal.prev();
                    break;
                case 'move-next':
                    cal.next();
                    break;
                case 'move-today':
                    cal.today();
                    break;
                default:
                    return;
            }

            setRenderRangeText();
            setSchedules();
        }
        setEventListener = () => {
            $('#menu-navi').on('click', onClickNavi);
            $('.dropdown-menu a[role="menuitem"]').on('click', onClickMenu);
            // $('#lnb-calendars').on('change', onChangeCalendars);

            // $('#btn-save-schedule').on('click', onNewSchedule);
            // $('#btn-new-schedule').on('click', createNewSchedule);

            // $('#dropdownMenu-calendars-list').on('click', onChangeNewScheduleCalendar);

            // window.addEventListener('resize', resizeThrottled);
        }
        // render calendar
        generateSchedule = (viewName, renderStart, renderEnd) =>{
            calendarList.forEach(function(calendar) {
                if (viewName === 'month') {
                    length = 3;
                } else if (viewName === 'day') {
                    length = 4;
                }
            });
        }
        setSchedules = () => {
            cal.clear();
            generateSchedule(cal.getViewName(), cal.getDateRangeStart(), cal.getDateRangeEnd());
            cal.createSchedules(scheduleList); // tạo schedule
        }
        setDropdownCalendarType = () => {
            let calendarTypeName = document.getElementById('calendarTypeName');
            let calendarTypeIcon = document.getElementById('calendarTypeIcon');
            let options = cal.getOptions();
            let type = cal.getViewName();
            let iconClassName;

            if (type === 'day') {
                type = 'Ngày';
                iconClassName = 'fa fa-align-justify';
            } else if (type === 'week') {
                type = 'Tuần';
                iconClassName = 'fa fa fa-list';
            } else if (options.month.visibleWeeksCount === 2) {
                type = '2 tuần';
                iconClassName = 'fa fa-th-large';
            } else if (options.month.visibleWeeksCount === 3) {
                type = '3 tuần';
                iconClassName = 'fa fa-th-large';
            } else {
                type = 'Tháng';
                iconClassName = 'fa fa-th';
            }

            calendarTypeName.innerHTML = type;
            calendarTypeIcon.className = iconClassName;
        }
        getDataAction = (target) => {
            return target.dataset ? target.dataset.action : target.getAttribute('data-action');
        }
        // menu change view
        onClickMenu = (e) => {
                let target = $(e.target).closest('a[role="menuitem"]')[0];
                let action = getDataAction(target);
                let options = cal.getOptions();
                let viewName = '';
                switch (action) {
                    case 'toggle-daily':
                        viewName = 'day';
                        break;
                    case 'toggle-weekly':
                        viewName = 'week';
                        break;
                    case 'toggle-monthly':
                        options.month.visibleWeeksCount = 0;
                        viewName = 'month';
                        break;
                    case 'toggle-weeks2':
                        options.month.visibleWeeksCount = 2;
                        viewName = 'month';
                        break;
                    case 'toggle-weeks3':
                        options.month.visibleWeeksCount = 3;
                        viewName = 'month';
                        break;
                    default:
                        break;
                }

                cal.setOptions(options, true);
                cal.changeView(viewName, true);

                setDropdownCalendarType();
                setRenderRangeText();
                setSchedules();
            }
        // Show Range Calendar
        setRenderRangeText = () => {
            let renderRange = document.getElementById('renderRange');
            let options = cal.getOptions();
            let viewName = cal.getViewName();
            let html = [];
            if (viewName === 'day') {
                html.push(moment(cal.getDate().getTime()).format('DD-MM-YYYY'));
            } else if (viewName === 'month' &&
                (!options.month.visibleWeeksCount || options.month.visibleWeeksCount > 4)) {
                html.push('Tháng ' + moment(cal.getDate().getTime()).format('MM-YYYY'));
            } else {
                html.push('Ngày ' + moment(cal.getDateRangeStart().getTime()).format('DD-MM-YYYY'));
                html.push(' ~ ');
                html.push('Ngày ' + moment(cal.getDateRangeEnd().getTime()).format('DD-MM'));
            }
            renderRange.innerHTML = html.join('');
        }
        // init calendar
        init = () => {
            cal.setCalendars(scheduleList);
            setRenderRangeText();
            setEventListener();
            setSchedules();
        }
        init();
    });
</script>
