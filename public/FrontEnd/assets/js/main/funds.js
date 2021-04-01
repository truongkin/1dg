$.ajaxSetup({
	headers: {
	  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});
var funds = {
	init() {
		funds.listPaymentmethod();
		// funds.listFund();
		// funds.infoFund();

		$(document).on('change', '.sl-pm-method', function() {
			var id = $(this).val();
			$.ajax({
				'url': route('bank.getOne'),
				'type': 'POST',
				'data': {
					id
				},
				success: function (data) {
					if(data.data!=null){
						$('.stk').html(data.data.numberbank)
						$('.ctk').html(data.data.name)
					}else{
						$('.stk').html("")
						$('.ctk').html("")
					}
				},
				error: function (e) {
					
				}
			});
		})
	},

	listPaymentmethod() {
		$.ajax({
			'url': route('bank.getAll'),
			'type': 'POST',
			'data': {
				
			},
			success: function (data) {
				
				$.each(data.data, function(i, eval) {
					$('.sl-pm-method').append('<option data-data="'+eval+'" value="'+eval.id+'">'+eval.namebank+'</option>');
				})
			},
			error: function (e) {
				
			}
		});
		// c.ajax('ACCOUNT', 'listPaymentMethod', {}, function(data) {
		// 	$('.data-pm-method').text(JSON.stringify(data));
		// 	$.each(data, function(i, eval) {
		// 		$('.sl-pm-method').append('<option value="'+eval.id+'">'+eval.name+'</option>');
		// 	})
		// })
	},

	// listFund() {
	// 	var table = $('.table-history-fund').DataTable();
	// 	table.destroy();

	// 	c.ajax('ACCOUNT', 'listFund', {}, function(data) {
	// 		$('.table-history-fund').DataTable({
	// 			bSort: false, bInfo: false,
	// 			paging: false, searching: false,
    //             responsive: true,
    //             data: data,
    //             columns: [
    //                 { data: 'fund_id', className: 'text-center'},
    //                 { data: 'fund_pmethod'},
    //                 { data: 'fund_amount', className: 'text-center kt-font-bold', render(data, type, row) {
    //                 	return c.formatNumber(data);
    //                 }},
    //                 { data: 'fund_details'},
    //                 { data: 'fund_created', className: 'text-center', render(data, index, row) {
    //                 	return moment(data).add(TIME_ZONE, 'seconds').format('YYYY-MM-DD HH:mm:ss');
    //                 }}
    //             ],
    //             "order": [[ 0, 'desc' ]]
    //         });
	// 	})
	// },

	// infoFund() {
    //     $('.info-fund').html('');
    //     c.ajax('ACCOUNT', 'infoFund', {}, data => {
    //         $('.info-fund-deposit').text(data.deposit);
    //         $('.info-fund-bonus').text(data.bonus);
    //         $('.info-fund-spend').text(data.spend);
    //     })
	// },
	
	// checkAuto(type) {
	// 	var bank_type = type == 0 ? 'checkVCB' : (type == 1 ? 'checkVTB' : (type == 2 ? 'checkTCB' : 'checkPM'));
	// 	$('.alert').hide();
	// 	c.ajax('ACCOUNT', bank_type, {}, function(data) {
	// 		var status = Object.keys(data)[0];
	// 		c.alert('.alert-'+status, data[status]);
	// 		if (status == 'success') {
	// 			funds.listFund();
	// 			c.funds();
	// 		}
	// 	})
	// }
}

$(function() {
	funds.init();
})