include_once() 语句和include()几乎相同，区别在于会在导入文件前先检测该文件是否存在该页面的其他部分被调用过，如果有的话就不会重复导入该文件

include() and require() 的区别:
require() 如果没有找到调用文件会输出错误信息，并立即终止脚本的处理
include() 输出警告，不会终止脚本的运行

if($a and $b)
常用的变量函数:
empty gettype intval  is_array is_int is_numeric isset unset var_dump

常用的字符串函数:
explode
ltrim rtrim trim 去除开始位置和结束位置的空白字符，并返回去掉空白字符后的字符串

md5
strlen
str_ireplace('mr(目标)','soft',$arr) 
str_repeat
str_replace 
strchr
stristr
strstr eg: $pic_name = strstr($pic_name,"."). 通过strstr()函数截取后缀
if($pic_name==".jpg")继续判断

substr_replace
string substr(string str,int start[,length])


时间
checkdate  $check = checkdate(7,32,2010)  
date
microtime

time 返回一个日期的UNIX时间戳 
eg: echo "time:".time()."<br>";
	echo "format:".date("Y-m-d",time());

strtotime
time

数学函数库
ceil
mt_rand
mt_srand
rand
max     eg:$array = array(12,32,22,33,44,5,6,10);
	        echo "max is :".max($array);
round 对浮点数四舍五入
floor  echo floor(8.9)返回8

history.back)()返回当前页面
php文件系统函数库:
basename 返回文件路径中基本的文件名
copy 将某文件由当前目录复制到其他目录，成功返回true
file_exists 判断制定目录或文件是否存在
file_put_contents  将字符串写入指定的文件中
file 读取某文件内容，结果保存到数组中，数组内每个元素对应读取文件的一行
filetype 返回文件类型，有 fifo,char,dir,block,link,file 和unknow
fopen 打开文件，并返回该文件的标示指针
fread 读取指定长度数据
is_dir 若为目录且该目录存在，返回true
is_uploaded_file 判断文件是否用http pose方式上传，若是返回true
move_uploaded_file  应用POST方法上传文件
readfile 读入一个文件，并将读入的内容写入输出缓冲
rmdir 删除指定目录

利用javascript跳转页面
if(empty($user)||empty($password)){
			echo "<script>alert('user or passworld is not correct');
			window.location.href='collect/file_upload.php'</script>";
		}

手机号码正则表达式
<script type="text/javascript">
	function checkMobile(){ 
    var sMobile = document.mobileform.user.value ;
    if(!(/^1[3|4|5|8][0-9]\d{4,8}$/.test(sMobile))){ 
        alert("不是完整的11位手机号或者正确的手机号前七位"); 
        document.mobileform.user.focus(); 
        return false; 
    } 
} 

使用delete删除整个表的效率并不高，可以使用truncate语句，它可以很快的删除表中的所有内容

select selection_list
from table_list
where primary_constraint
group by grouping_columns
order by sorting_columns
having secondary_constraint
limit count

数字索引数组 $arr = array("php","java","C++")
关联数组 $arr = array("php"=>"PHP","java"=>"Java")
赋值eg: $arr['key']=value 或者 $arr[0]=value

遍历数组元素foreach()或者for循环
foreach($arr as $link)  echo $link
foreach($arr as $key => $link) echo $key.$link
for($i=0;$i<count($arr);$i++){  }
count($arr) 返回数组中元素的个数

array_push array_pop函数
int array_push(array array,mixed var [,mixed])  
eg:
array_push($arr,"C++")
$last_arr = array_pop($array)
array_unique($arr)
array_search("keys",$arr) 返回第一个匹配的
$name = array_keys($arr,"keys")   返回所有匹配的数组

explode 字符串到数组 implode数组到字符串 eg $str=explode("*",$arr)
利用rand随机返回两个最大数
srand((float)microtime()*10000000)  //随机种子
$rand_key = array_rand($arr,2);
$rand_key[0] $rand_key[1]

