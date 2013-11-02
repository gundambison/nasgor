	<script type="text/javascript">
		var index = 0;
		var index = 0;
		function addPanel(){
			index++;
			$('#tt').tabs('add',{
				title: 'Tab'+index,
				content: '<div style="padding:10px">Content'+index+'</div>',
				closable: true
			});
		}
		/*
		data-options="href:'_content.html',closable:true"
		*/
		function addTab(title, url)
		{
			window.location.href ="<?=my_url();?>"+url;
			
/*			
			if ($('#tt').tabs('exists', title)){
				$('#tt').tabs('select', title);
				//$('#tt').tabs('resize');
			} else {
				var content = '<iframe scrolling="auto" frameborder="0"  src="'+url+'" style="width:100%;height:500px;overflow:hidden"></iframe>';
				$('#tt').tabs('add',{
					title:title,
					content:content,
					closable:true,
					fit:false
				});
				//$('#tt').tabs('resize');
			}
*/		 

		
		}
		
		function addTab2(title, url){
			if ($('#tt').tabs('exists', title)){
				$('#tt').tabs('select', title);
			} else {
				var content = '<iframe scrolling="auto" frameborder="0"  src="'+url+'" style="width:100%;height:100%;"></iframe>';
				$('#tt').tabs('add',{
					title:title,
					content:content,
					closable:true
				});
			}
		}

		function removePanel(){
			var tab = $('#tt').tabs('getSelected');
			if (tab){
				var index = $('#tt').tabs('getTabIndex', tab);
				$('#tt').tabs('close', index);
			}
			$('#tt').tabs('resize');
		}
 
 
$(".myMenu").width(1200-120);
	</script>

	
	</div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
 
    <script src="<?=my_url();?>assets/js/bootstrap.js"></script>