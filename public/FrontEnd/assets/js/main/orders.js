var orders = {
    init() {
        // orders.list();

        // $('#kt_daterangepicker').daterangepicker({
        //     buttonClasses: ' btn',
        //     applyClass: 'btn-primary',
        //     cancelClass: 'btn-secondary',
        //     locale: {
        //         format: 'YYYY-MM-DD'
        //     }
        // });
        // var start = moment("<?php echo $dataQuery['time_start']?>");
        // var end = moment("<?php echo $dataQuery['time_end']?>");
        var start = moment($('.temp').attr('time_start'));
        var end = moment($('.temp').attr('time_end'));
        // console.log(temp);
        $('#datepickerInput').datepicker({
            format: 'yyyy-mm-dd'
        })
        $('#datepickerInput2').datepicker({
            format: 'yyyy-mm-dd'
        })
        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Hôm nay': [moment(), moment()],
                'Hôm qua': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                '7 ngày trước': [moment().subtract(6, 'days'), moment()],
                '30 ngày trước': [moment().subtract(29, 'days'), moment()],
                'Tháng này': [moment().startOf('month'), moment().endOf('month')],
                'Tháng trước': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, orders.cb);

        orders.cb(start, end);
        $('#myDatepicker4').datetimepicker({
            ignoreReadonly: true,
            allowInputToggle: true,
            format: 'DD-MM-YYYY HH:mm'
        });


        $(document).on('click', '.btn-search', function() {
            var keyword = $('.ipt-keyword').val().trim(),
                date = $('#kt_daterangepicker').val().trim().split(' - '),
                date_start = date[0] + ' 00:00:00', date_end = date[1] + ' 23:59:59';
            orders.list(keyword, 'All', date_start, date_end);
        })
    },
    cb(start, end) {
        $('#reportrange span').html(start.format('DD/MM/YYYY') + ':' + end.format('DD/MM/YYYY'));
        $('#reportrange input').val(start.format('DD/MM/YYYY') + ':' + end.format('DD/MM/YYYY'));
    }

	// list(keyword = '', status = 'All', k = '', date_end = '') {
	// 	var table = $('.table-orders').DataTable();
    //     table.destroy();

	// 	c.ajax('ORDER', 'listOrder', {
    //         status: status,
    //         keyword: keyword,
    //         date_start: date_start,
    //         date_end: date_end
	// 	}, function(data) {
	// 		$('.table-orders').DataTable({
    //             bSort: false, bInfo: false,
    //             searching: false, paging: false,
    //             responsive: true, 
    //             data: data,
    //             columns: [
    //                 { data: 'order_id', className: "text-center"},
    //                 { data: 'order_created', render(data, index, row) {
    //                     return moment(data).add(TIME_ZONE, 'seconds').format('YYYY-MM-DD HH:mm:ss');
    //                 }},
    //                 { data: 'order_link', render(data, type, row) {
    //                     return data+'<p><small>'+row.service_name+'</small></p>';
    //                 }},
    //                 { data: 'order_charge', render(data, type, row) {
    //                     return c.formatNumber(data);
    //                 }},
    //                 { data: 'order_start'},
    //                 { data: 'order_quantity'},
    //                 { data: 'order_remains'},
    //                 { data: "order_status", className: "text-center", orderable: false, render(data, type, row) {
    //                 	var status = '<span class="kt-badge kt-badge--dark kt-badge--inline">'+c.lang('Pending')+'</span>';
    //                 	if (data == 'In progress') {
    //                 		status = '<span class="kt-badge kt-badge--brand kt-badge--inline">'+c.lang(data)+'</span>';
    //                 	} else if (data == 'Processing') {
    //                 		status = '<span class="kt-badge kt-badge--info kt-badge--inline">'+c.lang(data)+'</span>';
    //                 	} else if (data == 'Completed') {
    //                 		status = '<span class="kt-badge kt-badge--success kt-badge--inline">'+c.lang(data)+'</span>';
    //                 	} else if (data == 'Partial' || data == 'Partialed') {
    //                 		status = '<span class="kt-badge kt-badge--danger kt-badge--inline">'+c.lang(data)+'</span>';
    //                 	} else if (data == 'Canceled') {
    //                 		status = '<span class="kt-badge kt-badge--warning kt-badge--inline">'+c.lang(data)+'</span>';
    //                 	}
    //                     return status;
    //                 }},
    //             ]
    //         });
	// 	})
	// }
}

$(function() {
	orders.init();
})