rsort 对数组排序
array_reverse() 逆序

list($a,$b,$c) = $arr;
in_array("php",$arr)
range(int low,int high,[,int step])
usort  自定义排序

web基础
table属性 bgcolor align border cellpadding内边距  cellspacing外边距  width height
<input type="hidden">传递隐藏元素
<input type="image" src="URL">使用图像来代替submit按钮
<hr>加入一条横线




alter table tb_admin add email varchar(50) not null,modify user varchar(80) 更改表的结构
rename table tb_admin to tb_user 更改表名 
drop table tb_user  删除表
desc tb_user 描述表
insert into tb_user values('1','yu','helloyu','2012-09-8','74893485@qq.com')

update tb_user set email="34345@qq.com" where id='2' 更新表中的数据
select * from tb_user where id limit 1,4 从第一条记录开始，取4条记录(注意:第一个结果的记录编号是0,不是1)
select * from tb_user where user like '_u'  like语句模糊查询
select * from tb_user order by id desc limit 2  order by语句

select distinct email from tb_user
select distinct *  from tb_user  查询去除重复字段

concat 函数可以联合多个字段，构成一个总的字符串
select id,concat(user,":",password) as info,email from tb_user

delete from tb_user where id='2'
update tb_user set password = 'hehehe' where user = 'ccc' 
在创建表时，使用字符串类型时应该遵循以下原则：
1）从速度方面考虑，要选择固定的列，可以使用char类型
2）要节省空间，使用动态的列，可以使用varchar类型
3）要将列中的内容限制于一种选择，可以使用enum类型
4）若允许在一个列中有多于一个的条目，可以使用set类型
5）如果要搜索的内容不区分大小写，可以使用text类型
6）如果要搜索的内容区分大小写，可以使用blob类型

date类型 格式YYYY-MM-DD
datetime类型 格式 YYYY-MM-DD HH:MM:SS

$conn=mysql_connect("localhost","root","root");
	$select = mysql_select_db("test11",$conn);
	$result = mysql_query("insert into tb_user values('yuchuan@qq.com')");

$arr = mysql_query("select * from tb_user");
	while($result = mysql_fetch_array($arr)){
		echo $result['email']."<br>";
	}
echo "nums:".mysql_num_rows($arr);  //获取查询结果集中的记录数

mysql_close() 函数关闭连接

conn.php
$conn = mysql_connect("lcoalhost","root","root");
	mysql_select_db("test11",$conn);
	mysql_query("set names utf8");

正则表达式
语法：
行定位符： ^ $
字符类 eg:mr不区分大小写 [Mn][Rr]
选择字符 (M|m)(R|r)
连字符: [a-zA-A]
排除字符 [^a-zA-Z]
限定符 (? * + {n,m})
? 匹配前面的字符零次或1次
* 匹配前面的字符零次或多次
+ 匹配前面的字符一次或多次
{n} 匹配前面的字符 n次
{n,} 匹配前面的字符最少n次
{n,m} 匹配前面的字符最少n次，最多m次

文件目录操作
fgetc()函数读取一个字符
fgets()函数读取一行字符

function type($number,$path="./count.txt"){
		if($number=="1"){
			echo '<h2>file_get_contents</h2>';
			echo file_get_contents($path);
		}else if($number=="2"){
			echo '<h2>readfile</h2>';
			readfile($path);
		}else{
			$array = file($path);
			for($a=0;$a<count($array);$a++){
				echo '#'.$array[$a]."<br>";
			}
		}

	}   #读文件三种方式 file_get_contents($path) readfile($path)

和  $array = file($path)

file_get_contents和file_put_contents
$pic = file_get_contents($path);
file_put_contents("./hello.txt", $pic);

目录--扫描当前目录，把结果存入数组
<?php
	$path="../";
	echo "path is:".realpath($path)."<br>";
	if(is_dir($path)){
		$path = scandir($path);
		for($a=0;$a<count($path);$a++){
			echo "#".$path[$a]."<br>";
		}
	}
	 
