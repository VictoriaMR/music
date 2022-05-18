$(function(){
    //上传文件
    $('.upload').imageUpload('singer', function(res, obj){
        var id = obj.parents('tr').data('id');
        $.post(URI+'singer', {opn: 'editInfo', id: id, avatar: res.cate+'/'+res.name+'.'+res.type}, function(res){
            if (res.code == '200') {
                successTips(res.message);
            } else {
                errorTips(res.message);
            }
        });
    });
});