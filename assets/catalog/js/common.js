var $token = $('meta[name="csrf-token"]').attr('content');
toastr.options.closeButton = true;
toastr.options.progressBar = true;

String.prototype.toSlug = function(){
    st = this.toLowerCase();
    st = st.replace(/[\u00C0-\u00C5]/ig,'a')
    st = st.replace(/[\u00C8-\u00CB]/ig,'e')
    st = st.replace(/[\u00CC-\u00CF]/ig,'i')
    st = st.replace(/[\u00D2-\u00D6]/ig,'o')
    st = st.replace(/[\u00D9-\u00DC]/ig,'u')
    st = st.replace(/[\u00D1]/ig,'n')
    st = st.replace(/[^a-z0-9 ]+/gi,'')
    st = st.trim().replace(/ /g,'-');
    st = st.replace(/[\-]{2}/g,'');
    return (st.replace(/[^a-z\- ]*/gi,''));
}

var fieldNamespace = function (string) {
	if (string.indexOf('.') != -1) {
		string += '.';
		var obj = string.split('.')[0];
		var params = string.match(/\..*\./g)[0];
		var params = params.replace(/^\./, '[');
		var params = params.replace(/\.$/, ']');
		var params = params.replace(/\./g, '][');
		string = obj + params;
	}
	return string;
};

function loading() {
    $('body').addClass('loading');
}

function stopLoading() {
    $('body').removeClass('loading');
}

function ajaxFormError (xhr, status, error, container) {
    var response = xhr.responseJSON;
    var errors = response.errors;
    if (response.hasOwnProperty('message')) {
        toastr.error(response.message, 'Không thể thực hiện');
    }

    if (status == 'error') {
        $.each(errors, function (field, message) {
            // field = fieldNamespace(field);
            if ($('*[name="'+ field +'"]', container).closest('.form-group').find('.input-group').length) {
                var $field = $('*[name="'+ field +'"]', container).closest('.input-group');
            } else {
                var $field =  $('*[name="'+ field +'"]', container);
            }

            if ($('*[name="'+ field +'[]"][type="checkbox"]').length) {
                // field là checkbox
                $('*[name="'+ field +'[]"]', container)
                    .closest('.form-group')
                    .addClass('has-error');

                $('*[name="'+ field +'[]"]', container)
                    .closest('.checkbox-list')
                    .after('<span class="help-block help-block-error error-message"><strong>'+ message +'</strong></span>')
            } else if ($('*[name="'+ field +'"][type="radio"]').length) {
                // field là radio
                $('*[name="'+ field +'"]', container)
                    .closest('.form-group')
                    .addClass('has-error');

                $('*[name="'+ field +'"]', container)
                    .closest('.radio-list')
                    .after('<span class="help-block help-block-error error-message"><strong>'+ message +'</strong></span>')
            } else {
                $field
                .after('<span class="help-block help-block-error error-message"><strong>'+ message +'</strong></span>')
                .closest('.form-group')
                .addClass('has-error');
            }
        });
    }
}

function getURLVar(key) {
	var value = [];

	var query = String(document.location).split('?');

	if (query[1]) {
		var part = query[1].split('&');

		for (i = 0; i < part.length; i++) {
			var data = part[i].split('=');

			if (data[0] && data[1]) {
				value[data[0]] = data[1];
			}
		}

		if (value[key]) {
			return value[key];
		} else {
			return '';
		}
	}
}

(function() {
    var elements = document.querySelectorAll('[data-open]');
    for (var i=0; i<elements.length; i++) {
        initOpen(elements[i]);
    }

    function initOpen(element) {
        var className = 'open';
        var target = document.getElementById(element.getAttribute('data-open'));
        var ulChildrenMap = function(fn) {
            var lists = target.getElementsByTagName('ul');
            for (var i=0; i<lists.length; i++) {
                fn(lists[i]);
            }
        };
        if (!target) return;

        // dirty hack for small screen ...
        var firstChildUl = target.getElementsByTagName('ul')[0];
        if (firstChildUl && window.getComputedStyle(firstChildUl).display === 'none') {
            target.classList.remove(className);
        }

        element.addEventListener('click', function() {
            var list = target.getElementsByTagName('ul')[0];
            if (target.classList.contains(className)) {
                target.classList.remove(className);
                ulChildrenMap(function(ul) { ul.style.display = 'none'; });
            } else {
                target.classList.add(className);
                ulChildrenMap(function(ul) { ul.style.display = 'block'; });
            }
        });
    }
})();

