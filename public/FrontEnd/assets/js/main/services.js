$.ajaxSetup({
	headers: {
	  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});
var bool = false;
var services = {
	init(){
		$(document).on('keyup', '.seach_service', function() {
			var key = $(this).val();
			if(bool == false){
				bool == true;
				services.seach(key);
			}
		})
		services.seach();
	},
	list() {
		// c.ajax('SERVICE', 'listUserService', {}, function(data) {
			// $('.table-services').DataTable({
            //     bSort: false,
            //     responsive: true,
            //     paging: false,
            //     // language: {
            //     //     info: "Total _TOTAL_ service(s)",
            //     //     // search: c.lang('Search')
            //     // },
            //     // columns: [
            //     //     { data: "id", className: "text-center", orderable: false },
            //     //     { data: 'name', orderable: false },
            //     //     { data: 'rate', className: "text-center", orderable: false },
            //     //     { data: 'min', className: "text-center", orderable: false },
            //     //     { data: 'max', className: "text-center", orderable: false },
            //     //     { data: "desc", className: "text-center", orderable: false, render(data, type, row) {
            //     //         return '<div class="d-none">'+data+'</div> <button type="button" class="btn btn-bold btn-label-brand btn-sm btn-details" data-id="'+row.service_id+'">'+c.lang('Details')+'</button>';
            //     //     }},
            //     // ],
            //     // rowGroup: {
            //     // 	dataSrc: 'cat'
    		// 	// }
            // });
		// })
    },
    seach(key){
		$.ajax({
			'url': route('service.seach'),
			'type': 'POST',
			'data': {
				key
			},
			
			success: function (data) {
				$('.total-service').html(data.count)
				services.changeDataService(data.data ,data.name_btn);
			},
			error: function (e) {
				console.log(e);
			}
		});
	},
	changeDataService(data ,name_btn){
		var html = '';
		if(data == null){
			html=`<tr class="dtrg-group dtrg-start dtrg-level-0 text-center">
			<td colspan="6">Không tìm thấy kết quả</td>
			</tr>`;
		}else{
			$.each(data, function(i, eval) {
				html+= `
					<tr class="dtrg-group dtrg-start dtrg-level-0">
					<td colspan="6">${eval.name}</td>
					</tr>`;
				$.each(eval.services, function(i, eval2) {
					html+= `
						<tr role="row" class="odd">
							<td class=" text-center" tabindex="0">${eval2.id}</td>
							<td>${eval2.name}</td>
							<td class=" text-center">${eval2.price_service}</td>
							<td class=" text-center">${eval2.min}</td>
							<td class=" text-center">${eval2.max}</td>
							<td class=" text-center">
								<div class="d-none">
									${eval2.note}
								</div>
								<button type="button" class="btn btn-bold btn-label-brand btn-sm btn-details" data-id="${eval2.id}">${name_btn}</button>
							</td>
						</tr>`;
				})
			});
		}
		$("#data-services").html(html);
		bool = false;
	}
}

$(function() {
	services.init();
    services.list();
	$(document).on('click', '.btn-details', function() {
       
        var desc = $(this).prev().html();
        console.log(desc);
		$('#modal-description .kt-scroll').html(desc);
     	$('#modal-description').modal('show');
	})
})