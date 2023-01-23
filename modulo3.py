import RPi.GPIO as GPIO
import gpiozero
import time
import mysql.connector as mysqldb
import os

GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)
verificados=0
i=True
contador=0
cantidad=0

while True:
    conn=mysqldb.connect(host='localhost',user='gafg_chmr_65866_68053',password='abc123',database="BD_Proyecto_2021_CHMR_GAFG")
    cursor=conn.cursor()
    query=("select GPIO, Tipo, Estado from Control_68053_65866")
    cursor.execute(query)
    for gpio, tipo, estado in cursor:
        if tipo=="Entrada":
            GPIO.setup(gpio, GPIO.IN)
            if GPIO.input(gpio):
                os.system("sudo python3 /var/www/html/Proyecto_final_CHMR_GAFG/modulo3_2.py "+str(gpio))
            else:
                os.system("sudo python3 /var/www/html/Proyecto_final_CHMR_GAFG/modulo3_1.py "+str(gpio))
        elif tipo=="Salida":
            GPIO.setup(gpio, GPIO.OUT)
            if estado=="Encendido":
                GPIO.output(gpio,GPIO.HIGH)
            elif estado=="Apagado":
                GPIO.output(gpio,GPIO.LOW)
        elif tipo=="PWM":
            contador+=1
            if contador>cantidad:
                i=True
            if verificados==cantidad and i==True:
                cantidad+=1
            if verificados<cantidad:
                pwm=gpiozero.PWMLED(gpio)
                verificados+=1
            pwm.value=int(estado)/100
            time.sleep(1)
    contador=0
    i=False
    conn.commit()
    conn.close()