PureMVC
在PureMVC中，通知（Notification）贯穿整个框架，把观察者模式发挥得淋漓尽致。MVC的三层通信都是通过Notification来通信
Notification由两部分组成：Name和Body。如果把Notification当作是邮件，那么Name就是收件人，不过在PureMVC中可以有多个观察者
接收相同的邮件，Body自然就是Notification的内容了。Notification和Observer的关系是1:N
http://www.oschina.net/question/54100_14947
http://www.cnblogs.com/reallypride/archive/2008/09/14/1290730.html 
《大型网站技术架构》 《高性能MySQL》
PureMVC框架的目标很明确，即把程序分为低耦合的三层：Model、View和Controller。它们合称为PureMVC框架的核心，由Facade统一管理。关于它的核心层，
我们不需要管太多，只需要记得下面几点就可以了：

一、Model保存对Proxy对象的引用，Proxy负责操作数据模型，与远程服务通信存取数据。

二、View保存对Mediator对象的引用。由Mediator对象来操作具体的视图组件（View Component，例如Flex的DataGrid组件），包括：添加事件监听器，发送
或接收Notification ，直接改变视图组件的状态。

三、Controller保存所有Command的映射。Command可以获取Proxy对象并与之交互，通过发送Notification来执行其他的Command。

上面的什么对什么的引用，可以一开始看的时候很难理解，我们暂时不用管它谁对谁的引用的。这些已经由框架为我们管理好了，我们要所要做的是编写具体
的Command，Mediator，Proxy。

一、Proxy是负责操作数据模型的，什么是数据模型？数据模型就是数据库，XML等等。我们可以直观地理解为，Proxy是用来对数据模型进行查询、插入、
更新、删除等操作的类。操作完成后，它就会发送Notification，也就是通知，告诉其它两个层我已经完成工作了。

二、Mediator负责操作具体的视图组件，包括：添加事件监听器，发送或接收Notification ，直接改变视图组件的状态。好像抽象了点。具体的说吧，
Mediator是负责管理用户界面，与用户进行交互操作的。如：给Button添加事件，当用户点击按钮时，发送Notification，告诉Controler我们执行什么样的
操作。比如这是一个登录的按钮，那么Mediator就会告诉发送通知给Controler，告诉它要执行登录操作。此外，Mediator还负责直接改变视图的状态。就像，我点击了登录按钮后，Mediator就改变它，让登录按钮不过用，避免重复操作。它还可以在视图上显示一条信息，告诉我正在执行登录操作。总的来说，Mediator是用来管理视图的。

三、Command可以获取Proxy对象并与之交互，通过发送Notification来执行其他的Command。再拿上面的登录例子作解释，当点击了登录按钮后，Mediator就
会告诉Controler要执行相应的Command了，比如LoginComand。既然是登录，那么还得要知道用户的信息才行。Command就会发送Notification告知Proxy，
我需要某个用户的信息。那么Proxy就会访问数据库（也可以是别的数据模型），查询对应的用户信息，然后发送Notification通知Command我已经查询好了，
差把信息返回给Command进行验证，与些同时，Mediator也可以接收Proxy发送的Notification，通过视图告诉用户正在验证信息。Command验证了用户信息后，
送Notification把验证结果返回给Mediatory，告诉用户验证的结果。或者，Command也可以发送Notification执行其它的Command操作，比如验证通过后，
读取用户的详细资料。




