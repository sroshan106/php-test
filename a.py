import numpy as np
import cv2
import pickle
import sys

face_cascade =cv2.CascadeClassifier('haarcascade_frontalface_default.xml')
recognizer=cv2.face.LBPHFaceRecognizer_create()
recognizer.read("trainner.yml")
labels = {"person_name" : 1}
with open("labels.pickle",'rb') as f:
    og_labels = pickle.load(f)
    labels ={v:k for k,v in og_labels.items()}
    

frame = cv2.imread('image.jpg')
frame = cv2.resize(frame, (0,0), fx=0.25, fy=0.25)
gray =cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
faces =face_cascade.detectMultiScale(gray,scaleFactor = 1.5,minNeighbors=5)
if len(faces)==0:
    print("No registered person found")
    sys.exit()
x,y,w,h = faces[0]
roi_gray = gray[y:y+h,x:x+w]
roi_color = frame[y:y+h,x:x+w]
id_,conf =recognizer.predict(roi_gray)
if conf>=45:
    font = cv2.FONT_HERSHEY_SIMPLEX
    name= labels[id_]
    print(name)
sys.exit()


