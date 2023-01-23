import smbus2
import bme280
import os

port = 1
address = 0x76
bus = smbus2.SMBus(port)

calibration_params = bme280.load_calibration_params(bus, address)
data = bme280.sample(bus, address, calibration_params)

os.system("sudo python3 /var/www/html/Proyecto_final_CHMR_GAFG/modulo4_1.py "+str(data.temperature)+" "+str(data.pressure)+" "+str(data.humidity))