$(document).ready(function() {
	// fixed breadcrumb when scroll
    // $(window).scroll(function () {
    //     var toTop = $(window).scrollTop();
    //     var headerHeight = $('#header').height();
    //     var fixed = toTop >= headerHeight;
    //     if (fixed) {
    //         var pageHeaderWitdh = $('.page-header').width();
    //         $('.page-header').addClass('page-header-fixed');
    //     } else {
    //         $('.page-header').removeClass('page-header-fixed');
    //     }
    // });
    
    // Logout
    $('#logout').on('click', function (e) {
        e.preventDefault();
        $('#logout-form').submit();
    });


    //Form Submit for IE Browser
	$('button[type=\'submit\']').on('click', function() {
		$("form[id*='form-']").submit();
	});

	// Highlight any found errors
	$('.text-danger').each(function() {
		var element = $(this).parent().parent();

		if (element.hasClass('form-group')) {
			element.addClass('has-error');
		}
	});

	// Set last page opened on the menu
	$('#menu a[href]').on('click', function() {
		sessionStorage.setItem('menu', $(this).attr('href'));
	});

	if (!sessionStorage.getItem('menu')) {
		$('#menu #dashboard').addClass('active');
	} else {
		// Sets active and open to selected page in the left column menu.
		$('#menu a[href=\'' + sessionStorage.getItem('menu') + '\']').parents('li').addClass('active open');
	}

	if (localStorage.getItem('column-left') == 'active') {
		$('#button-menu i').replaceWith('<i class="fa fa-dedent fa-lg"></i>');

		$('#column-left').addClass('active');

		// Slide Down Menu
		$('#menu li.active').has('ul').children('ul').addClass('collapse in');
		$('#menu li').not('.active').has('ul').children('ul').addClass('collapse');
	} else {
		$('#button-menu i').replaceWith('<i class="fa fa-indent fa-lg"></i>');

		$('#menu li li.active').has('ul').children('ul').addClass('collapse in');
		$('#menu li li').not('.active').has('ul').children('ul').addClass('collapse');
	}

	// Menu button
	$('#button-menu').on('click', function() {
		// Checks if the left column is active or not.
		if ($('#column-left').hasClass('active')) {
			localStorage.setItem('column-left', '');

			$('#button-menu i').replaceWith('<i class="fa fa-indent fa-lg"></i>');

			$('#column-left').removeClass('active');

			$('#menu > li > ul').removeClass('in collapse');
			$('#menu > li > ul').removeAttr('style');
		} else {
			localStorage.setItem('column-left', 'active');

			$('#button-menu i').replaceWith('<i class="fa fa-dedent fa-lg"></i>');

			$('#column-left').addClass('active');

			// Add the slide down to open menu items
			$('#menu li.open').has('ul').children('ul').addClass('collapse in');
			$('#menu li').not('.open').has('ul').children('ul').addClass('collapse');
		}
	});

	// Menu
	$('#menu').find('li').has('ul').children('a').on('click', function() {
		if ($('#column-left').hasClass('active')) {
			$(this).parent('li').toggleClass('open').children('ul').collapse('toggle');
			$(this).parent('li').siblings().removeClass('open').children('ul.in').collapse('hide');
		} else if (!$(this).parent().parent().is('#menu')) {
			$(this).parent('li').toggleClass('open').children('ul').collapse('toggle');
			$(this).parent('li').siblings().removeClass('open').children('ul.in').collapse('hide');
		}
	});

	// Tooltip remove fixed
	$(document).on('click', '[data-toggle=\'tooltip\']', function(e) {
		$('body > .tooltip').remove();
	});

	// tooltips on hover
	$('[data-toggle=\'tooltip\']').tooltip({container: 'body', html: true});

	// Makes tooltips work on ajax generated content
	$(document).ajaxStop(function() {
		$('[data-toggle=\'tooltip\']').tooltip({container: 'body'});
	});

	// https://github.com/opencart/opencart/issues/2595
	$.event.special.remove = {
		remove: function(o) {
			if (o.handler) {
				o.handler.apply(this, arguments);
			}
		}
	}

	$('[data-toggle=\'tooltip\']').on('remove', function() {
		$(this).tooltip('destroy');
	});

	$('[data-toggle=\'str-slug\']').strSlug();
	$('[data-toggle=\'clone\'],.clone').clone();
	$('[data-toggle="input-image"]').inputImage();
	$('[data-toggle="ajax-form"]').ajaxForm2();
});

