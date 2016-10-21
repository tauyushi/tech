(function($){
    /*
     * jQuery機能拡張
     */
    $.extend({
        /* load_file: Ajaxでページを読み込む
         * options: 連想配列(keyにfilename必須)
         */
        load_file : function(url, options) {
        
            var obj = new Object();
         
            if (options) {
                $.extend(obj, options);
            }
             
            var ajax = $.ajax({
                url: url,
                type: 'POST',
                data: obj,
                dataType: 'html'
            });
     
            ajax.done(function(ret){
                $("#"+options["filename"]).html(ret);
            });
        },
        
        load_json : function(url, options) {
            var ajax = $.ajax({
                url: url,
                type: 'GET',
                data: options,
                dataType: 'json'
            });

            return ajax;
        }
    });
})(jQuery);