var Tips = {
    error: function(msg) {
        this.init('error', msg)
    },
    success: function(msg, icon) {
        this.init('success', msg, icon)
    },
    init: function(type, msg, icon) {
        if (typeof msg === 'undefined' || msg === '') {
            return false;
        }
        const _this = this;
        $('#message-tips').remove();
        clearTimeout(_this.timeoutVal);
        let html = '<div id="message-tips" class="'+type+'">\
                        <div class="content">\
                            <div class="icon-content">\
                                <span class="iconfont icon-xiaoxi"></span>\
                            </div>\
                            <div class="text-content">\
                                <span>'+msg+'</span>\
                            </div>\
                        </div>\
                        <span class="close-btn iconfont icon-guanbi1"></span>\
                    </div>';
        $('body').append(html);
        setTimeout(function(){
            $('#message-tips').addClass('top');
        }, 100);
        _this.timeout();
        $('body').on('click', '#message-tips .close-btn', function(){
            clearTimeout(_this.timeoutVal);
            $('#message-tips').remove();
        });
    },
    timeout: function(obj) {
        this.timeoutVal = setTimeout(function(){
            $('#message-tips').fadeOut(300, function(){
                $(this).remove();
            });
        }, 5000);
    },
};
$(document).ready(function(){
    $("#favorites-btn").on('click', function(){
        var title = $(this).attr('title').replace('收藏', '');
        try{
            window.external.addFavorite(URI, title);
        }catch(e){
            try{
                window.sidebar.addPanel(title, URI, "");
            }catch(e){
                var ctrl = (navigator.userAgent.toLowerCase()).indexOf('mac')>-1?'Command/Cmd': 'CTRL';
                Tips.error('您可以通过快捷键 ' + ctrl + ' + D 加入到收藏夹');
            }
        }
    });
});