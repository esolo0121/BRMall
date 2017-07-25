//placeholder兼容扩展
var JPlaceHolder = {
	//检测
	_check: function() {
		return 'placeholder' in document.createElement('input');
	},
	//初始化
	init: function() {
		if(!this._check()) {
			this.fix();
		}
	},
	//修复
	fix: function() {
		jQuery(':input[placeholder]').each(function(index, element) {
			var self = $(this),
				txt = self.attr('placeholder');
			self.wrap($('<div></div>').css({ position: 'relative', zoom: '1', display: "inline-block" }));
			var pos = self.position(),
				h = self.outerHeight(true),
				paddingleft = self.css('padding-left');
			var holder = $('<span></span>').text(txt).css({ position: 'absolute', left: pos.left, top: pos.top, height: h, lineHeight: h + 'px', paddingLeft: paddingleft, color: '#ccc' }).appendTo(self.parent());
			self.focusin(function(e) {
				holder.hide();
			}).focusout(function(e) {
				if(!self.val()) {
					holder.show();
				}
			});
			holder.click(function(e) {
				holder.hide();
				self.focus();
			});
		});
	}
};
//执行
jQuery(function() {
	JPlaceHolder.init();
});
//滑块

$(function() {
	var $document = $(document);
	var selector = '[data-rangeslider]';
	var $inputRange = $(selector);

	// Example functionality to demonstrate a value feedback
	// and change the output's value.
	function valueOutput(element) {
		var value = element.value;
		var output = element.parentNode.getElementsByTagName('output')[0];

		output.innerHTML = value;
	}

	// Initial value output
	for(var i = $inputRange.length - 1; i >= 0; i--) {
		valueOutput($inputRange[i]);
	};

	// Update value output
	$document.on('input', selector, function(e) {
		valueOutput(e.target);
	});

	// Example functionality to demonstrate programmatic value changes
	$document.on('click', '#js-example-change-value button', function(e) {
		var $inputRange = $('input[type="range"]', e.target.parentNode);
		var value = $('input[type="number"]', e.target.parentNode)[0].value;

		$inputRange
			.val(value)
			.change();
	});

});

//权限资源管理-编辑权限checkbox取消

$(".resource-handle").delegate(".layui-btn-danger", "click", function() {
	var v = $(this).parents(".handel-list").attr("val");
	$(".resourse-control").find(".layui-unselect").eq(v).removeClass("layui-form-checked");
	$(this).parents(".handel-list").remove();

})

//地区设置显示隐藏
$(".area-form").find(".area-btn").hover(function() {
	$(this).find(".icon-sanjiao-copy2").show();
	$(this).find(".icon-sanjiao").hide();
	$(this).siblings(".levels-box").show();
	$(this).addClass("layui-btn-warm");
}, function() {
	$(this).find(".icon-sanjiao-copy2").hide();
	$(this).find(".icon-sanjiao").show();
	$(this).siblings(".levels-box").hide();
	$(this).removeClass("layui-btn-warm");
})

$(".levels-box").hover(function() {
	$(this).siblings(".area-btn").addClass("layui-btn-warm");
	$(this).siblings(".area-btn").find(".icon-sanjiao-copy2").show();
	$(this).siblings(".area-btn").find(".icon-sanjiao").hide();
	$(this).show();
}, function() {
	$(this).siblings(".area-btn").removeClass("layui-btn-warm");
	$(this).siblings(".area-btn").find(".icon-sanjiao-copy2").hide();
	$(this).siblings(".area-btn").find(".icon-sanjiao").show();
	$(this).hide();
})

//会员管理
$(".sort").click(function() {
	$(this).addClass("current-sort").parents("th").siblings("th").find(".sort").removeClass("current-sort");
})


//刷新页面
$(".icon-shuaxin").click(function(){
	window.location.reload();
})



layui.use('form', function() {
				var $ = layui.jquery,
					form = layui.form();

				//全选
				form.on('checkbox(allChoose)', function(data) {
					var child = $(data.elem).parents('table').find('tbody input[type="checkbox"]');
					child.each(function(index, item) {
						item.checked = data.elem.checked;
					});
					form.render('checkbox');
				});

				//触发事件
				var active = {

					offset: function(othis) {
						var type = othis.data('type'),
							text = othis.text();

						layer.open({
							type: 1,
							offset: type //具体配置参考：http://www.layui.com/doc/modules/layer.html#offset
								,
							id: 'LAY_demo' + type //防止重复弹出
								,
							content: '<div style="padding:20px 180px 20px 20px; text-align：left;">确认删除？ </div>',
							btn: ['确定', '取消'],
							btnAlign: 'c' //按钮居中
								,
							shade: 0.5 //不显示遮罩
								,
							yes: function() {
                                  
								layer.closeAll();
							}
						});
					}
				};

				$('.site-demo-button .layui-btn').on('click', function() {
					var othis = $(this),
						method = othis.data('method');
					active[method] ? active[method].call(this, othis) : '';
				});

			});