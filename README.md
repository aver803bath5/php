第五組php&db副本
訂食吧使用教學
一、	下載檔案
1.	git clone https://github.com/aver803bath5/php.git
2.	將資料夾裡的所有檔案放於此路徑：/var/www/html。
二、 安裝檔案
1. 在您的主機安裝sendmail使機器可以寄信。
方法：請先sudo apt-get update，接著sudo apt-get install sendmail來進行安裝。
三、使主機得以順利顯示中文
	1. 將/etc/apache2/conf-enabled內的charset.conf文件打開。
指令：sudo vim /etc/apache2/conf-enabled/charset.conf
再將裡面的#AddDefautCharset UTF-8這行的#拿掉。
	2.存檔關閉檔案後。重啟apache伺服器來啟用新的設定。
指令：sudo /etc/init.d/apache2 restart
四、建立資料庫
	1.新建一個資料庫叫做ordering_sys，並將我們的sql檔匯入。
注意root的密碼必須設為xu3ru04bjo4。
五、修改程式碼
1. 請修改food_register_test.php裡面的$message變數，將
原本<a>標籤裡面href的內容改成'http://您主機之ip位置/ food_submit_3.php?verify=".$token."'<a>標籤內的內容也重覆此動作。
2.網頁放置的本地資料夾權限需設為777。
因為本服務有上傳檔案以及生成pdf檔案的功能，也請將uploads這個資料夾的權限也改成777。
指令：sudo chmod –R 777 .
在網頁存放的路徑中
sudo chmod –R 777 uploads/
以更改uploads的檔案權限

開始使用訂食吧訂餐系統
ps：有任何問題請寄信至..


