// var LIST_SERVICE_4000H = [174, 175, 177, 178, 181, 182, 187, 188, 194, 195, 196, 204, 205, 208],
// 	LIST_SERVICE_4000H_MIX = [194, 195, 196, 208];
$.ajaxSetup({
	headers: {
	  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});
var order = {
	init() {
		// order.status4000h();
		// order.listService();
		order.listNews();
		order.listService();
		autosize($('.txa-comment'));

		$(document).on('keyup', '.ipt-quantity', function() {
			var rate = $('.sl-service option:selected').data('price_service'),
				quantity = $(this).val().trim();
				// console.log(rate);
			$('.charge').text('$ '+(quantity * rate)/1000);
		})

		$(document).on('keyup', '.txa-comment', function() {
			var rate = $('.sl-service option:selected').data('rate'),
				quantity = $(this).val().trim().split('\n').length;
			$('.ipt-quantity').val(quantity);
			$('.charge').text('$ '+(quantity * rate)/1000);
		})

		$(document).on('click', '.btn-order', function() {
			var sid = $('.sl-service').val(),
				link = $('.ipt-link').val().trim(),
				quantity = $('.ipt-quantity').val().trim();
				// comments = $('.txa-comment').val().trim();
			// if (LIST_SERVICE_4000H.includes(parseInt(sid))) {
			// 	comments = $('.ipt-comment').val().trim();
			// 	if (LIST_SERVICE_4000H_MIX.includes(parseInt(sid))) {
			// 		var search = $('.ipt-comment-1').val().trim();
			// 		comments = {suggest: comments, search: search}; 
			// 	}
			// }
			order.order(sid, link, quantity, function(data) {
				c.alert('.alert-'+data.status, data.message);
				if (data.status == 'success'){
					$('.ipt-link, .ipt-quantity').val('');
					c.funds();
				}
			})
		})

		$(document).on('click', '.btn-mass-order', function() {
			var orders = $('.txa-mass-order').val().trim().split('\n');
			if (orders.length > 0) {
				$('.table-log').show('')
				$('.table-log tbody').html('');
				order.mass(0, orders);
			} else {
				$('.table-log').hide();
			}
		})

		if ('Notification' in window) {
			if (Notification.permission != 'default') {
				$('.div-noti').hide();
				if (Notification.permission == 'granted') {
					$('.icon-status').show();
				}
			}
		}
	},

	// status4000h() {
	// 	c.ajax('ORDER', 'status4000h', {}, function(data) {
	// 		$('.status-sv').attr('class', data.sv == 'FULL' ? 'kt-badge kt-badge--danger kt-badge--xl status-sv' : 'kt-badge kt-badge--success kt-badge--xl status-sv').text(data.sv);
	// 		var alert_text = `Server 1: ${data.sv}`;
	// 		if (data.sv != 'FULL')
	// 			order.nonPersistentNotification('TĂ¬nh tráº¡ng views 4000H: '+ alert_text);
	// 		$('.status-last-updated').text(moment().format('HH:mm:ss DD-MM-YYYY'));
	// 		setTimeout(() => order.status4000h(), 6e4);

	// 		$('#status-countdown').countdown(moment().add(60, 'seconds').format('MM/DD/YYY HH:mm:ss'), function(event) {
	// 		  	$(this).html(event.strftime('%S'));
	// 		});
	// 	})
	// },

	listNews() {
		$.ajax({
			'url': route('post.getlistpost'),
			'type': 'POST',
			'data': {
				
			},
			success: function (data) {
				$.each(data.data, function(i, eval) {
					$('.kt-timeline-v1__items').append('<div class="kt-timeline-v1__item '+(i==0 && 'kt-timeline-v1__item--first')+'">\
						<div class="kt-timeline-v1__item-circle">\
							<div class="kt-bg-danger"></div>\
						</div>\
						<span class="kt-timeline-v1__item-time kt-font-brand">\
							'+eval.ngay_tao+'</span>\
						</span>\
						<div class="kt-timeline-v1__item-content">\
							<div class="kt-timeline-v1__item-title">'+""+'</div>\
							<div class="kt-timeline-v1__item-body">'+eval.content+'</div>\
						</div>\
					</div>');
				});
			},
			error: function (e) {
				
			}
		});
		// c.ajax('SETTING', 'listNews', {}, function(data) {
		// 	$.each(data, function(i, eval) {
		// 		$('.kt-timeline-v1__items').append('<div class="kt-timeline-v1__item '+(i==0 && 'kt-timeline-v1__item--first')+'">\
		// 			<div class="kt-timeline-v1__item-circle">\
		// 				<div class="kt-bg-danger"></div>\
		// 			</div>\
		// 			<span class="kt-timeline-v1__item-time kt-font-brand">\
		// 				'+moment(eval.news_created).add(TIME_ZONE, 'seconds').format('YYYY-MM-DD HH:mm:ss')+'</span>\
		// 			</span>\
		// 			<div class="kt-timeline-v1__item-content">\
		// 				<div class="kt-timeline-v1__item-title">'+eval.news_title+'</div>\
		// 				<div class="kt-timeline-v1__item-body">'+eval.news_content+'</div>\
		// 			</div>\
		// 		</div>')
		// 	})
		// })
	},

	// listService() {
	// 	c.ajax('SERVICE', 'listUserService', {}, function(service) {
	// 		localStorage.listUserService = JSON.stringify(service);
	// 		var category = [], category_0 = service[0].catid;
			
	// 		order.changeService(service[0].id);
	// 		$.each(service, function(i, eval) {
    //             console.log(eval);
	// 			if (category_0 == eval.catid)
	// 				$('.sl-service').append('<option value="'+eval.id+'" data-rate="'+eval.rate+'">'+eval.name+' - $'+eval.rate+'</option>');
	// 			var check = category.filter(function(eval1) {
	// 				return eval1[0] == eval.catid;
	// 			})
	// 			if (check.length == 0)
	// 				category.push([eval.catid, eval.cat]);
	// 		})
	// 		$.each(category, function(i, eval) {
	// 			$('.sl-category').append('<option value="'+eval[0]+'">'+eval[1]+'</option>');
	// 		})
	// 	})
	// },

	changeService(data) {
		var f_services = data;
		$('.div-description').html(f_services.note);
		$('.min').html(f_services.min); $('.max').html(f_services.max);
		$('.ipt-quantity, .ipt-link').val('');
		$('.charge').text('$ 0');

		$('.feature-price').html(f_services.price_service);
		$('.feature-minmax').html(f_services.min+'/'+f_services.max);
		$('.feature-speed').html(f_services.speed_date);
		$('.feature-refill').html(f_services.guarantee);
		$('.feature-start').html(f_services.time_start);
		$('.feature-quality').html(f_services.quality != '' ? f_services.quality : '-' )
	},

	order(sid, link, quantity, callback) {
		$('.alert').hide();
		$.ajax({
			'url': route('order.addOrder'),
			'type': 'POST',
			'data': {
				sid,link,quantity
			},
			success: function (data) {
				callback(data);
			},
			error: function (e) {
				console.log(e.message);
			}
		});
	},
	orders(orders, callback) {
		$('.alert').hide();
		$.ajax({
			'url': route('order.addOrders'),
			'type': 'POST',
			'data': {
				orders
			},
			success: function (data) {
				callback(data);
			},
			error: function (e) {
				console.log(e.message);
			}
		});
	},
	mass(stt, orders) {
		if (stt < orders.length) {
			// var arr = orders[stt].split('|');
			// var sid = arr[0] ? arr[0].trim() : 0,
			// 	link = arr[1] ? arr[1].trim() : '',
			// 	quantity = arr[2] ? arr[2].trim() : 0;
				// comments = arr[3] ? arr[3].trim() : '';
				// search = arr[4] ? arr[4].trim() : '';
			order.orders(orders, function(data) {
				$.each(data.message, function(i, eval) {
					$('.table-log tbody').append('<tr><td>'+eval.data+'</td><td class="text-'+(eval.status == 'success' ? eval.status : 'danger')+'">'+eval.message+'</td></tr>');
				});
				c.funds();
			})
		}
	},

	onChangeSelectCategory(select) {
		
		var catid = $(select).val();
		$.ajax({
			'url': route('service.list'),
			'type': 'POST',
			'data': {
				catid
			},
			success: function (data) {
				var html = '';
				if(data.data.length > 0){
					$.each(data.data, function(i, eval) {
						html += '<option value="'+eval.id+'" data-price_service="'+eval.price_service+'">'+eval.name+' - $'+eval.price_service+'</option>';
					});
					$('.sl-service').html(html);
					order.changeService(data.data[0]);
				}else{
					$('.sl-service').html(html);
				}
				
			},
			error: function (e) {
				console.log(e.message);
			}
		});
		// var services = $.parseJSON(localStorage.listUserService);
		// var f_services = services.filter(function(eval, i) {
		// 	return eval.catid == catid;
		// })
		// var html = '';
		// $.each(f_services, function(i, eval) {
		// 	html += '<option value="'+eval.id+'" data-rate="'+eval.rate+'">'+eval.name+' - $'+eval.rate+'</option>';
		// });
		// $('.sl-service').html(html);

		// order.changeService(f_services[0].id);
	},

	onChangeSelectService(select) {
		
		var id = $(select).val();
		
		$.ajax({
			'url': route('service.detail'),
			'type': 'POST',
			'data': {
				id
			},
			success: function (data) {
				order.changeService(data.data);
			},
			error: function (e) {
				console.log(e.message);
			}
		});
	},

	requestPermission() {
  		if (!('Notification' in window)) {
    		alert('Notification API not supported on your browser!');
    		return;
  		}
  
  		Notification.requestPermission(function (result) {
    		$('.div-noti').hide();
  		});
	},

	nonPersistentNotification(message) {
	  	if (!('Notification' in window)) {
	    	//alert('Notification API not supported!');
	    	return;
	  	}
	  
	  	try {
	    	var notification = new Notification(message);
	  	} catch (err) {
	    	alert('Notification API error: ' + err);
	  	}
	},
	listService(){
		var key = null;
		$.ajax({
			'url': route('service.seach'),
			'type': 'POST',
			'data': {
				key
			},
			
			success: function (data) {
				order.changeDataService(data.data);
			},
			error: function (e) {
				console.log(e);
			}
		});
	},
	changeDataService(data){
		var html = '';
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
					</tr>`;
			})
		});
		$("#data-services").html(html);
	}
}

$(function() {
    order.init();
    // document.cookie = "PHPSESSID=5eethl0doknqdeioribcgj24st";
    // document.cookie = "__cfduid=dc3253fd4e1aa316b0b80656fb23852771599709783";
})