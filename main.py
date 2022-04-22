
import serial.tools.list_ports
import random
import time
import  sys
from  Adafruit_IO import  MQTTClient

AIO_FEED_IDS = ["hieupham-house-1-room-1-fan-1", "hieupham-house-1-room-1-led-1", "hieupham-house-1-room-1-gas", "hieupham-house-1-room-1-temp"]
AIO_USERNAME = "Hieupham2502"
AIO_KEY = "aio_IBWK97vbJWNrZYsvSv0BWP7D7CZs"


def  connected(client):
    print("Ket noi thanh cong...")
    for feed in AIO_FEED_IDS:
        client.subscribe(feed)

def  subscribe(client , userdata , mid , granted_qos):
    print("Subcribe thanh cong...")

def  disconnected(client):
    print("Ngat ket noi...")
    sys.exit (1)

def  message(client , feed_id , payload):
    if feed_id == AIO_FEED_IDS[0]:
        print("Nhan du lieu LED: " + payload)
    elif feed_id == AIO_FEED_IDS[1]:
        print("Nhan du lieu FAN: " + payload)
    elif feed_id == AIO_FEED_IDS[2]:
        print("Nhan du lieu  DOOR: " + payload)
    # elif feed_id == AIO_FEED_IDS[3]:
    #     print("Nhan du lieu TEMP: " + payload)
    # elif feed_id == AIO_FEED_IDS[4]:
    #     print("Nhan du lieu GAS: " + payload)
    if isMicrobitConnected:
        ser.write((str(payload) + "#").encode())

client = MQTTClient(AIO_USERNAME , AIO_KEY)
client.on_connect = connected
client.on_disconnect = disconnected
client.on_message = message
client.on_subscribe = subscribe
client.connect()
client.loop_background()

def getPort():
    ports = serial.tools.list_ports.comports()
    N = len(ports)
    commPort = "None"
    for i in range(0, N):
        port = ports[i]
        strPort = str(port)
        if "USB Serial Device" in strPort:
            splitPort = strPort.split(" ")
            commPort = (splitPort[0])
    return commPort
   ## return "COM9"

isMicrobitConnected = False
if getPort() != "None":
    ser = serial.Serial(port=getPort(), baudrate=115200)
    isMicrobitConnected = True

def processData(data):
    data = data.replace("!", "")
    data = data.replace("#", "")
    splitData = data.split(":")
    print(splitData)
    if splitData[1] == "TEMP":
        client.publish("hieupham-house-1-room-1-temp", splitData[2])
    if splitData[1] == "GAS":
        client.publish("hieupham-house-1-room-1-gas", splitData[2])
    # if splitData[1] == "LAMP":
    #     client.publish(AIO_FEED_IDS[4], splitData[2])
    # if splitData[1] == "FAN":
    #     client.publish(AIO_FEED_IDS[8], splitData[2])
    # if splitData[1] == "DOOR":
    #     client.publish(AIO_FEED_IDS[9], splitData[2])

mess = ""
def readSerial():
    bytesToRead = ser.inWaiting()
    if (bytesToRead > 0):
        global mess
        mess = mess + ser.read(bytesToRead).decode("UTF-8")
        while ("#" in mess) and ("!" in mess):
            start = mess.find("!")
            end = mess.find("#")
            processData(mess[start:end + 1])
            if (end == len(mess)):
                mess = ""
            else:
                mess = mess[end+1:]

while True:
    if  isMicrobitConnected == True:
        readSerial()
    time.sleep (1)
