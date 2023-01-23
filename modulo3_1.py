import mysql.connector as mysqldb
import sys

gpio=str(sys.argv[1])

conn=mysqldb.connect(host='localhost',user='gafg_chmr_65866_68053',password='abc123',database="BD_Proyecto_2021_CHMR_GAFG")
cursor=conn.cursor()
query=("update Control_68053_65866 set Estado='Cerrado' where GPIO="+gpio)
cursor.execute(query)
conn.commit()
conn.close()