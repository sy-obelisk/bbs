function generateCalendar(config) {
    _this = this;
    _this.config = config ? config : {};
    _this.defaultDate = new Date();
    _this.selectedDates = [];
    _this.year = null;
    _this.month = null;
    _this.day = null;
    _this.monthTxt = ['一','二','三','四','五','六','七','八','九','十','十一','十二'];
    if(_this.config) {
        var key;
        for (key in _this.config) {
            if (_this.config.hasOwnProperty(key)) {
                _this[key]=_this.config[key];
            }
        }
    }
    this.days = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];//所有天数 除了闰年
    this.generate = function(calendarDiv){
        var date = _this.defaultDate ? _this.defaultDate : new Date();
        _this.year = date.getFullYear();
        _this.month = date.getMonth();
        _this.day = date.getDate();
        var htm = '<div class="title">签到记录</div><div class="calendar-title"><span class="calendar-prev">&lt;</span><span class="calendar-year">'+_this.year+'</span>年<span class="calendar-month">'+(_this.monthTxt[_this.month])+'</span>月<span class="calendar-next">&gt;</span></div><div class="clear"></div>';
        htm += '<table class="calendar-table">';
        htm += '<thead><tr><th><span title="星期一">一</span></th><th><span title="星期二">二</span></th><th><span title="星期三">三</span></th><th><span title="星期四">四</span></th><th><span title="星期五">五</span></th><th class="ui-datepicker-week-end"><span title="星期六">六</span></th><th class="ui-datepicker-week-end"><span title="星期日">日</span></th></tr></thead>';
        htm += '<tbody>';
        htm += _this.getDatelist();
        htm += '</tbody>';
        htm += '</table>';
        $(calendarDiv).html(htm);
    }
    this.getWeekFirstDay = function(year, month, day){
        var date = new Date();
        date.setFullYear(year);
        date.setMonth(month);
        date.setDate(day);

        return date.getDay() == 0 ? 7 : date.getDay();
    }
    this.getDatelist = function(){
        var selectDays = _this.getSelectedDays();
        var curDay = _this.month == _this.defaultDate.getMonth() && _this.year == _this.defaultDate.getFullYear() ? _this.defaultDate.getDate() : 0;
        var wfd = _this.getWeekFirstDay(_this.year, _this.month, 1);
        var list = '<tr>';
        _this.checkMonthDays();
        curDay = curDay ? curDay : 0;
        var nth = 1;
        var _max = wfd+_this.days[_this.month]-1;
        var max = _max > 35 ? 42 : 35;
        for(i = 1; i <= max; i++) {
            if(i>wfd-1 && nth<=_this.days[_this.month]){
                if(nth != curDay && $.inArray(nth,selectDays) < 0) {
                    list += '<td class="month-day"><span class="calendar-day">'+nth+'<span></td>';
                } else if(nth == curDay && $.inArray(nth,selectDays) >= 0) {
                    list += '<td class="month-day default-day selected-day"><span class="calendar-day">'+nth+'<span></td>';
                } else if($.inArray(nth,selectDays) >= 0){
                    list += '<td class="month-day selected-day"><span class="calendar-day">'+nth+'<span></td>';
                } else if(nth == curDay) {
                    list += '<td class="month-day default-day"><span class="calendar-day">'+nth+'<span></td>';
                } else {
                    list += '<td class="month-day"><span class="calendar-day">'+nth+'<span></td>';
                }
                nth++;
            } else {
                list += '<td class="empty-day">&nbsp;</td>';
            }

            if(i % 7 == 0) {
                list += '</tr><tr>'
            }
        }

        list += '</tr>';
        return list;
    }
    this.checkMonthDays = function(){
        if(_this.year % 400 == 0 || (_this.year % 4 == 0 && _this.year % 100 != 0)){
            _this.days = [31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
        } else {
            _this.days = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
        }
    }
    this.getSelectedDays = function() {
        var month = (_this.month+1) < 10 ? '0'+(_this.month+1) : (_this.month+1);
        var mth = _this.year+'-'+month;
        var days = [];
        if(_this.selectedDates.length <= 0) {
            return days;
        }
        for(i = 0; i < _this.selectedDates.length; i++) {
            var val = _this.selectedDates[i];
            if(val.substr(0,7) == mth) {
                var day  = parseInt(val.substr(8));
                days.push(day);
            }
        }
        return days;
    }
    $(document).on('click','.calendar-title .calendar-next',function(){
        _this.month += 1;
        if(_this.month > 11) {
            _this.year += 1;
            _this.month = 0;
        }
        if($('.calendar-table tbody').length > 0) {
            $('.calendar-table tbody').html(_this.getDatelist());
        }
        $(this).closest('.calendar-title').find('.calendar-year').text(_this.year);
        $(this).closest('.calendar-title').find('.calendar-month').text(_this.monthTxt[_this.month]);
        if(_this.afterMonthChanged && typeof _this.afterMonthChanged == 'function') {
            _this.afterMonthChanged();
        }
    });
    $(document).on('click','.calendar-title .calendar-prev',function(){
        _this.month -= 1;
        if(_this.month < 0) {
            _this.year -= 1;
            _this.month = 11;
        }
        if($('.calendar-table tbody').length > 0) {
            $('.calendar-table tbody').html(_this.getDatelist());
        }
        $(this).closest('.calendar-title').find('.calendar-year').text(_this.year);
        $(this).closest('.calendar-title').find('.calendar-month').text(_this.monthTxt[_this.month]);
        if(_this.afterMonthChanged && typeof _this.afterMonthChanged == 'function') {
            _this.afterMonthChanged();
        }
    });
}
