function makePlaceholders(){$inputs=$("input[type=text],input[type=email], input[type=tel], input[type=date], input[type=url]"),$inputs.each(function(){var t=jQuery(this);this.placeholderVal=t.attr("placeholder"),t.val(this.placeholderVal)}).bind("focus",function(){var t=jQuery(this),e=$.trim(t.val());(e==this.placeholderVal||""==e)&&t.val("")}).bind("blur",function(){var t=jQuery(this),e=$.trim(t.val());(e==this.placeholderVal||""==e)&&t.val(this.placeholderVal)})}