?>
 
全局变量 $_FILES
$_FILES[filename][name] 存储上传文件的文件名
$_FILES[filename][size]
$_FILES[filename][tmp_name]  存储文件在临时目录中使用的文件名
$_FILES[filename][type]  存储上传文件的MIME类型
$_FILES[filename][error]  存储与上传有关的错误代码

$files=$_FILES['name'];
		echo "path is:".$files['tmp_name']."<br>";
		echo "name is :".$files['name']."<br>";
		echo "type is :".$files['type']."<br>";
		echo "size is :".$files['size']."<br>";

<form action = "" method="post" enctype="multipart/form-data">

接口
<?php
	interface Person{
		public function say();
	}
	interface Pop{
		public function money();
	}
	class Member implements Person,Pop{
		public function say(){
			echo "i am a worker";
		}
		public function money(){
			echo "my salary is 1000";
		}
	}
	$man = new Member();
	$man->say();
	$man->money();
?>

多态有两种实现方法：通过继承实现多态和通过接口实现多态
继承实现多台eg
abstract class Type{
		abstract function go_Type();
	}
	class Type_car extends Type{
		public function go_Type(){
			echo "car to lasa";
		}
	}
	class Type_bus extends Type{
		public function go_Type(){
			echo "bus to lasa";
		}
	}
	function change($obj){
		if($obj instanceof Type){
			$obj->go_Type();
		}
	}
	change(new Type_car());
	echo "<br>";
	change(new Type_bus());

接口实现多态eg
interface Person{
		public function say();
	}
	
	class Jia implements Person{
		public function say(){
			echo "i am a worker";
		}
	}
	class Yi implements Person{
		public function say(){
			echo "i am a yi";
		}
	}
	function change($obj){
		if($obj instanceof Person){
			$obj->say();
		}
	}
	change(new Jia());
	echo "<br>";
	change(new Yi());

__toString()方法,改变echo输出内容的格式，对于某个类而言
eg:
<?php
	class People{
		public function __toString(){
			return "i am toString method";
		}
	}
	$per=new People();
	echo $per;	
?>

jcarousel插件 左右切换效果
easyslide插件  轮显效果
facelist插件  自动完成效果
mb menu插件 多级菜单

PDO 是 PHP Data Object(PHP数据对象)，是一个”数据访问抽象层“，作用是统一各种数据库的访问接口
在PDO中，要简历与数据库的连接需要实例化PDO的构造函数
DSN是data source name (数据源名称)，DSN提供连接数据库需要的信息

PDO用法
PDO函数
PDO::beginTransaction 开启一个事务，成功返回true，失败返回false
PDO::__construct 构造一个函数，实现通过PDO连接数据库，创建成功返回一个PDO对象
PDO::exec 返回收到影响结果的行数 针对 insert update 和delete
PDO::lastInsertId 获取最后一次执行插入语句是行或列对应的ID值
PDO::query
PDO::rollback
用代码行数测算软件开发进度如同按重量测算飞机制造进度。 --比尔盖茨
<?php
	$dbms='mysql';
	$dbName='test11';
	$user='root';
	$pwd='root';
	$host='localhost';
	$dsn="$dbms:host=$host;dbname=$dbName";
	
	try {
			$pdo=new PDO($dsn,$user,$pwd);
			$query = "select * from tb_user ";
			$result = $pdo->prepare($query);
			$result->execute();
			while($res = $result->fetch(PDO::FETCH_ASSOC)){
			?>
			<tr>
				<td height="22" align="center" valign="middle"><?php echo $res['id'];?></td>
				<td height="22" align="center" valign="middle"><?php echo $res['user'];?></td>
				<td height="22" align="center" valign="middle"><?php echo $res['password'];?></td>
				<br>
			</tr>
		<?php
			}
		} catch (Exception $e) {
			echo "error:".$e->getMessage()."<br>";
	}
?>
