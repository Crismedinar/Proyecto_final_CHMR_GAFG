import mysql.connector as mysqldb
import sys

temperatura=str(sys.argv[1])
presion=str(sys.argv[2])
humedad=str(sys.argv[3])

conn=mysqldb.connect(host='localhost',user='gafg_chmr_65866_68053',password='abc123',database="BD_Proyecto_2021_CHMR_GAFG")
cursor=conn.cursor()
query=("insert into Metereologica_68053_65866 (Temperatura, Presion, Humedad) values ("+temperatura+","+presion+","+humedad+")")
cursor.execute(query)
conn.commit()
conn.close()