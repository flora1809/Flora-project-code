prompt Importing table BOOK...
set feedback off
set define off
insert into BOOK (BID, BNAME, CID, BOOKISBN, WRITER, PUBLISH, PDATE, IMGPATH, PRICE, ISCOMMAND, ISNEW, DEMO)
values ('28', '趣说中国史', 23, '9787516827628', '趣哥', '台海出版社', to_date('10-03-2021', 'dd-mm-yyyy'), '趣说中国史.jpg', 49.80, '1', '0', '如果把中国422位皇帝放在一个群里他们会聊些什么');

insert into BOOK (BID, BNAME, CID, BOOKISBN, WRITER, PUBLISH, PDATE, IMGPATH, PRICE, ISCOMMAND, ISNEW, DEMO)
values ('30', '中国通史', 23, '9787519300203', '吕思勉', '群言出版社', to_date('17-06-2021', 'dd-mm-yyyy'), '中国通史.jpg', 45.00, '是', '是', '国史经典读本');

insert into BOOK (BID, BNAME, CID, BOOKISBN, WRITER, PUBLISH, PDATE, IMGPATH, PRICE, ISCOMMAND, ISNEW, DEMO)
values ('01', '宇宙', 1, '9787210085423', '尼古拉斯·奇塔姆', '上海出版社', to_date('22-07-2021', 'dd-mm-yyyy'), '宇宙.jpg', 48.50, '1', '1', '从地球到宇宙边缘的旅行');

insert into BOOK (BID, BNAME, CID, BOOKISBN, WRITER, PUBLISH, PDATE, IMGPATH, PRICE, ISCOMMAND, ISNEW, DEMO)
values ('29', '上帝掷骰子吗', 10, '7538276378', '曹天元', '辽宁教育出版社', to_date('10-03-2021', 'dd-mm-yyyy'), '上帝掷骰子吗.jpg', 32.00, '是', '是', '量子物理史话');

insert into BOOK (BID, BNAME, CID, BOOKISBN, WRITER, PUBLISH, PDATE, IMGPATH, PRICE, ISCOMMAND, ISNEW, DEMO)
values ('11', '流浪地球', 3, '9787511360809', '刘慈欣', '中国华侨出版社', to_date('03-06-2021', 'dd-mm-yyyy'), '流浪地球.jpg', 38.00, '是', '否', '时间像一把利刃，恒定的向前推进着，却改变着一切');

insert into BOOK (BID, BNAME, CID, BOOKISBN, WRITER, PUBLISH, PDATE, IMGPATH, PRICE, ISCOMMAND, ISNEW, DEMO)
values ('31', '呼吸', 3, '9787544779319', '特德·姜', '江苏译林出版社', to_date('15-07-2020', 'dd-mm-yyyy'), '呼吸.jpg', 42.00, '是', '是', '我所有的欲望和沉思，都是这个宇宙缓缓呼出的气流');

insert into BOOK (BID, BNAME, CID, BOOKISBN, WRITER, PUBLISH, PDATE, IMGPATH, PRICE, ISCOMMAND, ISNEW, DEMO)
values ('32', '平行世界', 3, '9787511322487', '王晋康', '中国华侨出版社', to_date('01-07-2021', 'dd-mm-yyyy'), '平行世界.jpg', 26.80, '是', '是', '虫系列科幻');

insert into BOOK (BID, BNAME, CID, BOOKISBN, WRITER, PUBLISH, PDATE, IMGPATH, PRICE, ISCOMMAND, ISNEW, DEMO)
values ('02', '史记', 23, '9787548433477', '司马迁', '哈尔滨出版社', to_date('30-06-2021', 'dd-mm-yyyy'), '史记.jpg', 168.00, '是', '是', '经久不衰的传世经典');

insert into BOOK (BID, BNAME, CID, BOOKISBN, WRITER, PUBLISH, PDATE, IMGPATH, PRICE, ISCOMMAND, ISNEW, DEMO)
values ('03', '图解时间简史', 1, '9787550216495', '霍金', '北京联合出版公司', to_date('11-05-2021', 'dd-mm-yyyy'), '时间简史.jpg', 49.90, '是', '是', '人人都可以读懂的霍金');

insert into BOOK (BID, BNAME, CID, BOOKISBN, WRITER, PUBLISH, PDATE, IMGPATH, PRICE, ISCOMMAND, ISNEW, DEMO)
values ('04', '万物简史', 1, '9787544849579', '比尔·布莱森', '接力出版社', to_date('16-06-2021', 'dd-mm-yyyy'), '万物简史.jpg', 49.00, '是', '是', '少儿科普，百科读物');

insert into BOOK (BID, BNAME, CID, BOOKISBN, WRITER, PUBLISH, PDATE, IMGPATH, PRICE, ISCOMMAND, ISNEW, DEMO)
values ('05', '星际穿越', 1, '9787213066856', '基普·索恩', '浙江人民出版社', to_date('03-07-2020', 'dd-mm-yyyy'), '星际穿越.jpg', 84.90, '是', '是', '主宰宇宙宿命的法则');

insert into BOOK (BID, BNAME, CID, BOOKISBN, WRITER, PUBLISH, PDATE, IMGPATH, PRICE, ISCOMMAND, ISNEW, DEMO)
values ('105', 'test', 1, '123', 'writer', null, to_date('01-07-2021', 'dd-mm-yyyy'), null, 45.00, null, null, null);

prompt Done.
