#!/usr/bin/python
# -*- coding: utf-8 -*-
import socket
import cv2
import matplotlib.pyplot as plt
import matplotlib.image as mpimg
import requests
import shutil

soket = socket.socket(socket.AF_INET,socket.SOCK_STREAM)

HOST = '0.0.0.0'
PORT = 8080

soket.bind((HOST,PORT))

soket.listen(0)

while True:
	print ('Kullanıcı bekleniyor')
	baglanti,adres = soket.accept()
	print ('Bir bağlantı kabul edildi.', adres)

	imglink = 'http://www.domain.com/uploads/IMG.jpg'
	response = requests.get(imglink, stream=True)
	with open('IMG.jpg', 'wb') as out_file:
		shutil.copyfileobj(response.raw, out_file)
	del response

	image = cv2.imread("IMG.jpg")
	lum_img = image[:,:,0]
	cv2.imwrite('IMG.jpg',lum_img)

	url = 'http://domain.com/fileUpload.php'

	files = {'image': open('IMG.jpg', 'rb')}

	data = {'file_name': 'IMG.jpg',
	'email': 'random@gmail.com',
	'website':'www.myweb.com',
	'message':'images process',
	'error':'false'}

	requests.post(url, files=files,data=data)
	baglanti.close()