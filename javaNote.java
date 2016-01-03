javaNote
面向接口编程
public interface USB {
   void use();
}
public class Flash implements USB {
    @Override
    public void use() {
        System.out.println("user usb");
    }
}
public class Computer {
    public static void plugin(usb usb){
        usb.use();
    }
    public static void main(String[] args) {
        Computer.plugin(new Flash());
    }
}
比如一般线上load高的问题排查步骤是
1. 先用top找到耗资源的进程

2. ps+grep找到对应的java进程/线程

3. jstack分析哪些线程阻塞了，阻塞在哪里

4. jstat看看FullGC频率

5. jmap看看有没有内存泄露
单例模式：
private volatile static OraDBI instance = null;
public static OraDBI getInstance(){
    if(instance==null){
        synchronized(OraDBI.class){
            if(instance == null){
                instance = new OraDBI();
            }
        }
    }
    return instance;
}
