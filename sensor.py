import time
import max30100
import mysql.connector as mysqldb

mx30 = max30100.MAX30100()
mx30.enable_spo2()
i=0

while i<100:
    mx30.read_sensor()
    mx30.ir, mx30.red
    hb = int(mx30.ir / 100)
    spo2 = int(mx30.red / 100)
    
    time.sleep(0.01)
    i=i+1
    
conn=mysqldb.connect(host='localhost',user='gafg_chmr_65866_68053',password='abc123',database="BD_Proyecto_2021_CHMR_GAFG")
cursor=conn.cursor()
query=("insert into Monitoreo_68053_65866 (Oxigenacion) values ("+str(spo2)+")")
cursor.execute(query)
conn.commit()
conn.close()