<?php
    
    use app\lib\Model;
    
	$title = "Demo 列表";
	/*
    设置列表，表头
    "mobile"=>array("name"=>"所属分会"),"sort"=>true,"width"=>"120","head_str"=>"width='30' nowrap","align"=>"left"),
    mobile 显示的字段
    name     表头名称
    sort     是否排序，默认false 不排序
    width    列宽度
    head_str 表头的其他信息
    data_str 数据其他信息
    align    设置内容项位置：left,center,right 默认是居中center
    nowrap   设置表格内容过长时是否进行缩进，默认false
    */
    $list_set = array(
        "checkbox"=>array("name"=>"选择","width"=>"30"),
        "orderno"=>array("name"=>"订单号","width"=>"120"),
        "businessid"=>array("name"=>"所属商家"),
        "isanonymous"=>array("name"=>"是否匿名",'data_arr'=>['0'=>'非','1'=>"是"]),
        "scores"=>array("name"=>"评分"),
        "content"=>array("name"=>"内容"),
        "frommembername"=>array("name"=>"会员名"), 
        "addtime"=>array("name"=>"评论时间"), //自定义的显示值
        "act"=>array("name"=>"操作","width"=>"200"),
    );

    /*
    前端显示数据处理
    也可以在controller中处理
    */
    foreach($pagelist as $key=>$row){
    

         $pagelist[$key]['businessid'] = Model::ins('StoBusinessInfo')->getRow(['id'=>$row['businessid']],'businessname')['businessname'];

        $pagelist[$key]['act'][]= array("type"=>"confirm","name"=>"button","value"=>"删除","_width"=>"500","_height"=>"200","_title"=>'是否确定删除该记录?',"_url"=>"/Evaluate/Index/delstoeva?ids=".Encode($row['id']));

        $pagelist[$key]['act'] = Html::Htmlact($pagelist[$key]['act']);
	}

    /*
    设置搜索项
    "keyword"=>array("type"=>"text","name"=>"商品名称/关键字","value"=>$this->_request->getParam("keyword")),
    "keyword" 表示搜索项的名称
    "type"    类型：text | select | time | times 
    "value"   初始化值，之后的值自动获取到，但是controller层需要把数据提交过来
    "name"    中文说明
    "option"  设置select类型的下拉选项
    "dateFmt" 1-年月日（默认） 2-年月日时分秒 3-年月 4-年  用于时间控件
	
    说明：times类型下，表单的命名自动在前面加"start_"和"end_"
          显示的值  自动获取 
    */
 	$search = array(
        "orderno"=>array("type"=>"text","name"=>"订单号","value"=>""),
        "businessname"=>array("type"=>"text","name"=>"所属商家"),
        "addtime"=>array("type"=>"times","name"=>"添加时间","start_value"=>'',"end_value"=>'')
    );

    //帮助说明内容
    $helpstr = "暂无帮助内容";
    //$export_url = "/demo/pub/export"; //导出数据的action

    //自动生成按钮
    $button = array(
          "bt2"=>array("type"=>"confirm_all","name"=>"button","value"=>"批量删除","_width"=>"500","_height"=>"200","_title"=>'删除选中项?',"_url"=>"/Evaluate/Index/delstoeva?rel=delete")
        );
?> 
<?php if ($full_page){?>
<!---头部-->
{include file="Pub/header" /}
{include file="Pub/pubHead" /}
<!---头部-->
			<!---搜索条件-->
			{include file="Pub/pubSearch" /}
			<!---搜索条件-->
            
            <!---这里可以写操作按钮等-->
                  
            <!---这里可以写操作按钮等-->
<?php }?>
			
			<!---列表+分页-->		
			{include file="Pub/pubList" /}
			<!---列表+分页-->
<?php if ($full_page){?>
<!---尾部-->
{include file="Pub/pubTail" /}
{include file="Pub/footer" /}
<!---尾部-->
<?php }?>