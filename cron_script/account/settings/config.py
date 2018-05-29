#!/usr/bin/env python
# -*- coding:utf-8 -*-

ENV="DEV" #环境模式　DEV：开发环境模式　 PROD:生产环境模式
LOGPATH='log/'
CONSUME_CONF='./conf/account_consume.conf'
PROCESS_BATCH_NUM = 10000
DEDUCTION_ORDER = ['virtual_account4', 'virtual_account3', 'virtual_account2', 'virtual_account1', 'cache']
SLEEPSECONDS=5
REDIS_CACHEKEY={
    "ACCOUNT_DAY_CONSUMPTION":"housead_account_day_consumption",
    "ACCOUNT_TOTAL_BALANCE":"housead_account_total_balance",
    "UNIT_DAY_CONSUMPTION":'housead_unit_day_consumption',
    "ADINFO_DAY_CONSUMPTION":'housead_adinfo_day_consumption',
    "ORIGINALITY_INFO":"housead_originality_info_",
    "UNIT_INFO":"housead_unit_info_",
    "AD_INFO":"housead_ad_info_",
    "ACCOUNT_CONSUME_LIMIT":"housead_consume_limit_"
}
VIRTUAL_ACCOUNT = ['virtual_account4', 'virtual_account3', 'virtual_account2', 'virtual_account1']
SLEEPSECONDS=5
INTEREST = {'休闲时间':11,'体育格斗':12, '儿童益智':13,'动作射击':14,'塔防守卫':15,'宝石消除':16,'扑克棋牌':17,'游戏中心':18,'游戏辅助':19,'经营策略':20,'网络游戏':21,'角色扮演':22,'跑酷竞速':23}
APPKEY = {'1':'e19081b4527963d70c7a', '2':'8E69498B356D95CCB579'}#1地铁跑酷　2神庙逃亡2

if ENV=="DEV":
    REDIS={"host":"127.0.0.1","port":6379,"passworCONSUME_CONFd":"123456"}
    PROCESS_BATCH_NUM = 20
    MOBGI_HOUSEAD     = {"host":"192.168.141.216","port":3306,"db":"mobgi_housead","table":"click","user":"root","passwd":"123456"}
    MOBGI_CHARGE= {"host":"192.168.141.216","port":3306,"db":"mobgi_charge","table":"click","user":"root","passwd":"123456"}
elif ENV=='TEST':
    REDIS={"host":"127.0.0.1","port":6378}
    PROCESS_BATCH_NUM = 1
    MOBGI_HOUSEAD={"host":"10.50.10.12","port":3306,"db":"mobgi_housead","table":"click","user":"eric","passwd":"XqfX29pXso"}
    MOBGI_CHARGE={"host":"10.50.10.12","port":3306,"db":"mobgi_charge","table":"click","user":"eric","passwd":"XqfX29pXso"}
else:
    REDIS={"host":"redis.ad.api.ildyx.com","port":6379,"password":"ZxEXuArl0Viw"}
    PROCESS_BATCH_NUM = 10000
    MOBGI_HOUSEAD={"host":"db.ad.api.ildyx.com","port":3306,"db":"mobgi_housead","table":"click","user":"ad_system","passwd":"wY7DTW6aBXV9ljG_g4sE"}
    MOBGI_CHARGE  ={"host":"db.ad.data.ildyx.com","port":3306,"db":"mobgi_charge","table":"click","user":"ad_system","passwd":"wY7DTW6aBXV9ljG_g4sE"}