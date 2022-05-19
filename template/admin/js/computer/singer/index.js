$(function(){
    SINGERLIST.init();
});
var SINGERLIST = {
    init: function(){
        var _this = this;
        //上传文件
        $('.upload').imageUpload('singer', function(res, obj){
            var id = obj.parents('tr').data('id');
            post(URI+'singer', {opn: 'editInfo', id: id, avatar: res.cate+'/'+res.name+'.'+res.type}, function(res){
                if (res.code == '200') {
                    successTips(res.message);
                } else {
                    errorTips(res.message);
                }
            });
        });
        //状态
        $('.switch_botton').on('click', function(){
            var _thisObj = $(this);
            var status = _thisObj.data('status') ? 0 : 1;
            var id = _thisObj.parents('tr').data('id');
            post(URI+'singer', {opn: 'editInfo', id: id, status: status}, function(res){
                if (res.code == '200') {
                    successTips(res.message);
                    _thisObj.switchBtn(status);
                } else {
                    errorTips(res.message);
                }
            });
        });
        //编辑
        $('.btn.modify').on('click', function(){
            var _thisObj = $(this);
            var id = _thisObj.parents('tr').data('id');
            _thisObj.button('loading');
            post(URI+'singer', {opn: 'getInfo', id: id}, function(res){
                _thisObj.button('reset');
                if (res.code == '200') {
                    console.log(res.data)
                    _this.initModalShow(res.data);
                } else {
                    errorTips(res.message);
                }
            });
        });
        $('#dealbox .switch_botton').on('click', function(){
            let status = $(this).data('status') ? 0 : 1;
            $(this).switchBtn(status);
            $(this).next().val(status);
        });
    },
    initModalShow: function(data) {
        if (!data) {
            data = {
                singer_id: 0,
                group: '',
                name: '',
                status: 0,
                name_en: '',
            };
        }
        var obj = $('#dealbox');
        for (var i in data) {
            obj.find('[name="'+i+'"]').val(data[i]);
        }
        obj.find('.switch_botton').switchBtn(data.status);
        obj.dealboxShow();
    }
};