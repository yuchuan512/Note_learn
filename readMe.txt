������
xuanjm@tarena.com.cn

--------------------------
1,��Ŀ����
	ģ�⵱��������һ�׵�������ϵͳ
	ģ��ʵ�ֲ�Ʒ����������ﳵ���������û�����
	
	1���û�����3�죩
		�û�ע�ᣬ
		�û���¼
	2����Ʒ���ģ�飨2�죩
		��Ʒ������
		�������ҳ��
		��Ʒ����ϸ
	3�����ﳵģ�飨1.5�죩
		�����޸Ĳ�Ʒ������ɾ��
	4������ģ�飨1.5�죩
		����ȷ�ϣ���д�ͻ���ַ����������
2,�����ܹ�
	����mvcģʽ�ֲ�ܹ�
	��Ҫ����Ajax+JQuery+Strus2+JDBC��������
	m ģ�Ͳ㣺Service������ҵ���߼��� + DAO��JDBC��
	v ���ֲ㣺JSP��JS��Ajax+JQuery��
	c ���Ʋ㣺struts2 ǰ�˿�����+Action
3�����ݿ����
	d_product: ��Ʒ��Ϣ��
	d_book�� 	ͼ�飨�������ԣ���Ϣ��
	d_category��ͼ������
	d_category_product�� ���Ͳ�Ʒ�Ĺ�ϵά�����м��
	d_receive_address���ջ���ַ��
	d_order:	������Ϣ��
	d_user: 	�洢�û���Ϣ
	d_item:		��Ŀ��Ϣ��������ϸ
1.2.3
4�����������
	1��������
		struts2 6��
		JDBC ������ --���ӳأ�3����
	2��src�ṹ
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
ʹ��strut2��
	1������
	2��дstruts.xml�������ļ�
	3���޸�web.xml�����ļ�����struts2���뵽web����
-----------------------------
ʹ��dbcp��
	1������
	2��дxxxx.properties����Դ�����ļ�
	3��д��������dbcp��ò���������
-----------------------------
�û�ע�᣺
	1��дjs�ű�
	2����js�ű��������jsp�ļ�
	3��jsд���¼���
		blur(), submit(),
		�Զ��庯����
			require()���ǿ���֤��Ҫ�õ��ڵ�(�����)��ֵ$('#id').val()���ж��Ƿ�Ϊ��==''
			verifyPattern()�����������Լ��ƶ���������ʽ�ж������ı��Ƿ���ϸ�ʽ�淶��
					Ҫ�õ��ڵ�(�����)��ֵ$('#id').val()���ж��Ƿ����������ʽpatt.test(val)
			repeatPass()���жϵڶ��������������һ�����������Ƿ�һ�¡�
					Ҫ�õ���һ����������$('#id').val()����Ҫ�õ��ڶ�����������$('#id').val()����������ȶ�==
			remote()��Զ��������������󣬸��ݷ�����������Ӧ�����ȥ������ʾ��Ϣ��
					�ײ���õ���ajax(),url,data,success,async
���̣�blur()--->require()-->verifyPattern()		
ϸ�ڣ�IDѡ������$('#id').val()
---------
����������������
	�����ҳ�� --------------  ������-������ -------------�����ദ����
	��ַ����						ӳ���ļ�ƥ��(��ϵ)				action-->service-->dao
	
��ַ����: /dangdang/user/genVerifyCode
���������ã�
<package name="dang-user" extends="dang-default" namespace="/user"> 
		<action name="genVerifyCode" //�����ַ��URLpattern
					class="com.tarena.dangdang.action.user.VerifyCodeAction"  //������
					method="genVerifyCode"> //������
			<result name="success" type="stream">
				<param name="inputName">imgStream</param>
			</result>
		</action>
</package>
-----------------
�����ദ����--��������
	����һ����֤��ͼƬ��
		Map<String, BufferedImage> imgMap = VerifyCodeUtil.genVerifyCode(); //ʹ�ù���������ͼƬ
		String����session//�Ժ��û������ж���
		ImageIO.write()//��ͼƬתΪһ����
	�����֤���Ƿ���ȷ��
		01��ȡ����֤������ʱ����session���Ǹ���֤���ַ���
		02��ȡ���û�ҳ������ֵ
		03��������ֵ�Ƚ�equalsIgnoreCase()
	��������Ƿ��Ѿ�ע�����
		���󽻸�action����󣬺���������service--->dao��
		����service����ҵ���߼��Ĵ���
		dao��������ҵ��Ĵ���
		��service��Ҫ�����ݴ����ݲ�ѯȡ��--���ظ�service--�����ݴ���--���ؽ����action
---------------------------------------------------------
1,VerifyCodeAction-->session.put(VERIFY_CODE,strCode);session.get(VERIFY_CODE);
2,public class BaseAction extends ActionSupport implements RequestAware,SessionAware,Constants
3,����Constants�ӿ�,���VERIFY_CODE��������
--------------------------
��ҳ�洫ֵ��action--------action�������Ҫ����ֵ��ҳ��
ҳ�棺ע��ڵ��name����----user.email
action������һ����ҳ��ڵ�nameͬ��������user����дget��set����
-------------------



	