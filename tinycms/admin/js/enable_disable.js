$(document).ready(function(){
	$('.user_enable').click(function()
			{
				var id = $(this).attr('id');
				
				var td_id = id;
				var enable_status = $('#user_enable_status_'+id).val();
				
				$.get('get_user_enable_status.php',{'user_id':id,'enable_status':enable_status},function(data,status,xhr)
				{
					$("#"+td_id).html(data);
					
				});
			}
			);
    $('.post_enable').click(function()
			{
			
				var id = $(this).attr('id');
				
				var td_id = id;
				var enable_status = $('#post_enable_status_'+id).val();
				
				$.get('get_post_enable_status.php',{'post_id':id,'enable_status':enable_status},function(data,status,xhr)
				{
					$("#"+td_id).html(data);
					
				});
			}
			);
});			