// Autocomplete */
(function($) {
	$.fn.autocomplete = function(option) {
		return this.each(function() {
			var $this = $(this);
			var $dropdown = $('<ul class="dropdown-menu" />');
			
			this.timer = null;
			this.items = [];

			$.extend(this, option);

			$this.attr('autocomplete', 'off');

			// Focus
			$this.on('focus', function() {
                this.show();
				this.request();
			});

			// Blur
			$this.on('blur', function() {
                setTimeout(function(object) {
					object.hide();
				}, 200, this);
            });

			// Keydown
			$this.on('keydown', function(event) {
				switch(event.keyCode) {
					case 27: // escape
						this.hide();
						break;
					default:
						this.request();
						break;
				}
			});

			// Click
			this.click = function(event) {
				event.preventDefault();

				var value = $(event.target).parent().attr('data-value');

				if (value && this.items[value]) {
					this.select(this.items[value]);
				}
			}

			// Show
			this.show = function() {
				var pos = $this.position();

				$dropdown.css({
					top: pos.top + $this.outerHeight(),
					left: pos.left,
                    'min-height': '100px',
				});
				$dropdown.show();
			}

			// Hide
			this.hide = function() {
				$dropdown.hide();
			}

			// Request
			this.request = function() {
				clearTimeout(this.timer);

				this.timer = setTimeout(function(object) {
					object.source($(object).val(), $.proxy(object.response, object));
				}, 200, this);
			}

			// Response
            this.response = function(json) {
				var html = '';
				var category = {};
				var name;
				var i = 0, j = 0;

				if (json.length) {
					for (i = 0; i < json.length; i++) {
						// update element items
						this.items[json[i]['value']] = json[i];

						if (!json[i]['category']) {
							// ungrouped items
                            if (!this.hasOwnProperty('render')) {
							     html += '<li data-value="' + json[i]['value'] + '"><a class="handle" href="#">' + json[i]['label'] + '</a></li>';
                            } else {
                                html += '<li data-value="' + json[i]['value'] + '">'+this.render(json[i])+'</li>';
                            }
						} else {
							// grouped items
							name = json[i]['category'];
							if (!category[name]) {
								category[name] = [];
							}

							category[name].push(json[i]);
						}
					}

					for (name in category) {
						html += '<li class="dropdown-header">' + name + '</li>';

						for (j = 0; j < category[name].length; j++) {
							html += '<li data-value="' + category[name][j]['value'] + '"><a class="handle" href="#">&nbsp;&nbsp;&nbsp;' + category[name][j]['label'] + '</a></li>';
						}
					}
				}

				$dropdown.html(html);
			}

			$dropdown.on('click', '> li a.handle', $.proxy(this.click, this));
			$this.after($dropdown);
		});
	}
})(window.jQuery);

// Strslug */
(function($) {
	$.fn.strSlug = function() {
		return this.each(function() {
			var $this = $(this);
			var $target = $($this.attr('data-target'));
			$this.on('keyup', function (e) {
				var value = e.target.value.toSlug();
				$target.val(value);
			});
		});
	}
})(window.jQuery);

// Clone value */
(function($) {
	$.fn.clone = function() {
		return this.each(function() {
			var $this = $(this);
			var $target = $($this.attr('data-clone-target'));
			$this.on('keyup', function (e) {
				var value = e.target.value;
				$target.val(value);
			});
		});
	}
})(window.jQuery);

(function($) {
	$.fn.ajaxForm2 = function(options) {
        option = {};
		return this.each(function() {
			var $this = $(this);
            $this.ajaxForm({
                dataType: 'json',
                method: 'post',
                beforeSend: function() {
                    $('.error-message', $this).remove();
                    $('.has-error', $this).removeClass('has-error');
                    $('button, input[type="submit"]', $this).button('loading');
                },
                complete: function () {
                    $('button, input[type="submit"]', $this).button('reset');
                },
                success: function (res) {
                    if (res.hasOwnProperty('message')) {
                        toastr.success(res.message, 'Đã thực hiện');
                    }

                    setTimeout(function () {
                        if (res.hasOwnProperty('redirect')) {
                            window.location = res.redirect;
                        }
                    }, 1000);
                    
                    // if (options.hasOwnProperty('success')) {
                    //     options.success(res);
                    // }
                },
                error: function (xhr, status, error) {
                    return ajaxFormError(xhr, status, error, $this);
                },
            });
		});
	}
})(jQuery);

(function($) {
	$.fn.inputImage = function() {
		return this.each(function(index, item) {
            index = $('.form-upload-photo').length + index;
			var $this = $(item);
			$this.after('<input type="file" class="hidden" />');
			$('body').append('<form class="form-upload-photo" id="upload-photo'+index+'" enctype="multipart/form-data" style="display: none;"><input type="file" name="photo" class="hidden"></form>');
			var $form = $('#upload-photo'+index);
			var $inputFile = $('#upload-photo'+index+' input[type="file"]');
			var $target = $(item).find('input[type="hidden"]');
			var $image = $(item).find('img');
			
			$this.on('click', function (e) {
				e.preventDefault();
				$inputFile.trigger('click');
			});

			$inputFile.on('change', function () {
                $.ajax({
                    url: 'api/photo/upload',
                    type: 'post',
                    dataType: 'json',
                    data: new FormData($form[0]),
                    processData: false,  
                    contentType: false,
                    success : function(json) {
                        $image.attr('src', json['cache']);
                        $target.val(json['path']);
                    },
                    beforeSend: function () {
                    	$this.addClass('relative');
                    	$this.append('<div class="loading absolute"></div>')
                    },
                    complete: function () {
                        $this.removeClass('relative');
                        $this.find('.loading').remove();
                    },
                });
			});
		});
	}
})(window.jQuery);