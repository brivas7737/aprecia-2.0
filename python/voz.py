import pyttsx3

engine = pyttsx3.init()

print("Iniciando voz...")

voices = engine.getProperty('voices')

for voz in voices:
    print(voz.name)

engine.say("Bienvenido al Sistema de Acceso Educativo para el Centro de Educación Especial, APRECIA, LA PAZ")
engine.runAndWait()

print("Finalizado")