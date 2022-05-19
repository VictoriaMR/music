$(function(){
	MEMBERLIST.init();
});
var MEMBERLIST = {
	init: function() {
		var _this = this;
		$('#add-data-btn').on('click', function(){
			var obj = $(this);
			obj.button('loading');
			_this.initDealbox(0, function(){
				obj.button('reset');
			});
		});
		//保存按钮
		$('#dealbox .btn.save').on('click', function(){
			if (!$(this).parents('form').formFilter()) {
				return false;
			}
			post(URI+'member', $(this).parents('form').serializeArray(), function(data){
				window.location.reload();
			});
		});
		$('#dealbox .switch_botton').on('click', function(){
			let status = $(this).data('status') ? 0 : 1;
			$(this).switchBtn(status);
			$(this).next().val(status);
		});
		//改变状态按钮
		$('#data-list .switch_botton').on('click', function(){
			var obj = $(this);
			var status = obj.data('status') ? 0 : 1;
			post(URI+'member', {opn:'modify', mem_id: $(this).parents('tr').data('id'), status: status}, function(data) {
				obj.switchBtn(status);
			});
		});
		//修改
		$('#data-list .btn.modify').on('click', function(){
			var obj = $(this);
			obj.button('loading');
			_this.initDealbox(obj.parents('tr').data('id'), function(){
				obj.button('reset');
			});
		});
	},
	initDealbox: function(mem_id, callback) {
		var _this = this;
		if (mem_id) {
			post(URI+'member', {opn:'getInfo', mem_id: mem_id}, function(data) {
				_this.dealboxData(data, callback);
			});
		} else {
			_this.dealboxData({}, callback);
		}
	},
	dealboxData: function(data, callback) {
		var obj = $('#dealbox');
		obj.find('input:not(.no_replace)').val('');
		if (data) {
			obj.find('.dealbox-title').text('编辑管理员');
			for (var i in data) {
				obj.find('[name="'+i+'"]').val(data[i]);
				obj.find('[name="'+i+'"]:not(.no_show)').show();
			}
		} else {
			obj.find('.dealbox-title').text('新增管理员');
			obj.find('input[name="salt"]').hide();
		}
		let status = 0;
		if (typeof data.status !== 'undefinded') {
			status = data.status;
		}
		obj.find('.switch_botton').switchBtn(status);
		obj.dealboxShow();
		if (callback) {
			callback();
		}
	}
};