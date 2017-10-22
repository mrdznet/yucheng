<?php if ($full_page){?>

<div class="search_bar search_bar_empty">

<form method="GET" class="form-inline" action="javascript:listTable.search()" id="searcherForm" name="searcherForm">
				<div class="text-c cl" style="width:100%;"> 
						<div>  
							<?php
								if(!empty($search)){
								$searchAdvanced = "";
								//echo "<div id=\"divGeneralSearch\" style='display:block;'>";
								$i = 0;
								foreach($search as $key=>$value){
									//echo "<div class='show_more_".$key."'>";
										//$searchAdvanced .="<span>";
										if($i >= 3){
											$searchAdvanced .="<div class='search-item more' style='float:left'>";
										}else{ // class='nomore'
											$searchAdvanced .="<div class='search-item' style='float:left'>";
										}
										if($value['name']!='')
											$searchAdvanced .=$value['name']."：";
										if($value['type']=='text'){
											$searchAdvanced .=Html::text(array("name"=>$key,"placeholder"=>($value['placeholder']!=''?$value['placeholder']:$value['name']),"value"=>($value['value']!=''?$value['value']:$$key),'other'=>$value['other']));
											$searchAdvanced .="&nbsp;";
										}elseif($value['type']=='select'){
											$searchAdvanced .=Html::select(array("name"=>$key,"option"=>$value['option'],"top_option"=>$value['top_option'],"value"=>($value['value']!=''?$value['value']:$$key),'other'=>$value['other']));
											$searchAdvanced .="&nbsp;";
										}elseif($value['type']=='time'){
											$searchAdvanced .=Html::time(array("name"=>$key,"dateFmt"=>(!empty($value['dateFmt'])?$value['dateFmt']:1),"placeholder"=>($value['placeholder']!=''?$value['placeholder']:$value['name']),"value"=>($value['value']!=''?$value['value']:$$key),'other'=>$value['other']));
											$searchAdvanced .="&nbsp;";
										}elseif($value['type']=='times'){
											$searchAdvanced .=Html::times(array("start"=>"start_".$key,"start_value"=>(!empty(${"start_".$key})?${"start_".$key}:$value['start_value']),"end"=>"end_".$key,"end_value"=>(!empty(${"end_".$key})?${"end_".$key}:$value['end_value']),"maxminflag"=>true,"placeholder"=>($value['placeholder']!=''?$value['placeholder']:$value['name']),'other'=>$value['other'],'style'=>$value['style']));
											$searchAdvanced .="&nbsp;";
										}elseif($value['type']=='area'){
											$searchAdvanced .=Html::area(array("name"=>$key,"value"=>$value['value'],'other'=>$value['other'],"class"=>$value['class']));
										}elseif($value['type']=='category'){
											$searchAdvanced .=Html::category(array("name"=>$key,"value"=>$value['value'],'other'=>$value['other']));
											
										}elseif ($value['type'] = 'hidden') {
											$searchAdvanced .=Html::hidden(array("name"=>$key,"placeholder"=>($value['placeholder']!=''?$value['placeholder']:$value['name']),"value"=>($value['value']!=''?$value['value']:$$key)));
											$searchAdvanced .="&nbsp;";
										}
										
											
										if($i >= 3){
											$searchAdvanced .="</div>";
										}else{
											$searchAdvanced .="</div>";
										}
											
										
									$i++;
										
								}
								// if ($hasAdvanced){
								// 	echo " <input type=\"checkbox\" id=\"checkAdvanced\" name=\"高级查询\">高级查询 ";
								// }
								// echo 	" <span class=\"addbtn\"> \n";
								// echo 	"<button type=\"submit\" class=\"btn btn-success\" id=\"btn_search\" > 搜索</button>\n";
								//echo 	"</span> \n";
								//echo "</div>";
							

								echo " <div id=\"divAdvancedSearch\" >".$searchAdvanced." ";
								echo "<button type=\"submit\" class=\"btn btn-success btn-height\" id=\"btn_search_advanced\" style=\"margin-left:2px;margin-top:14px;float:left;\" > 搜索</button>\n";
								echo "<button onClick=\"javascript:location.replace(location.href);\" class=\"btn btn-danger  btn-height\" id=\"btn_search_advanced\" style=\"margin-left:6px;margin-top:14px;float:left;\" > 刷新</button>\n";
			
								//echo 	" <span class=\"addbtn\"> \n";
								
								//echo 	"</span> \n";
								echo "</div>\n";
								
								// echo 	"<button type=\"submit\" class=\"btn   btn-success\" id=\"btn_search_advanced\" style=\"line-height:1.6em;margin-top:3px;margin-left:2px;position:absolute;right:60px;top:50px;\" > 搜索</button>\n";

								//echo '<a title="刷新" href="javascript:location.replace(location.href);" style="line-height:1.6em;margin-top:3px;margin-left:2px;margin-top:12px;position:absolute;right:10px;" class="btn btn-success radius"><i class="Hui-iconfont"></i></a>';

								// 
								

							?>

							<?php }?>
						</div> 
						
			</div>
			
			<script>
				$(function(){
					//如果有高级查询就显示
					if($('.more').length != 0){
						$("#search").show();
					}

				});
				//切换简单查询
				$("#checkAdvanced").click(function() { 

						$('.more').show();
						var search = "<input type=\"checkbox\" id=\"checkGeneral\" name=\"简单查询\" onclick=\"showMore()\">简单查询";
						$("#search").html(search);
					
					});  
			
				//切换高级查询
				function showMore(){
					$('.more').hide();
					var searchs = "<input  type=\"checkbox\" id=\"checkAdvanced\" name=\"高级查询\" onclick=\"hideMore()\">高级查询";
					$("#search").html(searchs);
				}
				//切换简单查询
				function hideMore(){
					$('.more').show();
					var search = "<input  type=\"checkbox\" id=\"checkGeneral\" name=\"简单查询\" onclick=\"showMore()\">简单查询";
					$("#search").html(search);
				}


			</script>


			<?php if($export_url!=''){
				echo Html::hidden(array("name"=>"export_url","value"=>$export_url));
				echo Html::hidden(array("name"=>"excel_key","value"=>""));
			}?>
			</form>
		
		</div>
		<?php if(!empty($helpstr)){?>
		<!-- 	<div id="helppop" class="cl pd-5 bg-1 bk-gray mt-20">
				<div class="dialog">
					<div class="dialog-head">
						<span class="close rotate-hover"></span><strong>帮助</strong>
					</div>
					<div class="dialog-body">
						<?=$helpstr?>
					</div>
					<div class="dialog-foot">
						<button class="btn">
							关闭</button>
					</div>
				</div>
			</div> -->
		<?php }?>
		<div class="toolbar clearfix cl">
			<div class="checkestatus" >
			<?php if(!empty($button)){
					foreach($button as $bt_key=>$bt_val){
						//$bt_val['class']="bg-main";
						echo Html::button($bt_val)."&nbsp;";
				} }?>
				<?php if($export_url!=''){?>
				<button class="btn btn-secondary-outline icon-download button-small" id="btn-export" _url="/Sys/Excel/export/" onClick="javascript:export_data();"> 导出</button>

				<script>
					function export_data(){
						var export_url = $("#export_url").val();
						var excel_key  = $("#excel_key").val();
						$.post("/Sys/Excel/getexcelkey",{export_url:export_url,excel_key:excel_key},function(data){
							$("#excel_key").val(data);
							listTable.exportData();
						});
					}

					$(function(){
						$("button[type='submit']").on("click",function(){ 
							$("#excel_key").val('');
						});
					});

				</script>
				<?php }?>
				<?php if(!empty($helpstr)){?>
				<!-- <button class="btn " data-toggle="click" data-target="#helppop" data-mask="1" data-width="50%" >帮助</button>  -->
				<?php }?>
			</div>
		</div>
<?php }?>				
				
			
