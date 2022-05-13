$(function(){
    //上传文件
    $('.upload').imageUpload('singer', function(res){
        console.log(res, 'res')
    });
});