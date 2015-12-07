玄甲明
xuanjm@tarena.com.cn

--------------------------
1,项目需求
	模拟当当网开发一套电子商务系统
	模拟实现产品的浏览，购物车，订单，用户管理
	
	1）用户管理（3天）
		用户注册，
		用户登录
	2）产品浏览模块（2天）
		产品主界面
		分类浏览页面
		产品的详细
	3）购物车模块（1.5天）
		购买，修改产品数量，删除
	4）订单模块（1.5天）
		订单确认，填写送货地址，订单生成
2,技术架构
	基于mvc模式分层架构
	主要采用Ajax+JQuery+Strus2+JDBC开发技术
	m 模型层：Service（复杂业务逻辑） + DAO（JDBC）
	v 表现层：JSP，JS（Ajax+JQuery）
	c 控制层：struts2 前端控制器+Action
3，数据库设计
	d_product: 产品信息表
	d_book： 	图书（特有属性）信息表
	d_category：图书类别表
	d_category_product： 类别和产品的关系维护的中间表
	d_receive_address：收货地址表
	d_order:	订单信息表
	d_user: 	存储用户信息
	d_item:		条目信息表，订单明细
1.2.3
4，搭建开发工程
	1）开发包
		struts2 6个
		JDBC 驱动包 --连接池（3个）
	2）src结构
		com.tarena.dangdang.action
		com.tarena.dangdang.action.user
		com.tarena.dangdang.action.main
		com.tarena.dangdang.action.cart
		com.tarena.dangdang.action.order
		
		com.tarena.dangdang.service
		
		com.tarena.dangdang.dao
		
		com.tarena.dangdang.entity
		
		com.tarena.dangdang.util
		
		com.tarena.dangdang.test		
----------------------------
使用strut2：
	1，倒包
	2，写struts.xml主配置文件
	3，修改web.xml配置文件，将struts2加入到web工程
-----------------------------
使用dbcp：
	1，倒包
	2，写xxxx.properties数据源配置文件
	3，写代码利用dbcp获得并管理连接
-----------------------------
用户注册：
	1，写js脚本
	2，把js脚本引入你的jsp文件
	3，js写的事件：
		blur(), submit(),
		自定义函数：
			require()，非空验证，要拿到节点(输入框)的值$('#id').val()，判断是否为空==''
			verifyPattern()，根据我们自己制定的正则表达式判断输入文本是否符合格式规范，
					要拿到节点(输入框)的值$('#id').val()，判断是否符合正则表达式patt.test(val)
			repeatPass()，判断第二次输入密码与第一次输入密码是否一致。
					要拿到第一次输入密码$('#id').val()，还要拿到第二次输入密码$('#id').val()，两次密码比对==
			remote()，远程向服务器发请求，根据服务器处理响应结果，去更新提示信息。
					底层调用的是ajax(),url,data,success,async
流程：blur()--->require()-->verifyPattern()		
细节：ID选择器：$('#id').val()
---------
如何向服务器发请求：
	浏览器页面 --------------  服务器-控制器 -------------处理类处理方法
	地址链接						映射文件匹配(关系)				action-->service-->dao
	
地址链接: /dangdang/user/genVerifyCode
控制器配置：
<package name="dang-user" extends="dang-default" namespace="/user"> 
		<action name="genVerifyCode" //请求地址的URLpattern
					class="com.tarena.dangdang.action.user.VerifyCodeAction"  //处理类
					method="genVerifyCode"> //处理方法
			<result name="success" type="stream">
				<param name="inputName">imgStream</param>
			</result>
		</action>
</package>
-----------------
处理类处理方法--处理请求：
	生成一张验证码图片：
		Map<String, BufferedImage> imgMap = VerifyCodeUtil.genVerifyCode(); //使用工具类生成图片
		String放入session//以后供用户输入判断用
		ImageIO.write()//把图片转为一个流
	检查验证码是否正确：
		01，取到验证码生成时放入session的那个验证码字符串
		02，取到用户页面输入值
		03，拿两个值比较equalsIgnoreCase()
	检查邮箱是否已经注册过：
		请求交给action处理后，后续调用了service--->dao，
		其中service负责业务逻辑的处理，
		dao负责数据业务的处理，
		把service需要的数据从数据查询取出--返回给service--对数据处理--返回结果给action
---------------------------------------------------------
1,VerifyCodeAction-->session.put(VERIFY_CODE,strCode);session.get(VERIFY_CODE);
2,public class BaseAction extends ActionSupport implements RequestAware,SessionAware,Constants
3,创建Constants接口,添加VERIFY_CODE常量属性
--------------------------
从页面传值到action--------action处理完成要返回值到页面
页面：注意节点的name属性----user.email
action：定义一个与页面节点name同名的属性user，书写get，set方法
-------------------



	