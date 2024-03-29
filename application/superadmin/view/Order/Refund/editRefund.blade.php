<?php
use app\lib\Img;
?>
{include file="Pub/header" /}
<style>
.page-container{
    margin-bottom: 150px;
}
.order_detail_title{
    margin-top:0;
    font-size: 18px;
}
</style>
<?php $return_type = array("1" => "退款", "2" => "退款退货");?>
<div class="page-container addOrder">
	<div class="font-bold subtitle order_detail_title">订单商品</div>
	<div class="purchaseProducts">
		<div class="mt-20">
			<table id="showproduct" class="table-bordered table table-border table-bg table-hover table-sort">
				<tr class="text-c">
					<th>商品名称</th>
					<th>商品属性</th>
					<th>商品价格</th>
					<th>购买量</th>
					<th>总金额</th>
					<th>总牛豆</th>
				</tr>
				<?php if(!empty($itemData)) {?>
					<?php foreach ($itemData as $item) {?>
						<tr class="text-c">
							<td><?=$item['productname'] ?></td>
							<td><?=$item['skudetail'] ?></td>
							<td><?=DePrice($item['prouctprice'])?></td>
							<td><?=$item['productnum']?></td>
							<td><?php echo DePrice($item['prouctprice'] * $item['productnum'])?></td>
							<td><?php echo DePrice($item['bullamount'] * $item['productnum'])?></td>
						</tr>
					<?php }?>
				<?php }?>
				<tr>
					<td colspan="10" style="text-align: right;">
						商品金额合计：<span id="countNumber" class="font-gold" style="font-size: 18px;font-weight: bold;"><?=DePrice($orderData['productamount'])?>
						快递费：<span id="countNumber" class="font-gold" style="font-size: 18px;font-weight: bold;"><?=DePrice($orderData['actualfreight'])?>
						牛币总计：<span id="countNumber" class="font-gold" style="font-size: 18px;font-weight: bold;"><?=DePrice($orderData['bullamount'])?>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="font-bold subtitle order_detail_title">退单信息</div>
	<div class="agintsli">
		<ul><li><span>退单类型：</span><span class="c-999"><?=$return_type[$returnData['return_type']]?></span></li></ul>
		<ul><li><span>退单原因：</span><span class="c-999"><?=$returnData['returnreason'];?></span></li></ul>
		<ul><li><span>退单金额：</span><span class="c-999"><?=DePrice($returnData['returnamount'])?></span></li></ul>
		<ul><li><span>退单牛豆：</span><span class="c-999"><?=DePrice($returnData['returnbull'])?></span></li></ul>
		<ul><li><span>退单说明：</span><span class="c-999"><?=$returnData['remark']?></span></li></ul>
		<ul><li><span>退货凭证：</span><span class="c-999">
		<?php if(!empty($returnData['images'])) { $image_arr = explode(",", $returnData['images']);?>
			<?php foreach ($image_arr as $image) {?>
				<img alt="" src="<?=Img::url($image)?>">
			<?php }?>
		<?php }?>
		</span></li></ul>
		<ul><li><span>退单申请时间：</span><span class="c-999"><?=$returnData['starttime']?></span></li></ul>
	</div>
	<div class="purchaseProducts">
		<div class="mt-20">
			<table id="showproduct" class="table-bordered table table-border table-bg table-hover table-sort">
				<tr class="text-c">
					<th>商品名称</th>
					<th>商品属性</th>
					<th>商品价格</th>
					<th>退货数</th>
				</tr>
				<?php if(!empty($returnItemData)) {?>
					<tr class="text-c">
						<td><?=$returnItemData['productname']?></td>
						<td><?=$returnItemData['skudetail'] ?></td>
						<td><?=DePrice($returnData['returnamount'])?></td>
						<td><?=$returnData['productnum']?></td>
					</tr>
				<?php }?>
			</table>
		</div>
	</div>
	<div class="font-bold subtitle order_detail_title">退单申请处理</div>
	<div class="agintsLi">
		<form action="<?=$actionArr['refundExam']?>" id="examform" method="post">
			<input type="hidden" value="<?=$returnData['id']?>" name="return_id">
    		<ul><li><span><input type="radio" name="orderstatus" value="<?php if($returnData['return_type'] == 1) {echo 2;} else {echo 12;}?>" id="success">同意</span></li></ul>
    		<ul><li><span><input type="radio" name="orderstatus" value="<?php if($returnData['return_type'] == 1) {echo 3;} else {echo 13;}?>" id="fail">拒绝</span></li>
    			<li><span>拒绝原因：<input type="text" name="reason" id="reason" placeholder="20字以内" disabled="disabled"></span></li>
    			<li><span><input type="button" value="提交" id="delivery"></span></li></ul>
    	</form>
	</div>
</div>
<script type="text/javascript">
$("#success").click(function() {
	$("#reason").attr('disabled', true);
});
$("#fail").click(function() {
	$("#reason").attr('disabled', false);
});
$("#delivery").click(function(){
	var num = $('input[name="orderstatus"]:checked').val();
	if(num == null) {
		alert("请选择申请处理");
		return false;
	}
	$("#examform").submit();
});
</script>
{include file="Pub/footer" /}