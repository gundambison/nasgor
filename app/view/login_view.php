<div style="width:450px;padding:10px;margin: auto">
<div class="easyui-panel" title="Ajax Form" style="width:300px;padding:10px;margin: auto">
        <form id="ff" action="<?php echo my_url();?>loginCheck" method="post">
            <table>
                <tr>
                    <td>User Name:</td>
                    <td><input name="username" type="text"></input></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input class="password" name="password" type="password"></input></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Submit"></input></td>
                </tr>
            </table>
        </form>
    </div>
</div>

    <script type="text/javascript">
        $(function(){
            $('#ff').form({
                success:function(data){
					if(data=='ok')
					{
					 window.location="<?=my_url();?>";
					}else{
						$.messager.alert('Info', data, 'info');
					}
					$(".password").empty();
                }
            });
        });
    </script>
