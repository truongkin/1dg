$.ajaxSetup({
	headers: {
	  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});
var c = {
	// ajax(controller, action, data, callback) {
    //     $.post(URL_API, {
    //         controller: controller,
    //         action: action,
    //         data: data
    //     }, callback)
    //     .fail(function(xhlRquest) {
    //         try {
    //             var json = $.parseJSON(xhlRquest.responseText);
    //             console.log('ERROR SYSTEM', json);
    //         } catch(e) {
    //             console.log(e)
    //         }
    //     });
    // },

    // ajaxasync(controller, action, data) {
    //     return new Promise((resolve, reject) => {
    //         $.post(URL_API, {
    //             controller: controller,
    //             action: action,
    //             data: data
    //         }, data => resolve(data))
    //         .fail(function(xhlRquest) {
    //             try {
    //                 var json = $.parseJSON(xhlRquest.responseText);
    //                 reject(json);
    //             } catch(e) {
    //                 reject(e);
    //             }
    //         });
    //     })
    // },

    funds() {
        
        $.ajax({
			'url': route('account.getAccount'),
			'type': 'POST',
			'data': {
			},
			success: function (data) {
                $('.funds').text('$ '+ data.data.total);
                $('.total_orders').text(data.data.total_orders);
                $('.total_amount_paid').text('$ '+ data.data.total_amount_paid);
                $('.name_level').text(data.data.name_level);
                
			},
			error: function (e) {
				console.log(e.message);
			}
		});
        // c.ajax('ACCOUNT', 'getFunds', {}, function(data) {
        //     $('.funds').text('$ '+ data);
        // })
    },

    loading(status, elem) {
    	if (elem) {
            if (status == 'show') {
                KTApp.block(elem, {
                    overlayColor: '#000000',
                    type: 'v2',
                    state: 'primary',
                    message: 'Processing...'
                });
            } else {
                KTApp.unblock(elem);
            }
        } else {
            if (status == 'show') {
                KTApp.blockPage({
                    overlayColor: '#000000',
                    type: 'v2',
                    state: 'primary',
                    message: 'Processing...'
                });
            } else {
                KTApp.unblockPage();
            }
        }
    },

    alert(elem, text) {
        $(elem).show().html(text);
    },

    // activeMenu() {
    //     var path = window.location.pathname.replace('/', '');
    //     $('.kt-menu__nav .kt-menu__item').each(function() {
    //         var href = $(this).find('a').attr('href');
    //         if (href == path) {
    //             $(this).addClass('kt-menu__item--active');
    //         }
    //     })
    // },

    // signout() {
    //     c.ajax('ACCOUNT', 'signout', {}, function(data) {
    //         window.location = '../';
    //     })
    // },

    // formatNumber(number) {
    //     return number * 1e10/1e10;
    // },

    // paging(page, total) {
    //     var max_page = Math.ceil(total/PAGE_LENGTH);
    //     return '\
    //         '+(page > 1 ? '\
    //         <li class="kt-pagination__link--next"><a href="p/'+(parseInt(page)-1)+'" class="navigo"><i class="fa fa-angle-left kt-font-dark"></i></a></li>' : '')+'\
    //         '+(page == 1 ? '' : '<li class=""><a href="p/1" class="navigo">1</a></li>')+'\
    //         <li class="kt-pagination__link--active"><a href="javascript:;">'+page+'</a></li>\
    //         '+(page == max_page ? '' : '<li class=""><a href="p/'+max_page+'" class="navigo">'+max_page+'</a></li>')+'\
    //         '+(page < max_page ? '\
    //         <li class="kt-pagination__link--prev"><a href="p/'+(parseInt(page)+1)+'" class="navigo"><i class="fa fa-angle-right kt-font-dark"></i></a></li>' : '');
    // },

    // timezone(date) {
    //     return moment(date).add(TIME_ZONE, 'seconds').format('YYYY-MM-DD HH:mm:ss')
    // },

    // getQuery(name) {
    //     var url = window.location.href;
    //     name = name.replace(/[\[\]]/g, '\\$&');
    //     var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
    //         results = regex.exec(url);
    //     if (!results) return null;
    //     if (!results[2]) return '';
    //     return decodeURIComponent(results[2].replace(/\+/g, ' '));
    // },

    // onClickChangeLanguage(lang) {
    //     c.ajax('ACCOUNT', 'changeLanguage', {
    //         lang: lang
    //     }, function(data) {
    //         window.location = '';
    //     })
    // },

    // lang(key) {
    //     if (LANG) {
    //         // LANG = $.parseJSON(LANG);
    //         return LANG[key] ? (LANG[key] != '' ? LANG[key] : key) : key;
    //     } else {
    //         return key;
    //     }
    // }
}

$(function() {
    c.funds();
    // c.activeMenu();
    $(document).ajaxStart(function() {
        c.loading('show');
    });

    $(document).ajaxStop(function() {
        c.loading('hide');
    });

    // $('.btn-signout').click(function() {
    //     c.signout();
    // })
})