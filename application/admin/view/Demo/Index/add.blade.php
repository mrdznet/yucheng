{include file="Pub/header" /}
<?php 
    /*
    说明：
    "name"=>array("type"=>"text","name"=>_("姓名")),
    "name" 表单名

    "type"=>"text" 表单类型   
            html表单类型
            "hidden" 标识生成一个input hidden表单
            "title" 生成一个标题
    "name"=>_("姓名") 表单名称
    "head_width"=>""  //head表格的宽度
    "data_width"=>""  //数据项表格的宽度
    "head_style"=>"" 扩展head td的属性如："head_style"=>"align='center' style='color:red'"
    "data_style"=>"" 扩展data td的属性
    注意：value可以不自己设，系统可以自动获取
    validator 校验表单 以字符串形式定义：
            写法1："validator"=>"required:true,email: true",
            写法2："validator"=>array(
                                    "rules"=>"required:true,email:true",
                                    //下面messages自定义表单判断的输出提示
                                    "messages"=>array(
                                        "required"=>"不能为空",
                                        "email"=>"邮箱地址格式不对",
                                    ),
                                ),
            多个规则用","分隔
            规则：
            required:true   必须输入的字段。
                            radio 的 required 表示必须选中一个。
                            checkbox 的 required 表示必须选中。
                            checkbox 的 minlength 表示必须选中的最小个数，maxlength 表示最大的选中个数，rangelength:[2,3] 表示选中个数区间。
                            select 的 required 表示选中的 value 不能为空。
            email:true  必须输入正确格式的电子邮件。
            url:true    必须输入正确格式的网址。
            date:true   必须输入正确格式的日期。日期校验 ie6 出错，慎用。
            number:true 必须输入合法的数字（负数，小数）。
            digits:true 必须输入整数。
            creditcard: 必须输入合法的信用卡号。
            equalTo:"#field"    输入值必须和 #field 相同。
            accept: 输入拥有合法后缀名的字符串（上传文件的后缀）。
            maxlength:5 输入长度最多是 5 的字符串（汉字算一个字符）。
            minlength:10    输入长度最小是 10 的字符串（汉字算一个字符）。
            rangelength:[5,10]  输入长度必须介于 5 和 10 之间的字符串（汉字算一个字符）。
            range:[5,10]    输入值必须介于 5 和 10 之间。
            max:5   输入值不能大于 5。
            min:10  输入值不能小于 10。
            //异步表单请求 只能返回true或false
            remote:{ 
                        type:"POST",
                        url:"/product/index/ajaxproductcode/" + Math.random(),             
                        dataType:"json",
                        data:{  
                            productcode:function(){return $("#productcode").val();},
                            id:  function(){return $("#productcode").attr("enctype");}
                        }
                    }
        "messages"=>"姓名不能为空哦",自定义表单校验内容
        弹窗模式和独立页面模式
        "submit"=>array("type"=>"submit","name"=>"提交"), //加该参数表示独立页面，不加该参数表示弹窗
    */
    $action = "/demo/pub/edit";//定义表单提交的路径
    //$field_type ='detail'; //表示以查看详情的方式显示
    $field = array(
            "name"=>array("type"=>"text","name"=>"姓名","value"=>"测试","validator"=>"required:true","messages"=>"姓名不能为空哦","head_width"=>"100"),
            "mobile"=>array("type"=>"text","name"=>"电话","validator"=>"required:true,number:true","messages"=>"电话有问题哦"),
            "area"=>array("type"=>"area","name"=>"地区"),
            //"title1"=>array("type"=>"title","name"=>"<font color='red'>标题1</font>"),
            "type"=>array("type"=>"select","name"=>"类型","option"=>array("1"=>"类型1","2"=>"类型2","3"=>"类型3"),"value"=>"1","validator"=>"required:true"),
            
            "time"=>array("type"=>"time","name"=>"时间","value"=>"2016-01-01","validator"=>"required:true"),
            "times"=>array("type"=>"times","name"=>"时间范围","start_value"=>"2016-01-01","end_value"=>"2016-01-02","validator"=>"required:true"),
            //"area"=>array("type"=>"area","name"=>"地区","value"=>"230303"),
            "img1"=>array("type"=>"imgupload","name"=>"图片1","validator"=>"required:true"),
            "img2"=>array("type"=>"imgupload","name"=>"图片2","options"=>array("maxNumberOfFiles"=>2)),
            "radio"=>array("type"=>"radio","name"=>"raido控件","terms"=>array("1"=>"选项1","2"=>"选项2"),"value"=>"2"),
            "checkbox"=>array("type"=>"checkbox","name"=>"checkbox控件","terms"=>array("1"=>"选项1","2"=>"选项2","3"=>"选项3"),"value"=>"1,3","validator"=>"required:true,minlength:1"), //value也可以为数组
            "textarea"=>array("type"=>"textarea","name"=>"内容项","value"=>"123","validator"=>"required:true"),
            "edit"=>array("type"=>"edit","name"=>"编辑内容","width"=>"300","height"=>"200","value"=>"11122","validator"=>"required:true"),
            "id"=>array("type"=>"hidden","value"=>Encode("1")),
            "bid"=>array("type"=>"hidden","value"=>'123'),
            //"submit"=>array("type"=>"submit","name"=>"提交"), //加该参数表示独立页面，不加该参数表示弹窗
        );
    //echo $this->action;
?>


<!---地区控件的js-->

<!---上传图片的js-->
<link rel="stylesheet" href="/jQueryFileUpload/css/fileupload.css">
<script src="/jQueryFileUpload/js/vendor/jquery.ui.widget.js"></script>
<script src="/jQueryFileUpload/js/load-image.all.min.js"></script>
<script src="/jQueryFileUpload/js/canvas-to-blob.min.js"></script>
<script src="/jQueryFileUpload/js/jquery.iframe-transport.js"></script>
<script src="/jQueryFileUpload/js/jquery.fileupload.js"></script>
<script src="/jQueryFileUpload/js/jquery.fileupload-process.js"></script>
<script src="/jQueryFileUpload/js/jquery.fileupload-image.js"></script>
<script src="/jQueryFileUpload/js/jquery.fileupload-validate.js"></script>
<script src="/jQueryFileUpload/js/fileupload.js"></script>


<!---文本编辑框的js-->
<script type="text/javascript" charset="utf-8" src="/Ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Ueditor/ueditor.all.min.js"> </script>

{include file="Pub/pubAdd" /}
{include file="Pub/footer" /}