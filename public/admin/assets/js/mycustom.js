$( document ).ready(function() {
    
    $('#exportExcel').click(function(){

        var type = $(this).data('type');

        var table = $(this).data('table');

        $.ajax({
        	url 	: '/exportExcel',
        	type 	: 'get',
        	dataType: 'json',
        	data	: {table : table,type : type},
        	success:function(responce){
        		console.log(responce);
        	},
        	error:function(responce){
        		console.log(responce);
        	}
        });
    });
    
});